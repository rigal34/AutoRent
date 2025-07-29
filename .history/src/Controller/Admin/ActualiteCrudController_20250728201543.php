<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class ActualiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actualite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
          
            TextField::new('titre'),
            TextEditorField::new('contenu')->setRequired(false),
            DateTimeField::new('datePublication'),
            ImageField::new('image') // Pour l'image principale de l'actualité
                ->setBasePath('images/') // Chemin accessible publiquement
                ->setUploadDir('public/images') // Dossier d'upload physique
                ->setRequired(false) // L'image est optionnelle
                ->setFormTypeOptions(['attr' => ['accept' => 'image/*']]), 
        ];
    }
    
}
