<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PollResultados
 *
 * @ORM\Table(name="poll_resultados", indexes={@ORM\Index(name="poll_id", columns={"poll_id"}), @ORM\Index(name="respuesta_id", columns={"respuesta_id"})})
 * @ORM\Entity
 */
class PollResultados
{
    /**
     * @var int
     *
     * @ORM\Column(name="resultado_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $resultadoId;

    /**
     *
     * @ORM\ManyToOne(targetEntity="PollPolls")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="poll_id", referencedColumnName="poll_id")
     * })
     */
    private $poll;

    /**
     *
     * @ORM\ManyToOne(targetEntity="PollRespuestas")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="respuesta_id", referencedColumnName="respuesta_id")
     * })
     */
    private $respuesta;
    
    public function getResultadoId(): ?int
    {
        return $this->resultadoId;
    }

    public function getPoll(): ?PollPolls
    {
        return $this->poll;
    }

    public function setPoll(?PollPolls $poll): self
    {
        $this->poll = $poll;

        return $this;
    }

    public function getRespuesta(): ?PollRespuestas
    {
        return $this->respuesta;
    }

    public function setRespuesta(?PollRespuestas $respuesta): self
    {
        $this->respuesta = $respuesta;

        return $this;
    }
}
