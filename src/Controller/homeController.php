<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class homeController extends AbstractController{

    /**
    * @Route("/home", name="homepage")
    */
    public function home(){

        $nombres = ["Juan" => 17, "Pablo" => 22];

        return $this->render('home.html.twig', 
        ['greeting' => "Who is underage?",
        'age' => 19,
        'tabla' => $nombres
        ]);

    }
    
    /**
    * @Route("/bonjour/{nombre}/{age}", name="bonjour_complet")
    * @Route("/bonjour/{nombre}", name="bonjour")
    * @Route("/bonjour", name="bonjour_simple")
    */
    public function bonjour($nombre="", $age=""){

        $str = "Bonjour " . $nombre;
        if($age !== "") $str = $str . ", tu as " . $age . " ans.";

        return new Response($str);

    }
}