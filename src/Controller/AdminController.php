<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * @Rest\Route("/admin", name="admin")
 */
class AdminController extends Controller
{
    /**
     * @Rest\Get("/find-all-users", name="find.all.users")
     */
    public function findUsers()
    {
        $userData = $this->get("app.service.admin_service")->getAllUsers();
        return View::create($userData, Response::HTTP_OK,[]);
    }

       /**
     * @Rest\Post("/modify-user", name="modify.user")
     */
    public function modifyUser(Request $request)
    {
       try{
        $userJSONParams = $request->request;
        $data=$this->get("app.service.admin_service")->modifyTableByIdField($userJSONParams);
        return View::create($data, Response::HTTP_OK,[]);
       }catch(\Exception $exception){
        return View::create($exception, Response::HTTP_OK,[]);
       }
        
    }
	
	/**
     *  @Rest\Get("/find-user", name="find_user")
     *  @Rest\QueryParam(name="userId",requirements="\d+", nullable=false)
     */
    public function findUser(Request $request){
        $userParamJSON = $request->get('userId');
        if ($userParamJSON){
            $userData = $this->get('app.service.user_service')->getUser($userParamJSON);
            return new View($userData, Response::HTTP_OK);
        }

    }
}
