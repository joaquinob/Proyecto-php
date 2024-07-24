<?php

namespace App\Controller;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController{

    #[Route('/new/user', name: 'newUser')]
    public function uploadPiso (EntityManagerInterface $doctrine, Request $request, UserPasswordHasherInterface $hasher) {
       $form = $this -> createForm(UserType::class);
       $form -> handleRequest($request);

       if( $form -> isSubmitted() &&  $form -> isValid() ){
            $user = $form -> getData();
            
            $originalPassword =  $user -> getPassword();
            $scriptedPassword = $hasher -> hashPassword( $user, $originalPassword );
            $user -> setPassword($scriptedPassword);

            $doctrine -> persist($user);
            $doctrine -> flush();

            $this -> addFlash(type:'exito', message:'Usuario creado correctamente');
            
            return $this -> redirectToRoute('FilmsList');
       }

        return $this -> render('films/newFilm.html.twig', ['filmForm' => $form]);
        

    }


    #[Route('/new/admin', name: 'newAdmin')]
    public function newPiso (EntityManagerInterface $doctrine, Request $request, UserPasswordHasherInterface $hasher) {
       $form = $this -> createForm(UserType::class);
       $form -> handleRequest($request);

       if( $form -> isSubmitted() &&  $form -> isValid() ){
            $user = $form -> getData();
            
            $originalPassword =  $user -> getPassword();
            $scriptedPassword = $hasher -> hashPassword( $user, $originalPassword );
            $user -> setPassword($scriptedPassword);

            $user -> setRoles(['ROLE_USER', 'ROLE_ADMIN']);

            $doctrine -> persist($user);
            $doctrine -> flush();

            $this -> addFlash(type:'exito', message:'Usuario creado correctamente');
            
            return $this -> redirectToRoute('FilmsList');
        }

        return $this -> render('films/newFilm.html.twig', ['filmForm' => $form]);
    }

}
