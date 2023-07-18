<?php

namespace App\Entity;

use App\Repository\ServicioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServicioRepository::class)
 */
class Servicio
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
    private $Servicio;

    /**
     * @ORM\OneToMany(targetEntity=Servicios::class, mappedBy="Servicio_id")
     */
    private $servicios;

    /**
     * @ORM\OneToOne(targetEntity=Especialidad::class, cascade={"persist", "remove"})
     */
    private $especialidad;

    public function __construct()
    {
        $this->servicios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServicio(): ?string
    {
        return $this->Servicio;
    }

    public function setServicio(string $Servicio): self
    {
        $this->Servicio = $Servicio;

        return $this;
    }

    /**
     * @return Collection<int, Servicios>
     */
    public function getServicios(): Collection
    {
        return $this->servicios;
    }

    public function addServicio(Servicios $servicio): self
    {
        if (!$this->servicios->contains($servicio)) {
            $this->servicios[] = $servicio;
            $servicio->setServicioId($this);
        }

        return $this;
    }

    public function removeServicio(Servicios $servicio): self
    {
        if ($this->servicios->removeElement($servicio)) {
            // set the owning side to null (unless already changed)
            if ($servicio->getServicioId() === $this) {
                $servicio->setServicioId(null);
            }
        }

        return $this;
    }

    public function getEspecialidad(): ?Especialidad
    {
        return $this->especialidad;
    }

    public function setEspecialidad(?Especialidad $especialidad): self
    {
        $this->especialidad = $especialidad;

        return $this;
    }
}
