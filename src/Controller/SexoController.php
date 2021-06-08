<?php

namespace App\Controller;

use App\Entity\Sexos;
use App\Form\SexoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SexoController extends AbstractController
{
    #[Route('/sexo', name: 'sexo')]
    public function index(Request $request): Response
    {
        $sexo = new Sexos();
        $form = $this->createForm(SexoType::class, $sexo);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($sexo);
            $em->flush();
            $this->addFlash(type: 'success', message: 'Se ha registrado exitosamente');
            return $this->redirectToRoute(route: 'user');
        }

        return $this->render('sexo/index.html.twig', [
            'controller_name' => 'SexoController',
            'formulario' => $form->createView()
        ]);
    }
}
