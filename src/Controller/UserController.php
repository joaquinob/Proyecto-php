<?php

namespace App\Controller;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController {

    #[Route('/new/user', name: 'newUser')]
    public function createUser(EntityManagerInterface $doctrine, Request $request, UserPasswordHasherInterface $hasher): Response {
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            
            $originalPassword = $user->getPassword();
            $hashedPassword = $hasher->hashPassword($user, $originalPassword);
            $user->setPassword($hashedPassword);

            $doctrine->persist($user);
            $doctrine->flush();

            $this->addFlash('success', 'Usuario creado correctamente');
            
            return $this->redirectToRoute('filmsList');
        }

        return $this->render('user/newUser.html.twig', ['userForm' => $form]);
    }

    #[Route('/new/admin', name: 'newAdmin')]
    public function createAdmin(EntityManagerInterface $doctrine, Request $request, UserPasswordHasherInterface $hasher): Response {
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            
            $originalPassword = $user->getPassword();
            $hashedPassword = $hasher->hashPassword($user, $originalPassword);
            $user->setPassword($hashedPassword);

            $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);

            $doctrine->persist($user);
            $doctrine->flush();

            $this->addFlash('success', 'Administrador creado correctamente');
            
            return $this->redirectToRoute('filmsList');
        }

        return $this->render('user/newAdmin.html.twig', ['userForm' => $form]);
    }
}
