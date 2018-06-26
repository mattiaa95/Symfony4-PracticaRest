<?php

namespace App\Service;
use Doctrine\ORM\EntityManager;

class UserService
{
private $em;
    public function __construct(EntityManager $entityManager)
    {
    $this->em = $entityManager;
    }

    public function getAllUsers()
    {
        $user = $this->em->getRepository(User::class)->findAll();
        return $user;
    }
}