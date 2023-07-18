<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PollPreguntas
 *
 * @ORM\Table(name="poll_preguntas", indexes={@ORM\Index(name="encuesta_id", columns={"encuesta_id"})})
 * @ORM\Entity
 */
class PollPreguntas
{
    /**
     * @var int
     *
     * @ORM\Column(name="pregunta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $preguntaId;

    /**
     * @var int
     *
     * @ORM\Column(name="orden", type="integer", nullable=false)
     */
    private $orden;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pregunta", type="string", length=100, nullable=true)
     */
    private $pregunta;

    /**
     *
     * @ORM\ManyToOne(targetEntity="PollEncuestas")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="encuesta_id", referencedColumnName="encuesta_id")
     * })
     */
    private $encuesta;

    public function getPreguntaId(): ?int
    {
        return $this->preguntaId;
    }

    public function getOrden(): ?int
    {
        return $this->orden;
    }

    public function setOrden(int $orden): self
    {
        $this->orden = $orden;

        return $this;
    }

    public function getPregunta(): ?string
    {
        return $this->pregunta;
    }

    public function setPregunta(?string $pregunta): self
    {
        $this->pregunta = $pregunta;

        return $this;
    }   

    public function getEncuesta(): ?PollEncuestas
    {
        return $this->encuesta;
    }

    public function setEncuesta(?PollEncuestas $encuesta): self
    {
        $this->encuesta = $encuesta;

        return $this;
    }

}
