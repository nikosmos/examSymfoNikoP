<?php

namespace App\Controller\Front;

use App\Repository\ListingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListingController extends AbstractController
{
    public function __construct(
        private ListingRepository $listingRepository,
    ){}


    #[Route('/listing', name: 'app_listing')]
    public function index(): Response
    {
        return $this->render('listing/index.html.twig', [
            'controller_name' => 'ListingController',
        ]);
    }


    public function handleRedirection(string $title, Request $request): Response
    {
        $listing = $this->listingRepository->findOneBy($title);


            return $this->show($listing, $request);

    }
}
