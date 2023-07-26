<?php

namespace App\Controller\Front;

use App\Entity\Listing;
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

#[Route('/listing/show/{id}', name: 'app_listing_show')]
    public function handleRedirection(int $id): Response
    {
        $listing = $this->listingRepository->findOneBy(['id' => $id]);

            return $this->show($listing);

    }

    public function show(Listing $listing){

        return $this->render('front/pages/listing.html.twig', [
            'listing' => $listing,
        ]);
    }

}
