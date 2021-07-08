<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Form\SerieType;
use App\Repository\SerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

// php bin/console make:controller Serie pour crée une class directement avec la use ect


//on peut faire comme ceci pour ne pas être obligé de spécifié dans les méthodes quel base de route il doit suivre
/**
 * @Route("/series", name="series_")
 *
 */
class SerieController extends AbstractController
{
    /**
     * @Route("", name="list")
     */
    public function list(SerieRepository $serieRepository): Response
    {
        //$series = $serieRepository->findBy([], ['popularity' => 'DESC', 'vote' => 'DESC'], 30 );
        $series = $serieRepository->findBestSeries();
        return $this->render('serie/list.html.twig', [
                "series" => $series
            ]);
    }
    /**
     * @Route("/details/{id}", name="details")
     */
    public function details(int $id, SerieRepository $serieRepository): Response
    {
        $serie = $serieRepository->find($id);
        if(!$serie){
            throw $this->createNotFoundException('Ohhhh nooooooo!!!');
        }


        return $this->render('serie/details.html.twig', [
            "serie" => $serie
        ]);
    }
    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $serie = new Serie();
        $serie->setDateCreated(new \DateTime());
        $serieForm = $this->createForm(SerieType::class, $serie);

        // Pour envoyer à la même page les infos
        // faire un dump de serie pour voir
        $serieForm->handleRequest($request);

        if ($serieForm->isSubmitted() && $serieForm->isValid()){

            $entityManager->persist($serie);
            $entityManager->flush();

            $this->addFlash('success', 'Serie added ! Good Job!');

            return $this->redirectToRoute('series_details', ['id' => $serie->getId()]);
        }


        return $this->render('serie/create.html.twig', [
            'serieForm' => $serieForm->createView()
        ]);
    }

    // débogage : dump() altérnative à var_dump()
    // dd() dump and die

    /**
     * @Route("/demo", name="em-demo")
     */
    public function demo(EntityManagerInterface $entityManager): Response
    {
        //crée une instance de mon entité
        $serie = new Serie();


        // TOUTE L'hydratation que on a fait
        $serie->setName('pif');
        $serie->setBackdrop('dafsd');
        $serie->setPoster('dafsdf');
        $serie->setDateCreated(new \DateTime());
        $serie->setFirstAirDate(new \DateTime("- 1 year"));
        $serie->setLastAirDate(new \DateTime("- 6 month"));
        $serie->setGenres('drama');
        $serie->setOverview(' bla bla bla');
        $serie->setPopularity('123.00');
        $serie->setVote(8.2);
        $serie->setStatus('canceled');
        $serie->setTmdbId(329432);

        // pour sauvegarder des donées
        // persist va le mettre "en cache" les données
        $entityManager->persist($serie);
        // flush va executer
        $entityManager->flush();

        // entity manager on peut aussi supprimer
        $entityManager-> remove($serie);
        $entityManager-> flush();
        return $this->render('serie/create.html.twig', [

        ]);
    }
    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Serie $serie, EntityManagerInterface $entityManager){
        $entityManager->remove($serie);
        $entityManager->flush();
        return $this->redirectToRoute('main_home');
    }
}
