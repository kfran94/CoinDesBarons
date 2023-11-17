<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(ReservationRepository $reservationRepository): Response
    {
        $reservationsMercredi = $reservationRepository->findBy(['day' => 'Mercredi']);
        $reservationsSamedi = $reservationRepository->findBy(['day' => 'Samedi']);

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'reservationsMercredi' => $reservationsMercredi,
            'reservationsSamedi' => $reservationsSamedi,
        ]);
    }

    #[Route('/delete_reservations', name: 'delete_reservations', methods: ['POST'])]
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

    #[Route('/delete_reservation/{id}', name: 'delete_reservation', methods: ['POST'])]
    public function deleteReservation(Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($reservation);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin');
    }
}
