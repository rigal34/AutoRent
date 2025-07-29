<?php

namespace App\Controller\Admin;

use App\Entity\Vehicule;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Doctrine\ORM\EntityManagerInterface; // Pour interagir avec la base de données
use Symfony\Component\HttpFoundation\File\UploadedFile; // Pour manipuler les fichiers uploadés
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
                
// --- C'EST ICI QUE TU DOIS AJOUTER LE CHAMP POUR LES IMAGES MULTIPLES ---
                // Tu peux le placer après les catégories ou avant, selon ta préférence d'ordre d'affichage.
                // Attention : Le `ImageField::new('images')` va chercher la propriété `images` dans ton entité Vehicule.
                // Tu as bien cette propriété `private ?array $images = null;` dans Vehicule.php.
                ImageField::new('images', 'Autres images') 
                    ->setBasePath('images/') // Chemin URL pour afficher les images (public/images devient /images)
                    ->setUploadDir('public/images') // Dossier physique sur ton serveur où EasyAdmin va uploader
                    ->setRequired(false) // Les images multiples ne sont pas obligatoires
                    ->setFormTypeOption('multiple', true) // <-- C'est cette option qui active la sélection multiple de fichiers
                    ->setFormTypeOption('attr', ['accept' => 'image/*']), // Pour filtrer les types de fichiers (images)
                // --- FIN DE L'AJOUT ---




            ];
        }
    }
}

