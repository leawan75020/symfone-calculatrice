<?php

namespace App\Controller;

use index;
use SebastianBergmann\Complexity\Calculator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalculatriceController extends AbstractController
{
    #[Route('/calculatrice/accueil', name: 'app_calculatrice')]
    public function index(Request $request): Response
    {
        //tester la request est post  (si le formulaire est envoyé)
        if($request->isMethod('POST')){
            //recupere les champs du formulaires(l'opration, x et y)
            $operation= $request->request->get('operation');
            $x= $request->request->get('x');
            $y= $request->request->get('y');

            //si operation est une addition
            if($operation=='addition'){
                //rediriger vers la page d'addition
                return $this->redirectToRoute('app_calculatrice_addition', [
                    //speccification des 2 parametres 
                    'x' => $x,
                    'y' => $y,
                ]);
            }

            //si operation est une soustraction
            if($operation=='soustraction'){
                //rediriger vers la page d'soustraction
                return $this->redirectToRoute('app_calculatrice_soustraction', [
                    //speccification des 2 parametres 
                    'x' => $x,
                    'y' => $y,
                ]);
            }

            //si operation est une multiplication
            if($operation=='multiplication'){
                //rediriger vers la page d'multiplication
                return $this->redirectToRoute('app_calculatrice_multiplication', [
                    //speccification des 2 parametres 
                    'x' => $x,
                    'y' => $y,
                ]);
            }

            //si operation est une division
            if($operation=='division'){
                //rediriger vers la page d'division
                return $this->redirectToRoute('app_calculatrice_division', [
                    //speccification des 2 parametres 
                    'x' => $x,
                    'y' => $y,
                ]);
            }


        }


        return $this->render('calculatrice/index.html.twig', [
            'controller_name' => 'CalculatriceController',
            
        ]);
    }

    #[Route('/calculatrice/addition/{x}/{y}', name: 'app_calculatrice_addition')]
    public function addition(int $x, int $y): Response
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
        //soustraction x et y
        $total = $x-$y;
        //affichage du twig
        return $this->render('calculatrice/soustraction.html.twig',[
            //envoye les parametre au twig
            'x' => $x,
            'y' => $y,
            'total' => $total
        ]);
    }

    #[Route('/calculatrice/multiplication/{x}/{y}', name: 'app_calculatrice_multiplication')]
    public function multiplication(int $x, int $y): Response
    {
        //multiplier x et y
        $total = $x*$y;
        //affichage du twig
        return $this->render('calculatrice/multiplier.html.twig',[
            //envoye les parametre au twig
            'x' => $x,
            'y' => $y,
            'total' => $total
        ]);
    }

    #[Route('/calculatrice/division/{x}/{y}', name: 'app_calculatrice_division')]
    public function division(int $x, int $y): Response
    {
        //division x et y
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