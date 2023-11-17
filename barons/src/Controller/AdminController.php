<?php

namespace App\Controller;

use App\Entity\MaxReservation;
use App\Entity\Reservation;
use App\Form\MaxReservationFromType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Attributes\Security;


class AdminController extends AbstractController
{
    #[Route('/baron/panel/admin', name: 'app_admin')]
    public function index(
        ReservationRepository $reservationRepository,
        EntityManagerInterface $entityManager,
        Request $request
    ): Response {
        // Récupérer la première entrée en base de données de MaxReservation ou l'initialiser à 32
        $maxReservation = $entityManager->getRepository(MaxReservation::class)->findOneBy([]);
        if (!$maxReservation) {
            $maxReservation = new MaxReservation();
            $maxReservation->setMaxReservation(32);
            $entityManager->persist($maxReservation);
            $entityManager->flush();
        }

        // Créer et gérer le formulaire
        $form = $this->createForm(MaxReservationFromType::class, $maxReservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrer les modifications
            $entityManager->flush();

            // Rediriger ou effectuer d'autres actions en fonction de vos besoins

            return $this->redirectToRoute('app_admin');
        }

        $reservationsMercredi = $reservationRepository->findBy(['day' => 'Mercredi']);
        $reservationsSamedi = $reservationRepository->findBy(['day' => 'Samedi']);

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'reservationsMercredi' => $reservationsMercredi,
            'reservationsSamedi' => $reservationsSamedi,
            'maxReservationForm' => $form->createView(),
        ]);
    }

    #[Route('/baron_delete_reservations', name: 'delete_reservations', methods: ['POST'])]
    public function deleteReservations(Request $request, ReservationRepository $reservationRepository, EntityManagerInterface $entityManager): Response
    {
        $day = $request->request->get('day');
        $reservationsToDelete = $reservationRepository->findBy(['day' => $day]);

        foreach ($reservationsToDelete as $reservation) {
            $entityManager->remove($reservation);
        }

        $entityManager->flush();

        return $this->redirectToRoute('app_admin');
    }

    #[Route('/baron_delete_reservation/{id}', name: 'delete_reservation', methods: ['POST'])]
    public function deleteReservation(Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($reservation);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin');
    }



}
