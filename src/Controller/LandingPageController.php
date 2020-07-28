<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\OrderType;
use App\Manager\OrderManager;

class LandingPageController extends AbstractController
{
    /**
     * @Route("/", name="landing_page")
     * @throws \Exception
     */
    public function index(Request $request)
    {
        //Your code here

        return $this->render('landing_page/index_new.html.twig', [

        ]);
    }
    /**
     * @Route("/confirmation", name="confirmation")
     */
    public function confirmation()
    {
        return $this->render('landing_page/confirmation.html.twig', [

        ]);
    }
}