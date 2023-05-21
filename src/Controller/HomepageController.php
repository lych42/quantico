<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Photo;


class HomepageController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/', name: 'homepage')]
    public function index()
    {
        $photoRepository = $this->entityManager->getRepository(Photo::class);
        $photos = $photoRepository->findAll();

        return $this->render('homepage/index.html.twig', [
            'user' => $this->getUser(),
            'photos' => $photos,
        ]);
    }

    /**
 * @Route("/next-photo/{currentIndex}/{maxIndex}", name="next_photo")
 */
public function nextPhoto(int $currentIndex, int $maxIndex)
{
    $nextIndex = ($currentIndex + 1) % $maxIndex;
    return $this->redirectToRoute('homepage', ['currentIndex' => $nextIndex]);
}

/**
 * @Route("/previous-photo/{currentIndex}/{maxIndex}", name="previous_photo")
 */
public function previousPhoto(int $currentIndex, int $maxIndex)
{
    $previousIndex = ($currentIndex - 1 + $maxIndex) % $maxIndex;
    return $this->redirectToRoute('homepage', ['currentIndex' => $previousIndex]);
}
}
