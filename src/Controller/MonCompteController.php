<?php

namespace App\Controller;

use App\Repository\HorairesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MonCompteController extends AbstractController
{
    #[Route('/moncompte', name: 'mon_compte')]
    public function index(HorairesRepository $horaires): Response
    {

        $user = $this->getUser();

        return $this->render('mon_compte/index.html.twig', [
            'user' => $user,
            'horaires' => $horaires->findAll(),
        ]);
    }
}
