<?php
// src/Validator/Constraints/TelefonoMovil.php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class  TelefonoMovil extends Constraint
{
    public $message = 'El valor "{{ string }}" no es un telefono movil valido';
    
    
    public function validatedBy()
    {
        return \get_class($this).'Validator';
    }
}