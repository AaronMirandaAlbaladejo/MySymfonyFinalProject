<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

use App\Entity\Medico;
use App\Entity\Especialidad;

use App\Repository\MedicoRepository;
use App\Repository\EspecialidadRepository;

class CuadroMedicoController extends AbstractController
{
    /**
     * @Route("/private/especialidades", name="especialidades")
     */
    public function index()
    {
        // Recuperar el administrador de entidades de Doctrine
        $especialidades = $this->getDoctrine()->getRepository(Especialidad::class)->findAll();
        
        // Renderizar la vista de twig
        return $this->render('cuadroMedico/index.html.twig', ['especialidades' => $especialidades ]);
    }

    /**
     * @Route("/private/especialidades/{id}", name="especialidad")
     */
    public function listado(Especialidad $especialidad, Request $request, PaginatorInterface $paginator)
    {
        // Recuperar el administrador de entidades de Doctrine
        $em = $this->getDoctrine()->getManager();
        
       
	$query = $em->createQuery('SELECT m, e FROM App:Medico m inner join m.especialidad e where e.id = :id')
		->setParameter ('id', $especialidad);

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
        return $this->render('cuadroMedico/listado.html.twig', ['pagination' => $pagination ]);
    }
}
