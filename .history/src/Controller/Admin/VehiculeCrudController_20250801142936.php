<?php

namespace App\Controller\Admin;

use App\Entity\Vehicule;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField; 


class VehiculeCrudController extends AbstractCrudController
{
    

    public static function getEntityFqcn(): string
    {
        return Vehicule::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextEditorField::new('description')->setRequired(false),
            NumberField::new('tarifJournalier'),
            TextField::new('motorisation'),
            BooleanField::new('statut'),

            // Champ pour l'image principale
            ImageField::new('imagePrincipale')
                ->setBasePath('images/')
                ->setUploadDir('public/images')
                ->setRequired(false)
                ->setFormTypeOptions(['attr' => ['accept' => 'image/*']]),

            AssociationField::new('categories', 'Catégories'),

            // --- GESTION DES IMAGES MULTIPLES ---
            // Pour l'upload : On utilise ImageField comme dans ton exemple Article
            ImageField::new('images') // Nom de la propriété dans l'entité
                ->setLabel('Autres images') // Label affiché dans le BO
                ->setBasePath('images/') // Chemin pour l'affichage
                ->setUploadDir('public/images') // Dossier d'upload
                ->setRequired(false)
                ->setFormTypeOptions([
                    'multiple' => true, // Permet l'upload de plusieurs fichiers
                    'attr' => ['accept' => 'image/*'], // Filtre les types de fichiers
                    
                ]),
            
        ];
    }

    public function configureActions(Actions $actions): Actions
{
    return $actions
        // On retire le bouton "Supprimer" de la page principale (la liste)
        ->remove(Crud::PAGE_INDEX, Action::DELETE)

        // On retire aussi le bouton "Supprimer" de la page d'édition
        ->remove(Crud::PAGE_EDIT, Action::DELETE)
    ;
}
}
