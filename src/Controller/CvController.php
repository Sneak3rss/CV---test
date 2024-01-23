<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CvController extends AbstractController
{
    #[Route('/', name: 'app_cv')]
    public function index(): Response
    {
        $projetDir= $this->getParameter('kernel.project_dir');

        $json = file_get_contents($projetDir.'/import/cv.json');

        $cv = json_decode($json, true);

        return $this->render('cv/index.html.twig', [
            'cv' => $cv,
        ]);
    }
}
