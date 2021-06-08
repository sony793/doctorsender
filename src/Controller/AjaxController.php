<?php

namespace App\Controller;

use App\Entity\Usuarios;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjaxController extends AbstractController
{
    #[Route('/ajax', name: 'ajax')]
    public function index(): Response
    {
        return $this->render('ajax/index.html.twig', [

        ]);
    }

    #[Route('/api/usuarios', name: 'api_usuarios')]
    public function apiUsuarios(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $response = new JsonResponse($em->getRepository(Usuarios::class)->ObtenerTodosLosUsuarios());
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:4200');

        return $response;
    }
}
