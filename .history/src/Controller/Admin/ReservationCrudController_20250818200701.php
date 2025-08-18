<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;


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
            TextField::new('statut', 'Statut'),          
       
       
       
       
       
       
       
       
       
        ];
    }
    
}
