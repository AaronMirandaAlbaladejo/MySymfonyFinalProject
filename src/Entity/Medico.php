<?php

namespace App\Entity;

use App\Repository\MedicoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicoRepository::class)
 */
class Medico
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $papellido;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sapellido;

    /**
     * @ORM\ManyToMany(targetEntity=Especialidad::class, inversedBy="medicos")
     */
    private $especialidad;

    public function __construct()
    {
        $this->especialidad = new ArrayCollection();
    }


    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPapellido(): ?string
    {
        return $this->papellido;
    }

    public function setPapellido(string $papellido): self
    {
        $this->papellido = $papellido;

        return $this;
    }

    public function getSapellido(): ?string
    {
        return $this->sapellido;
    }

    public function setSapellido(?string $sapellido): self
    {
        $this->sapellido = $sapellido;

        return $this;
    }

    /**
     * @return Collection<int, Especialidad>
     */
    public function getEspecialidad(): Collection
    {
        return $this->especialidad;
    }

    public function addEspecialidad(especialidad $especialidad): self
    {
        if (!$this->especialidad->contains($especialidad)) {
            $this->especialidad[] = $especialidad;
        }

        return $this;
    }

    public function removeEspecialidad(especialidad $especialidad): self
    {
        $this->especialidad->removeElement($especialidad);

        return $this;
    }

   

}
