<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Ajoute à chaque page les réglages de sécurité destinés au navigateur du visiteur.
 * Ils ne changent ni le contenu ni l'apparence du site.
 */
class EntetesDeSecuriteSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [KernelEvents::RESPONSE => 'ajouterLesEntetes'];
    }

    public function ajouterLesEntetes(ResponseEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }
        $entetes = $event->getResponse()->headers;

        // Le navigateur ne devine pas le type d'un fichier : il s'en tient au type annoncé
        $entetes->set('X-Content-Type-Options', 'nosniff');
        // Un autre site n'a pas le droit d'afficher celui-ci dans un cadre
        $entetes->set('X-Frame-Options', 'SAMEORIGIN');
        // Vers un autre site, seul le nom du site d'origine est transmis, pas la page exacte
        $entetes->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        // Le site n'utilise ni la caméra, ni le micro, ni la position, ni le paiement du navigateur
        $entetes->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), payment=()');
        // En liaison chiffrée : pendant 6 mois, le navigateur ne reviendra qu'en https
        if ($event->getRequest()->isSecure()) {
            $entetes->set('Strict-Transport-Security', 'max-age=15552000');
        }
    }
}
