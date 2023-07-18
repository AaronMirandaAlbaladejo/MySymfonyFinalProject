<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PollEncuestas
 *
 * @ORM\Table(name="poll_encuestas")
 * @ORM\Entity
 */
class PollEncuestas
{
    /**
     * @var int
     *
     * @ORM\Column(name="encuesta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $encuestaId;

    /**
     * @var string
     *
     * @ORM\Column(name="encuesta", type="string", length=100, nullable=false)
     */
    private $encuesta;

    public function getEncuestaId(): ?int
    {
        return $this->encuestaId;
    }

    public function getEncuesta(): ?string
    {
        return $this->encuesta;
    }

    public function setEncuesta(string $encuesta): self
    {
        $this->encuesta = $encuesta;

        return $this;
    }

    public function __toString()
    {
        return $this->encuesta;
    }

}
