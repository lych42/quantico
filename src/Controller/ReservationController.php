<?php

namespace App\Controller;

use App\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'reservation')]

    public function reservation(Request $request): Response
    {

    $reservation = new Reservation();
    $form = $this->createForm(Reservation::class, $reservation);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $nombre_convives = $reservation->getNombreConvives();
        $capacity = 20; // Capacité du restaurant (à ajuster selon votre configuration)

        if ($nombre_convives <= $capacity) {
            // Enregistrer la réservation dans la base de données
            //$entityManager = $doctrine->getManager();
            //$entityManager->persist($reservation);
            //$entityManager->flush();

            // Rediriger vers une page de confirmation de réservation
            return $this->redirectToRoute('confirmation');
        } else {
            // Gérer le cas où le nombre d'invités dépasse la capacité du restaurant
            $this->addFlash('error', 'Le nombre d\'invités dépasse la capacité du restaurant.');
        }
    }

    return $this->render('reservation.html.twig', [
        'form' => $form->createView(),
    ]);
}
}