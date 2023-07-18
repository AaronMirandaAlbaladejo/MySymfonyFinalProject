<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Knplabs\KnpPaginatorBundle\KnpPaginatorBundle;
use Knp\Component\Pager\PaginatorInterface;

use App\Entity\Cita;
use App\Entity\Especialidad;
use App\Form\CitaType;
use App\Repository\CitaRepository;
use App\Repository\EspecialidadRepository;


class CitaController extends AbstractController
{
    /**
     * @Route("/cita", name="cita")
     */
    public function index(Request $request): Response
    {
        $cita = new Cita();
        $form = $this->createForm(CitaType::class, $cita);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cita);
            $entityManager->flush();

            return $this->render('cita/index.html.twig');
        
        } else {
            return $this->render('cita/form.html.twig', [
                'form' => $form->createView(),
            ]);
        }
    }

    /**
     * @Route("/private/citas", name="citas")
     */
    public function listarCitas( Request $request, PaginatorInterface $paginator)
    {
    //     // Recuperar el administrador de entidades de Doctrine
    //     $citas = $this->getDoctrine()->getRepository(Cita::class)->findAll();
        
    //     // Renderizar la vista de twig
    //     return $this->render('cita/listado.html.twig', ['citas' => $citas ]);

        // Recuperar el administrador de entidades de Doctrine
        $em = $this->getDoctrine()->getManager();
        
       
	$query = $em->createQuery('SELECT m FROM App:Cita m');

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
        return $this->render('cita/listado.html.twig', ['pagination' => $pagination ]);
    }

}
