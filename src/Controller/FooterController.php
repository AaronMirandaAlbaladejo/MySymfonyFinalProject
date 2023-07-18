<?php
// src/Controller/FooterController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Footer;


class FooterController extends AbstractController
{
    
	/**
     * @Route("/footer_footer",  name="footer_Footer")
     */
	public function Footer()
    {
     

         $footers = $this->getDoctrine()
        ->getRepository(Footer::class)
        ->findByFilaColumna();
        

        return $this->render('footer/footer.html.twig',array("footers"=>$footers));
    }   
	 
	/**
     * @Route("/footer_test",  name="footer_test")
     */
	public function test()
    {
        
        return $this->render('footer/test.html.twig');
    }   
	
   

}