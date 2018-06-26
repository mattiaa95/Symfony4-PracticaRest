<?php

namespace App\Service;
use Doctrine\ORM\EntityManager;
use App\Entity\User;
class AdminService
{
    private $em;
    public function __construct(EntityManager $entityManager)
    {
    $this->em = $entityManager;
    }

    public function getAllUsers()//get only id,name,date
    {
        $users = [];
        $userData = $this->em->getRepository(User::class)->findAll();
        foreach ($userData as &$user) {
          $users []=[
              'id' =>$user->getId(),
              'name' =>$user->getName(),
              'registrydate' =>strtotime($user->getRegistryDate()->format('Y-m-d H:i:s'))
          ];
        }
        return $users;
    }

    public function modifyTableByIdField($UserJSON)
    {
        
        $user = $this->em->getRepository(User::class)->find($UserJSON->get('id'));
        $name = $UserJSON->get('name');
        if (isset($UserJSON ,$name)) {
            $user->setName($name);
            $this->em->flush();
        }
        return $user;
    }
}