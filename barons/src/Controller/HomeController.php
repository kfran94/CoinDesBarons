<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\RegistrationFormType;
use App\Form\ReservationFormType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $managerRegistery;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }



    #[Route('/', name: 'app_home')]
    public function index(Request $request, ReservationRepository $reservationRepository): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationFormType::class, $reservation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $selectedDay = $reservation->getDay(); // Assurez-vous que votre entité a une méthode getDay()

            // Ajoutez la vérification du nombre de réservations pour le jour sélectionné
            $reservationCount = $reservationRepository->countReservationsForDay($selectedDay);

            // Remplacez 32 par le nombre maximum de réservations autorisées pour le jour sélectionné
            $maxReservationsAllowed = 32;

            if ($reservationCount >= $maxReservationsAllowed) {
                // Gérer le cas où le nombre maximum de réservations est atteint
                return $this->render('full/full.html.twig', [
                    'form' => $form->createView(),
                ]);
            }

            $entityManager = $this->managerRegistry->getManager();
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->render('succes/succes.html.twig', [
                'message' => 'Vous avez été pré-inscrit avec succès',
                'alert' => 'success',
            ]);
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
        ]);
    }

}
