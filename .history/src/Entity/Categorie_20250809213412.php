<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    

    /**
     * @var Collection<int, Vehicule>
     */
    #[ORM\ManyToMany(targetEntity: Vehicule::class, mappedBy: 'categories')]
    private Collection $vehicules;

    /**
     * @var Collection<int, Vehicule>
     */
    //  #[ORM\OneToMany(targetEntity: Vehicule::class, mappedBy: 'categorie')]
    //  private Collection $vehicules;

    public function __construct()
    {
       
        $this->vehicules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Vehicule>
     */
    // public function getVehicules(): Collection
    // {
    //     return $this->vehicules;
    // }

    // public function addVehicule(Vehicule $vehicule): static
    // {
    //     if (!$this->vehicules->contains($vehicule)) {
    //         $this->vehicules->add($vehicule);
    //        // $vehicule->setCategorie($this);
    //     }

    //     return $this;
    // }

    // public function removeVehicule(Vehicule $vehicule): static
    // {
    //     if ($this->vehicules->removeElement($vehicule)) {
            
    //         if ($vehicule->getCategorie() === $this) {
    //             $vehicule->setCategorie(null);
    //         }
    //     }

    //     return $this;
    // }



    public function __toString(): string
    {
        return $this->nom;
    }

    /**
     * @return Collection<int, Vehicule>
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): static
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules->add($vehicule);
            $vehicule->addCategory($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): static
    {
        if ($this->vehicules->removeElement($vehicule)) {
            $vehicule->removeCategory($this);
        }

        return $this;
    }
    
}
