<?php

namespace App\Controller;

use App\Entity\Film;
use App\Entity\Stars;
use App\Form\FilmType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController{
    #[Route('/film/{id}', name: 'showFilms')]
    public function getFilms(EntityManagerInterface $doctrine, $id){
        $repository = $doctrine -> getRepository(Film::class);
        $film = $repository -> find($id);

        return $this -> render('films/film.html.twig', ['film' => $film]);
    }

    #[Route('/films', name: 'filmsList')]
    public function films(EntityManagerInterface $doctrine){
        $repository = $doctrine -> getRepository(Film::class);
        $films = $repository -> findAll();

        return $this -> render('films/listFilms.html.twig', ['films' => $films]);
    }

    #[Route('new/films')]
    public function insertFilms(EntityManagerInterface $doctrine){
    $film = new Film();
    $film -> setTitle('The Matrix');
    $film -> setGenres('Action', 'Sci-Fi');
    $film -> setYear(1999);
    $film -> setPoster('https://www.filmaffinity.com/imgs/movies/full/61/613505.jpg');
    $film -> setMainActors('Keanu Reeves', 'Laurence Fishburne', 'Carrie-Anne Moss');
    $film -> setDirector('Lana Wachowski, Lilly Wachowski');
    $film -> setSynopsis('A hacker discovers the hidden truth behind his reality and joins a rebellion to free humanity from a machine-controlled simulation.');

    $film1 = new Film();
    $film1 -> setTitle('Se7en');
    $film1 -> setGenres('Drama', 'Thriller');
    $film1 -> setYear(1995);
    $film1 -> setPoster('https://www.filmaffinity.com/imgs/movies/full/56/569179.jpg');
    $film1 -> setMainActors('Brad Pitt', 'Morgan Freeman', 'Gwyneth Paltrow');
    $film1 -> setDirector('David Fincher');
    $film1 -> setSynopsis('Two detectives investigate a series of murders inspired by the seven deadly sins.');

    $film2 = new Film();
    $film2 -> setTitle('Toy Story 3');
    $film2 -> setGenres('Animation', 'Adventure');
    $film2 -> setYear(2010);
    $film2 -> setPoster('https://www.filmaffinity.com/imgs/movies/full/30/305098.jpg');
    $film2 -> setMainActors('Tom Hanks', 'Tim Allen', 'Joan Cusack');
    $film2 -> setDirector('Lee Unkrich');
    $film2 -> setSynopsis('Woody, Buzz Lightyear, and the rest of the toys face uncertainty as their owner, Andy, prepares to go to college.');

    $film3 = new Film();
    $film3 -> setTitle('Thor: Love and Thunder');
    $film3 -> setGenres('Action', 'Adventure');
    $film3 -> setYear(2022);
    $film3 -> setPoster('https://www.filmaffinity.com/imgs/movies/full/100/100930.jpg');
    $film3 -> setMainActors('Chris Hemsworth', 'Natalie Portman', 'Tom Hiddleston');
    $film3 -> setDirector('Taika Waititi');
    $film3 -> setSynopsis('Thor must save the universe once again as new threats emerge, testing his strength and resolve.');

    $film4 = new Film();
    $film4 -> setTitle('La La Land');
    $film4 -> setGenres('Comedy', 'Romance');
    $film4 -> setYear(2016);
    $film4 -> setPoster('https://www.filmaffinity.com/imgs/movies/full/200/200345.jpg');
    $film4 -> setMainActors('Emma Stone', 'Ryan Gosling', 'John Legend');
    $film4 -> setDirector('Damien Chazelle');
    $film4 -> setSynopsis('A jazz musician and an aspiring actress navigate their careers and relationship in modern-day Los Angeles.');

    $film5 = new Film();
    $film5 -> setTitle('Arrival');
    $film5 -> setGenres('Sci-Fi', 'Thriller');
    $film5 -> setYear(2016);
    $film5 -> setPoster('https://www.filmaffinity.com/imgs/movies/full/300/300254.jpg');
    $film5 -> setMainActors('Amy Adams', 'Jeremy Renner', 'Forest Whitaker');
    $film5 -> setDirector('Denis Villeneuve');
    $film5 -> setSynopsis('A linguist works with the military to communicate with alien life forms after they land on Earth.');

    $film6 = new Film();
    $film6 -> setTitle('The Post');
    $film6 -> setGenres('Drama', 'Biography');
    $film6 -> setYear(2017);
    $film6 -> setPoster('https://www.filmaffinity.com/imgs/movies/full/400/400223.jpg');
    $film6 -> setMainActors('Meryl Streep', 'Tom Hanks', 'Sarah Paulson');
    $film6 -> setDirector('Steven Spielberg');
    $film6 -> setSynopsis('The story of the Washington Post\'s attempt to publish the Pentagon Papers, detailing the government\'s secret history of the Vietnam War.');

    $film7 = new Film();
    $film7 -> setTitle('Hereditary');
    $film7 -> setGenres('Horror', 'Thriller');
    $film7 -> setYear(2018);
    $film7 -> setPoster('https://www.filmaffinity.com/imgs/movies/full/500/500112.jpg');
    $film7 -> setMainActors('Toni Collette', 'Alex Wolff', 'Milly Shapiro');
    $film7 -> setDirector('Ari Aster');
    $film7 -> setSynopsis('After the family matriarch passes away, a grieving family is haunted by tragic and disturbing occurrences.');

    $film8 = new Film();
    $film8 -> setTitle('Onward');
    $film8 -> setGenres('Animation', 'Family');
    $film8 -> setYear(2020);
    $film8 -> setPoster('https://www.filmaffinity.com/imgs/movies/full/600/600321.jpg');
    $film8 -> setMainActors('Tom Holland', 'Chris Pratt', 'Julia Louis-Dreyfus');
    $film8 -> setDirector('Dan Scanlon');
    $film8 -> setSynopsis('Two teenage elf brothers embark on a quest to discover if there is still magic left in their world.');

    $film9 = new Film();
    $film9 -> setTitle('No Time to Die');
    $film9 -> setGenres('Action', 'Crime');
    $film9 -> setYear(2021);
    $film9 -> setPoster('https://www.filmaffinity.com/imgs/movies/full/700/700102.jpg');
    $film9 -> setMainActors('Daniel Craig', 'Ana de Armas', 'Rami Malek');
    $film9 -> setDirector('Cary Joji Fukunaga');
    $film9 -> setSynopsis('James Bond has left active service. His peace is short-lived when Felix Leiter, an old friend from the CIA, turns up asking for help.');

    $film10 = new Film();
    $film10 -> setTitle('A Star Is Born');
    $film10 -> setGenres('Comedy', 'Drama');
    $film10 -> setYear(2018);
    $film10 -> setPoster('https://www.filmaffinity.com/imgs/movies/full/800/800211.jpg');
    $film10 -> setMainActors('Bradley Cooper', 'Lady Gaga', 'Sam Elliott');
    $film10 -> setDirector('Bradley Cooper');
    $film10 -> setSynopsis('A musician helps a young singer find fame as age and alcoholism send his own career into a downward spiral.');
    
    $stars1 = new Stars();
    $stars1 -> setName('1 ⭐');

    $stars2 = new Stars();
    $stars2 -> setName('1,5 ⭐');

    $stars3 = new Stars();
    $stars3 -> setName('2 ⭐');

    $stars4 = new Stars();
    $stars4 -> setName('2,5 ⭐');

    $stars5 = new Stars();
    $stars5 -> setName('3 ⭐');

    $stars6 = new Stars();
    $stars6 -> setName('3,5 ⭐');

    $stars7 = new Stars();
    $stars7 -> setName('4 ⭐');

    $stars8 = new Stars();
    $stars8 -> setName('4,5 ⭐');

    $stars9 = new Stars();
    $stars9 -> setName('5 ⭐');

    $film -> addStar($stars7);
    $film1 -> addStar($stars8);
    $film2 -> addStar($stars7);
    $film3 -> addStar($stars4);
    $film4 -> addStar($stars6);
    $film5 -> addStar($stars6);
    $film6 -> addStar($stars5);
    $film7 -> addStar($stars8);
    $film8 -> addStar($stars5);
    $film9 -> addStar($stars5);
    $film10 -> addStar($stars5);

    $doctrine -> persist($film);
    $doctrine -> persist($film1);
    $doctrine -> persist($film2);
    $doctrine -> persist($film3);
    $doctrine -> persist($film4);
    $doctrine -> persist($film5);
    $doctrine -> persist($film6);
    $doctrine -> persist($film7);
    $doctrine -> persist($film8);
    $doctrine -> persist($film9);
    $doctrine -> persist($film10);

    $doctrine -> persist($stars1);
    $doctrine -> persist($stars2);
    $doctrine -> persist($stars3);
    $doctrine -> persist($stars4);
    $doctrine -> persist($stars5);
    $doctrine -> persist($stars6);
    $doctrine -> persist($stars7);
    $doctrine -> persist($stars8);
    $doctrine -> persist($stars9);

    $doctrine -> flush();

    return new Response('Peliculas subidas correctamente');
    }

    #[Route('/upload/film', name: 'uploadFilm')]
    public function uploadFilm(EntityManagerInterface $doctrine, Request $request) {
        $form = $this -> createForm(FilmType::class);
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid()){
            $film = $form -> getData();
            $doctrine -> persist($film);
            $doctrine -> flush();

            $this -> addFlash(type: 'Success', message: 'Pelicula cargada correctamente');

            return $this -> redirectToRoute('filmsList');
        }

        return $this -> render('films/newFilm.html.twig', ['filmForm' => $form]);
    }

    #[Route('/edit/film/{id}', name: 'editFilm')]
    public function editFilm(EntityManagerInterface $doctrine, Request $request, $id){
        $repository = $doctrine -> getRepository(Film::class);
        $film = $repository -> find($id);

        $form = $this -> createForm(FilmType::class, $film);
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid()){
            $film = $form -> getData();
            $doctrine -> persist($film);
            $doctrine -> flush();

            $this -> addFlash(type: 'Success', message: 'Pelicula editada correctamente');

            return $this -> redirectToRoute('filmsList');
        }

        return $this -> render('films/newFilm.html.twig', ['filmForm' => $form]);
    }

    #[Route('/delete/film/{id}', name: 'deleteFilm')]
    public function deleteFilm(EntityManagerInterface $doctrine, Request $request, $id){
        $repository = $doctrine -> getRepository(Film::class);
        $film = $repository -> find($id);

        $doctrine -> remove($film);
        $doctrine -> flush();

        return $this -> redirectToRoute('filmsList');
    }
}