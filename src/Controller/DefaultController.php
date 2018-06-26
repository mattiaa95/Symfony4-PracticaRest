<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;



class DefaultController extends FOSRestController
{
    /**
     * @Route("/default")
     */
    public function index()
    {
        return new View(['message' => 'Hola Mundo'], Response::HTTP_OK);
    }
}
