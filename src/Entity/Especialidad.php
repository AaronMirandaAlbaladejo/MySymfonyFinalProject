<?php

namespace App\Entity;

use App\Repository\EspecialidadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EspecialidadRepository::class)
 */
class Especialidad
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
    private $especialidad;

   

    /**
     * @ORM\OneToMany(targetEntity=Cita::class, mappedBy="especialidad")
     */
    private $cita;

    /**
     * @ORM\ManyToMany(targetEntity=Medico::class, mappedBy="especialidad")
     */
    private $medicos;



    public function __construct()
    {
        $this->medicos = new ArrayCollection();
        $this->cita = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getEspecialidad(): ?string
    {
        return $this->especialidad;
    }

    public function setEspecialidad(string $especialidad): self
    {
        $this->especialidad = $especialidad;

        return $this;
    }

    

    public function __toString()
    {
        return $this->especialidad;
    }

    /**
     * @return Collection<int, cita>
     */
    public function getCita(): Collection
    {
        return $this->cita;
    }

    public function addCita(cita $cita): self
    {
        if (!$this->cita->contains($cita)) {
            $this->cita[] = $cita;
            $cita->setEspecialidad($this);
        }

        return $this;
    }

    public function removeCita(cita $cita): self
    {
        if ($this->cita->removeElement($cita)) {
            // set the owning side to null (unless already changed)
            if ($cita->getEspecialidad() === $this) {
                $cita->setEspecialidad(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Medico>
     */
    public function getMedicos(): Collection
    {
        return $this->medicos;
    }

    public function addMedico(Medico $medico): self
    {
        if (!$this->medicos->contains($medico)) {
            $this->medicos[] = $medico;
            $medico->addEspecialidad($this);
        }

        return $this;
    }

    public function removeMedico(Medico $medico): self
    {
        if ($this->medicos->removeElement($medico)) {
            $medico->removeEspecialidad($this);
        }

        return $this;
    }

  
}
