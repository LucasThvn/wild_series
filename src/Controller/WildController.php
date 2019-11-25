<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WildController extends AbstractController
{
    /**
     * @Route("/wild", name="wild_index")
     */

    public function index(): Response
    {
        return $this->render('wild/index.html.twig', [
            'website' => 'Wild Séries',
        ]);
    }


    /**
     * @Route("/wild/show/{slug}",name="wild_show")
     */

    public function show(string $slug = ''): Response
    {
        if ($slug === '') {
            $response = 'Aucune série sélectionnée, veuillez choisir une série';
        } elseif (preg_match("/[A-Z]/", $slug)!=0 || strpos($slug, '_')) {
        header('HTTP/1.0 404 Not Found');
            exit;
        } else {
            $response = ucwords(implode(' ',explode('-', $slug)));
        }
        return $this->render('wild/show.html.twig', ['slug' => $response]);
    }
}