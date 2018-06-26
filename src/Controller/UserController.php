<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class UserController extends Controller
{
    /**
     * @Route("/user")
     */
    public function index()
    {
        $userdata = $this->get("app.service.user_service")->getAllUsers();
        return View::create($userdata, Response::HTTP_OK,[]);
    }
}
