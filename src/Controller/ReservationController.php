<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'reservation')]
    public function index(): Response
    {

        $user = $this->getUser();

        return $this->render('reservation/index.html.twig', [
            'user' => $user,

        ]);
    }
}
