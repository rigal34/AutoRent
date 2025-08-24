<?php

namespace App\Controller;
use DateTimeImmutable; // ✅ Plus moderne
use App\Entity\Vehicule;
use App\Entity\Reservation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ReservationFormType;

final class ReservationController extends AbstractController
{
    #[Route('/reservation/{id}', name: 'app_reservation_new')]
    public function new(Vehicule $vehicule, Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_USER')) {
            $this->addFlash('info', 'Vous devez être connecté pour pouvoir réserver.');
            return $this->redirectToRoute('app_login');
        }

        $reservation = new Reservation();
        $form = $this->createForm(ReservationFormType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Associer l'utilisateur et le véhicule
            $reservation->setUtilisateur($this->getUser());
            $reservation->setVehicule($vehicule);
           $reservation->setDateReservation(new DateTimeImmutable()); 
            
            
            $reservation->setStatut('en_attente'); 
            
            // Calculer le prix total
            $dateDebut = $reservation->getDateDebut();
            $dateFin = $reservation->getDateFin();
            $nombreJours = $dateDebut->diff($dateFin)->days + 1;//pour eviter que l ordi compte que 1jour
            $prixTotal = $nombreJours * $vehicule->getTarifJournalier();
            $reservation->setPrixTotal($prixTotal);
            
            // Sauvegarder
            $entityManager->persist($reservation);
            $entityManager->flush();

            $this->addFlash('success', 'Réservation confirmée ! Total: ' . $prixTotal . '€ pour ' . $nombreJours . ' jour(s)');
            return $this->redirectToRoute('app_vehicules_index');
        }

        return $this->render('reservation/index.html.twig', [
            'vehicule' => $vehicule,
            'reservationForm' => $form->createView(),
        ]);
    }
}




