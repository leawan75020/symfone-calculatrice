<?php

namespace App\Controller;

use index;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalculatriceController extends AbstractController
{
    #[Route('/calculatrice/accueil', name: 'app_calculatrice')]
    public function index(): Response
    {
        return $this->render('calculatrice/index.html.twig', [
            'controller_name' => 'CalculatriceController',
        ]);
    }

    #[Route('/calculatrice/additionner/{x}/{y}', name: 'app_calculatrice_additionner')]
    public function additionner(int $x, int $y): Response
    {
        //additionner x et y
        $total = $x+$y;
        //affichage du twig
        
        return $this->render('calculatrice/additionner.html.twig', [
            //envoye les parametre au twig
            'x' => $x,
            'y' => $y,
            'total' => $total
        ]);
    }
    
    #[Route('/calculatrice/soustraction/{x}/{y}', name: 'app_calculatrice_soustraction')]
    public function soustraction(int $x, int $y): Response
    {
        //additionner x et y
        $total = $x-$y;
        //affichage du twig
        return $this->render('calculatrice/soustraction.html.twig',[
            //envoye les parametre au twig
            'x' => $x,
            'y' => $y,
            'total' => $total
        ]);
    }

    #[Route('/calculatrice/multiplier/{x}/{y}', name: 'app_calculatrice_multiplier')]
    public function multiplier(int $x, int $y): Response
    {
        //additionner x et y
        $total = $x*$y;
        //affichage du twig
        return $this->render('calculatrice/multiplier.html.twig',[
            //envoye les parametre au twig
            'x' => $x,
            'y' => $y,
            'total' => $total
        ]);
    }

    #[Route('/calculatrice/diviser/{x}/{y}', name: 'app_calculatrice_diviser')]
    public function diviser(int $x, int $y): Response
    {
        //additionner x et y
        $total = $x/$y;
        //affichage du twig
        return $this->render('calculatrice/diviser.html.twig',[
            //envoye les parametre au twig
            'x' => $x,
            'y' => $y,
            'total' => $total
        ]);
    }
}