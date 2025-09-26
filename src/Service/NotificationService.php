<?php

namespace App\Service;

use App\Entity\Reservation;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class NotificationServicealors 
{
    public function __construct(
        private MailerInterface $mailer,
        private Environment $twig          
    ) {}

    public function sendReservationNotifications(Reservation $reservation): void
{
    // 📧 EMAIL 1 : ADMIN (adresse d'envoi fixe )
    $adminEmail = (new Email())
        ->from('rigalbruno2@gmail.com')
        ->to('rigalbruno2@gmail.com')  
        ->subject('ADMIN : Nouvelle réservation véhicule #' . $reservation->getId())
        ->html($this->twig->render('emails/admin_notification.html.twig', [
            'reservation' => $reservation,
            'vehicule' => $reservation->getVehicule(),
            'client' => $reservation->getUtilisateur()
        ]));

    // 🔍 RÉCUPÉRATION EMAIL D'INSCRIPTION CLIENT
    $utilisateur = $reservation->getUtilisateur();
    $emailInscription = $utilisateur->getUserIdentifier(); // ← EMAIL D'INSCRIPTION
    
    // 📧 EMAIL 2 : CLIENT (DYNAMIQUE depuis table User)
    $clientEmail = (new Email())
        ->from('rigalbruno2@gmail.com')
        ->to($emailInscription)  // ← EMAIL D'INSCRIPTION RÉCUPÉRÉ
        ->subject('⏳ Réservation en attente d\'approbation')
        ->html($this->twig->render('emails/user_confirmation.html.twig', [
            'reservation' => $reservation,
            'vehicule' => $reservation->getVehicule(),
            'utilisateur' => $utilisateur,
            'prixTotal' => $reservation->getPrixTotal()
        ]));

    // 🚀 ENVOI DES 2 EMAILS DIFFÉRENTS
    $this->mailer->send($adminEmail);  // Admin reçoit
    $this->mailer->send($clientEmail); // Client reçoit
}
}