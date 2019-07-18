<?php

namespace App\Controller;

use App\Entity\Annonces;
use App\Form\AnnoncesType;
use App\Repository\AnnoncesRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

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
    public function nouvelleAnnonce(Request $request, ObjectManager $manager){

        $annonce = new Annonces();

        $form = $this->createForm(AnnoncesType::class, $annonce);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $manager->persist($annonce);
            $manager->flush();
        }
        
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