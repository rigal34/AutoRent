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
            TextEditorField::new('contenu')->setRequired(true),
            DateTimeField::new('datePublication'),
            ImageField::new('image') 
                ->setBasePath('images/') 
                ->setUploadDir('public/images')
                ->setRequired(false) 
                ->setFormTypeOptions(['attr' => ['accept' => 'image/*']]), 
        ];
    }
    
}
