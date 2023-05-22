<?php

namespace App\Controller;

use App\Repository\HorairesRepository;
use App\Entity\Horaires;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(HorairesRepository $horaires, ): Response
    {
        return $this->render('homepage/index.html.twig', [
            'horaires' => $horaires->findAll(),
        ]);
    }
}
