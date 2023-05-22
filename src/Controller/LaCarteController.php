<?php

namespace App\Controller;

use App\Repository\HorairesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LaCarteController extends AbstractController
{
    #[Route('/lacarte', name: 'la_carte')]
    public function index(HorairesRepository $horaires): Response
    {
        return $this->render('la_carte/index.html.twig', [
            'controller_name' => 'LaCarteController',
            'horaires' => $horaires->findAll(),
        ]);
    }
}
