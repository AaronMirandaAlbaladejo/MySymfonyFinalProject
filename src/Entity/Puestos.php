<?php

namespace App\Entity;

use App\Repository\PuestosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PuestosRepository::class)
 */
class Puestos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Puesto;

    /**
     * @ORM\ManyToOne(targetEntity=Especialidad::class, cascade={"persist", "remove"})
     */
    private $Especialidad;

    /**
     * @ORM\OneToMany(targetEntity=Bolsa::class, mappedBy="Puesto")
     */
    private $bolsas;

    public function __construct()
    {
        $this->bolsas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPuesto(): ?string
    {
        return $this->Puesto;
    }

    public function setPuesto(string $Puesto): self
    {
        $this->Puesto = $Puesto;

        return $this;
    }

    public function getEspecialidad(): ?Especialidad
    {
        return $this->Especialidad;
    }

    public function setEspecialidad(?Especialidad $Especialidad): self
    {
        $this->Especialidad = $Especialidad;

        return $this;
    }

    /**
     * @return Collection<int, Bolsa>
     */
    public function getBolsas(): Collection
    {
        return $this->bolsas;
    }

    public function addBolsa(Bolsa $bolsa): self
    {
        if (!$this->bolsas->contains($bolsa)) {
            $this->bolsas[] = $bolsa;
            $bolsa->setPuesto($this);
        }

        return $this;
    }

    public function removeBolsa(Bolsa $bolsa): self
    {
        if ($this->bolsas->removeElement($bolsa)) {
            // set the owning side to null (unless already changed)
            if ($bolsa->getPuesto() === $this) {
                $bolsa->setPuesto(null);
            }
        }

        return $this;
    }
}
