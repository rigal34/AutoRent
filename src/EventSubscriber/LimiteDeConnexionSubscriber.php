<?php

namespace App\EventSubscriber;

use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Exception\TooManyLoginAttemptsAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Event\CheckPassportEvent;
use Symfony\Component\Security\Http\Event\LoginFailureEvent;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;

/**
 * Limite les essais de connexion : après 5 essais ratés pour la même adresse e-mail
 * depuis la même adresse de visiteur, la connexion est refusée pendant 15 minutes.
 * Une connexion réussie remet le compteur à zéro.
 */
class LimiteDeConnexionSubscriber implements EventSubscriberInterface
{
    private const ESSAIS_PERMIS = 5;
    private const ATTENTE_EN_MINUTES = 15;

    public function __construct(
        private CacheItemPoolInterface $cache,
        private RequestStack $requestStack,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            // Priorité haute : on refuse avant même que le mot de passe soit comparé
            CheckPassportEvent::class => ['refuserSiTropDEssais', 2080],
            LoginFailureEvent::class => 'compterUnEssaiRate',
            LoginSuccessEvent::class => 'remettreAZero',
        ];
    }

    public function refuserSiTropDEssais(CheckPassportEvent $event): void
    {
        $passport = $event->getPassport();
        if (!$passport->hasBadge(UserBadge::class)) {
            return;
        }
        $compteur = $this->cache->getItem($this->cle($passport->getBadge(UserBadge::class)->getUserIdentifier()));
        if ($compteur->isHit() && $compteur->get() >= self::ESSAIS_PERMIS) {
            throw new TooManyLoginAttemptsAuthenticationException(self::ATTENTE_EN_MINUTES);
        }
    }

    public function compterUnEssaiRate(LoginFailureEvent $event): void
    {
        // Un essai déjà refusé pour « trop d'essais » ne rallonge pas l'attente
        if ($event->getException() instanceof TooManyLoginAttemptsAuthenticationException) {
            return;
        }
        $passport = $event->getPassport();
        if (null === $passport || !$passport->hasBadge(UserBadge::class)) {
            return;
        }
        $compteur = $this->cache->getItem($this->cle($passport->getBadge(UserBadge::class)->getUserIdentifier()));
        $compteur->set(($compteur->isHit() ? (int) $compteur->get() : 0) + 1);
        $compteur->expiresAfter(self::ATTENTE_EN_MINUTES * 60);
        $this->cache->save($compteur);
    }

    public function remettreAZero(LoginSuccessEvent $event): void
    {
        $this->cache->deleteItem($this->cle($event->getUser()->getUserIdentifier()));
    }

    // Le compteur est tenu par couple « adresse e-mail + adresse du visiteur »
    private function cle(string $email): string
    {
        $adresse = $this->requestStack->getMainRequest()?->getClientIp() ?? 'inconnue';

        return 'essais_connexion_'.hash('sha256', mb_strtolower(trim($email)).'|'.$adresse);
    }
}
