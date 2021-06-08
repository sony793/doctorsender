<?php

namespace App\Controller;

use App\Entity\Usuarios;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'user')]
    public function index(Request $request): Response
    {
        $user = new Usuarios();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash(type: 'success', message: "'".$user->getNombre()." ".$user->getApellidos()."' se ha registrado exitosamente");
            //return $this->redirectToRoute(route: 'usuarios');
            return $this->redirect($_ENV["UICLIENT_URL"]);
        }

        return $this->render('user/index.html.twig', [
            'formulario' => $form->createView(),
            'uiclient_url' => $_ENV["UICLIENT_URL"],
        ]);
    }

    #[Route('/user/edit/{id}', name: 'edit_user')]
    public function editUser($id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(Usuarios::class)->find($id);
        if(!$user){
            throw $this->createNotFoundException('El usuario con ID '.$id.' no existe');
        }

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user->setNombre($user->getNombre());
            $user->setApellidos($user->getApellidos());
            $user->setFechaNacimiento($user->getFechaNacimiento());
            $user->setEstado($user->getEstado());
            $user->setSexo($user->getSexo());

            $em->flush();
            $this->addFlash(type: 'success', message: "Los datos de '".$user->getNombre()." ".$user->getApellidos()."' han sido modificados");
            //return $this->redirectToRoute(route: 'usuarios');
            return $this->redirect($_ENV["UICLIENT_URL"]);
        }

        return $this->render('user/index.html.twig', [
            'formulario' => $form->createView(),
            'uiclient_url' => $_ENV["UICLIENT_URL"],
        ]);
    }

    #[Route('/user/delete/{id}', name: 'delete_user')]
    public function deleteUser($id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(Usuarios::class)->find($id);
        if(!$user){
            throw $this->createNotFoundException('El usuario con ID '.$id.' no existe');
        }

        $em->remove($user);
        $em->flush();

        $this->addFlash(type: 'success', message: "El usuario '".$user->getNombre()." ".$user->getApellidos()."' se ha eliminado correctamente");
        //return $this->redirectToRoute(route: 'usuarios');
        return $this->redirect($_ENV["UICLIENT_URL"]);
    }
}
