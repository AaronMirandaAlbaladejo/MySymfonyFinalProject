<?php
// src/Validator/Constraints/Dni.php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class DniEsp extends Constraint
{
    public $message = 'El valor "{{ string }}" no es un DNI valido';
    
    
    public function validatedBy()
    {
        return \get_class($this).'Validator';
    }
}