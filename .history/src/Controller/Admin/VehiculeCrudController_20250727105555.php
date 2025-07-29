<?php

namespace App\Controller\Admin;

use App\Entity\Vehicule;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField; // Pour le tarif, plus adapté que TextField
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField; // Pour la relation catégorie
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud; // Pour différencier les pages
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField; // Pour la description

class VehiculeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vehicule::class;
    }

    /**
     * Configure les champs à afficher dans le back-office EasyAdmin pour l'entité Véhicule.
     * La liste (index) est simplifiée, les formulaires de création/édition sont complets.
     *
     * @param string $pageName Le nom de la page EasyAdmin (index, new, edit, detail).
     * @return iterable La liste des champs à afficher.
     */
    public function configureFields(string $pageName): iterable
    {
        // Champs pour la page de liste (index) : Nom et Image Principale
        if (Crud::PAGE_INDEX === $pageName) {
            return [
                TextField::new('nom'),
                ImageField::new('imagePrincipale')
                    ->setBasePath('images/')
                    ->setUploadDir('public/images')
                    ->setRequired(false),
            ];
        }
        // Champs pour les pages de création (new) et d'édition (edit) : Tous les champs nécessaires
        else {
            return [
                TextField::new('nom'),
                TextEditorField::new('description')->setRequired(false), // La description n'est pas obligatoire
                NumberField::new('tarifJournalier'), // Utilise NumberField pour les nombres
                TextField::new('motorisation'),
                BooleanField::new('statut'),
                ImageField::new('imagePrincipale')
                    ->setBasePath('images/')
                    ->setUploadDir('public/images')
                    ->setRequired(false)
                    ->setFormTypeOptions(['attr' => ['accept' => 'image/*']]),
                AssociationField::new('categories', 'Catégories'), 
                
            ];
        }
    }
}

