<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;


class ReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            DateTimeField::new('dateReservation', 'Date de réservation'),  
            DateTimeField::new('dateDebut', 'Date de début'),  
            DateTimeField::new('dateFin', 'Date de fin'), 
            MoneyField::new('prixTotal', 'Prix total') 
                ->setCurrency('EUR'), 
            ChoiceField::new('statut', 'Statut')
                ->setChoices([
                      'Confirmée' => 'confirmee',
                       'En cours' => 'en_cours',
                      'Terminée' => 'terminee',
                        'Annulée' => 'annulee',
                ]),
                
       
       
       
       
        ];
    }
    
}
