<?php

namespace App\Controller;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

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

    #[Route('/login', name: 'logIn')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // Last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/logout', name: 'logOut')]
    public function logout(): void
    {
        // Controller can be blank: it will never be executed!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}
