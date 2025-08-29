<?php

namespace App\Controller;
use DateTimeImmutable; 
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

      
        if (!$vehicule->isStatut()) {
            $this->addFlash('error', 'Ce véhicule n\'est plus disponible.');
            return $this->redirectToRoute('app_vehicule_show', ['id' => $vehicule->getId()]);
        }

        $reservation = new Reservation();
        $form = $this->createForm(ReservationFormType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            // Double vérification de disponibilité
            if (!$vehicule->isStatut()) {
                $this->addFlash('error', 'Ce véhicule a été réservé entre temps.');
                return $this->redirectToRoute('app_vehicule_show', ['id' => $vehicule->getId()]);
            }

            // Créer la réservation
            $reservation->setUtilisateur($this->getUser());
            $reservation->setVehicule($vehicule);
            $reservation->setDateReservation(new DateTimeImmutable()); 
            $reservation->setStatut('en_attente'); 

            // Calculer le prix total
            $dateDebut = $reservation->getDateDebut();
            $dateFin = $reservation->getDateFin();
            $nombreJours = $dateDebut->diff($dateFin)->days + 1;
            $prixTotal = $nombreJours * $vehicule->getTarifJournalier();
            $reservation->setPrixTotal($prixTotal);

            //  MARQUE LE VÉHICULE COMME INDISPONIBLE
            $vehicule->setStatut(false); // false = indisponible

            // Sauvegarder tout en attentant la confirmation admin
            $entityManager->persist($reservation);
            $entityManager->persist($vehicule);
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



