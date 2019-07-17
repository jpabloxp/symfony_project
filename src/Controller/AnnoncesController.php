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
     * @Route("/annonces/new", name="nouvelle_annonce")
     */
    public function nouvelleAnnonce(AnnoncesRepository $repo){

        $annonce = new Annonces();

        $form = $this->createFormBuilder($annonce)
                    ->add('titre')
                    ->add('prix')
                    ->add('description')
                    ->add('photo')
                    ->getForm();
        
        return $this->render('annonces/new.html.twig', [
            'form' => $form->createView()
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