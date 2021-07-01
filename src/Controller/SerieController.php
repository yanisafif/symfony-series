<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function list(): Response
    {
        //todo: aller chercher les séries en BDD
        return $this->render('serie/list.html.twig', [

            ]);
    }
    /**
     * @Route("/details/{id}", name="details")
     */
    public function details(int $id): Response
    {
        //todo: aller chercher la série en BDD
        return $this->render('serie/details.html.twig', [

        ]);
    }
    /**
     * @Route("/create", name="create")
     */
    public function create(): Response
    {
        return $this->render('serie/create.html.twig', [

        ]);
    }
}
