<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationFormType;
use App\Repository\HorairesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;


class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'reservation')]

    public function reservation(Request $request, ManagerRegistry $doctrine, HorairesRepository $horaires): Response
    {
    $reservation = new Reservation();
    $form = $this->createForm(ReservationFormType::class, $reservation);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $nombre_convives = $reservation->getNombreConvives();
        $capacity = 20; // Capacité du restaurant (à ajuster selon votre configuration)

        if ($nombre_convives <= $capacity) {
            // Enregistrer la réservation dans la base de données
            $entityManager = $doctrine->getManager();
            $entityManager->persist($reservation);
            $entityManager->flush();
            // Rediriger vers une page de confirmation de réservation
            return $this->redirectToRoute('homepage');
        } else {
            // Gérer le cas où le nombre d'invités dépasse la capacité du restaurant
            $this->addFlash('error', 'Le nombre d\'invités dépasse la capacité du restaurant.');
        }
    }


    return $this->render('reservation/index.html.twig', [
        'form' => $form->createView(),
        'horaires' => $horaires->findAll(),
    ]);
    }
}