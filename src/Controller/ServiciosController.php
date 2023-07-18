<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

use App\Entity\Servicio;
use App\Entity\Servicios;
use App\Entity\Medico;
use App\Entity\Especialidad;

use App\Repository\ServicioRepository;
use App\Repository\ServiciosRepository;
use App\Repository\MedicoRepository;
use App\Repository\EspecialidadRepository;



class ServiciosController extends AbstractController
{
    
    /**
     * @Route("/private/servicio", name="servicio")
     */
    public function index()
    {
        // Recuperar el administrador de entidades de Doctrine
        $servicio = $this->getDoctrine()->getRepository(Servicio::class)->findAll();
        
        // Renderizar la vista de twig
        return $this->render('servicios/index.html.twig', ['servicio' => $servicio ]);
    }

     /**
     * @Route("/private/servicios/{id}", name="servicios")
     */
    public function listado(Servicio $servicio, Request $request, PaginatorInterface $paginator)
    {
        // Recuperar el administrador de entidades de Doctrine
        $em = $this->getDoctrine()->getManager();
        
       
	$query = $em->createQuery('SELECT m, e FROM App:Servicios m inner join m.servicio e where e.id = :id order by m.orden')
		->setParameter ('id', $servicio);

        // Paginar los resultados de la consulta
        $pagination = $paginator->paginate( 
            // Consulta Doctrine, no resultados
            $query,
            // Definir el parámetro de la página
            $request->query->getInt('page', 1),
            // Items per page
            5
        );
        
        // Renderizar la vista de twig
        return $this->render('servicios/listado.html.twig', ['pagination' => $pagination ]);
    }



    // /**              INTENTO DE HACER QUE SE VEAN MEDICOS
    //  * @Route("/private/servicios/{id}", name="servicios")
    //  */
    // public function listado(Servicios $servicios, Request $request, PaginatorInterface $paginator)
    // {
    //     // Recuperar el administrador de entidades de Doctrine
    //     $em = $this->getDoctrine()->getManager();
        
    //     //how to do a query with tables Servicios and Servicio and Especialidad


    //     $query = $em->createQuery('SELECT s, e FROM Servicios s inner join Especialidad e where e.id = :id')
	// 	->setParameter ('id', $servicios);

    //     // Paginar los resultados de la consulta
    //     $pagination = $paginator->paginate( 
    //         // Consulta Doctrine, no resultados
    //         $query,
    //         // Definir el parámetro de la página
    //         $request->query->getInt('page', 1),
    //         // Items per page
    //         5
    //     );
        
       
    //     // Renderizar la vista de twig
    //     return $this->render('servicios/listado.html.twig', ['pagination' => $pagination]);
    // }
}
