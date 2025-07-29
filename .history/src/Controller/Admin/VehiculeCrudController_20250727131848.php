<?php

namespace App\Controller\Admin;

use App\Entity\Vehicule;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
                    // 'mapped' => false, // Non, on ne met pas mapped à false ici si EasyAdmin gère l'array directement
                                        // Si EasyAdmin gère le JSON directement, il faut faire confiance
                ]),
            // --- FIN GESTION IMAGES MULTIPLES ---
        ];
    }

    // Si tu as un persistEntity qui gére le slug, garde-le. Sinon, tu n'en as pas besoin.
    // public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    // {
    //    if (!$entityInstance instanceof Vehicule) return;
    //    // Si tu avais du slug ici pour Vehicule:
    //    // $entityInstance->setSlug($this->slugger->slug($entityInstance->getNom())->lower());
    //    parent::persistEntity($entityManager, $entityInstance);
    // }
}
