<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PollRespuestas
 *
 * @ORM\Table(name="poll_respuestas", indexes={@ORM\Index(name="pregunta_id", columns={"pregunta_id"})})
 * @ORM\Entity
 */
class PollRespuestas
{
    /**
     * @var int
     *
     * @ORM\Column(name="respuesta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $respuestaId;

    /**
     * @var int
     *
     * @ORM\Column(name="orden", type="integer", nullable=false)
     */
    private $orden;

    /**
     * @var string|null
     *
     * @ORM\Column(name="respuesta", type="string", length=100, nullable=true)
     */
    private $respuesta;

    /**
     *
     * @ORM\ManyToOne(targetEntity="PollPreguntas")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="pregunta_id", referencedColumnName="pregunta_id")
     * })
     */
    private $pregunta;

    public function getRespuestaId(): ?int
    {
        return $this->respuestaId;
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

    public function getRespuesta(): ?string
    {
        return $this->respuesta;
    }

    public function setRespuesta(?string $respuesta): self
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    public function getPregunta(): ?PollPreguntas
    {
        return $this->pregunta;
    }

    public function setPregunta(?PollPreguntas $pregunta): self
    {
        $this->pregunta = $pregunta;

        return $this;
    }



}
