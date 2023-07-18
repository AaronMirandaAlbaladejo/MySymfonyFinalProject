<?php
// src/Entity/Footer.php
namespace App\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FooterRepository")
 * @ORM\Table(name="footer")
 */ 
class Footer
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
 
 
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $titulo;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    protected $enlace;
 
	/**
     * @ORM\Column(type="integer")
     */
    protected $fila;

    /**
     * @ORM\Column(type="integer")
     */
    protected $columna;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setEnlace(string $enlace): self
    {
        $this->enlace = $enlace;

        return $this;
    }

    public function getEnlace(): ?string
    {
        return $this->enlace;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     * @return Footer
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return integer 
     */
    public function getOrden()
    {
        return $this->orden;
    }

    public function getFila(): ?int
    {
        return $this->fila;
    }

    public function setFila(int $fila): self
    {
        $this->fila = $fila;

        return $this;
    }

    public function getcolumna(): ?int
    {
        return $this->columna;
    }

    public function setcolumna(int $columna): self
    {
        $this->columna = $columna;

        return $this;
    }
}