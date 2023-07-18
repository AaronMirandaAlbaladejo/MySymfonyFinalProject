<?php

// src/Controller/MovilController.php

namespace App\Controller;

//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// tipos form
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


// clase
use App\Entity\Movil;

// form
use App\Form\MovilType;

use App\Validator\Constraints\TelefonoMovil;

/**
 * @Route("/movil")
*/
class MovilController extends AbstractController
{   
    
   
    /**
     * @Route("/clase", name="clase")
     */
    public function clase( Request $request )
    {
       
      
         
      
        $movil = new Movil();
     
        $form = $this->createForm(MovilType::class, $movil);
        
		$form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($movil);
            $entityManager->flush(); 
          
            return new Response( "Save");
        }
        else
            return $this->render('form.html.twig', array('form' => $form->createView(),));
    }
     
    /**
     * @Route("/constraint", name="constraint")
     */
    public function constraint( Request $request )
    {
       
		$form = $this->createFormBuilder();
        $form->add('numero', TextType::class, ['constraints' => [new TelefonoMovil()]]);
        $form->add('Save', SubmitType::class);
		$form = $form->getForm();

        $form->handleRequest($request);
      
        if ($form->isSubmitted() && $form->isValid()) {
            $movil = new Movil();
			$data = $form->getData();
			$movil->setNumero( $data[ 'numero']);
			$entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($movil);
            $entityManager->flush(); 
          
            return new Response( "Save");
        }
        else
            return $this->render('form.html.twig', array('form' => $form->createView(),));
    }
     
}
