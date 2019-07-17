<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Annonces;
use App\Repository\AnnoncesRepository;

class AnnoncesController extends AbstractController
{
    /**
     * @Route("/annonces", name="annonces")
     */
    public function index(AnnoncesRepository $repo)
    {
        //$repo = $this->getDoctrine()->getRepository(Annonces::class);
        $annonces = $repo->findAll();

        return $this->render('annonces/index.html.twig', [
            'annonces' => $annonces
        ]);
    }

    /**
     * @Route("/annonce/{id}", name="une_seule_annonce")
     */
    public function uneSeuleAnnonce($id, AnnoncesRepository $repo){

        $annonce = $repo->findOneById($id);
        
        return $this->render('annonces/annonceSeule.html.twig', [
            'annonce' => $annonce
        ]);
    }

}