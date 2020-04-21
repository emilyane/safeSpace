<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccomodationController extends AbstractController
{
    /**
     * @Route("/accomodation", name="accomodation")
     */
    public function index()
    {
        return $this->render('accomodation/index.html.twig', [
            'controller_name' => 'AccomodationController',
        ]);
    }
}
