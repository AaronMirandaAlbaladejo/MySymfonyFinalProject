<?php
// src/Controller/MenuController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Menu;
use App\Repository\MenuRepository;

class MenuController extends AbstractController
{
	private $menuRepository;
	
	public function __construct ( MenuRepository $menuRepository )
    {
			$this->menuRepository = $menuRepository;
	}

    /**
     * @Route("/inicio",  name="inicio")
     */
	public function test(): Response
    {
        return $this->render('menu/inicio.html.twig');
    } 


	/**
     * @Route("/menu_menu",  name="menu_menu")
     */
	public function menu(): Response
    {
		$menus = $this->menuRepository->findMenu();

        /*$menus = $this->getDoctrine()
        ->getRepository(Menu::class)
        ->findAll();
        */
		
		/*   $repository = $this->getDoctrine()
                ->getRepository('Menu::class');
        $query = $repository->createQueryBuilder('m')
                ->orderBy('m.orden', 'ASC')
                ->getQuery();

        $menus = $query->getResult();
        */

        return $this->render('menu/menu.html.twig',array("menus"=>$menus));
    }   


    /**
     * @Route("/building",  name="building")
     */
	public function building(): Response
    {
        return $this->render('menu/building.html.twig');
    } 
	 
	  

}