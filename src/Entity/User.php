<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
    * @ORM\ManyToMany(targetEntity="Profile", inversedBy="id")
    */
    private $profiles;


    /**
     * 
     * @ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="user")
     */
    private $post;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=50)
     */
    private $lastName;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="string")
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registry_date", type="datetime")
     */
    private $registryDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="unregistry_date", type="datetime", nullable=true)
     */
    private $unregistryDate;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set userId
     *
     * @param string $dni
     *
     * @return User
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set registryDate
     *
     * @param \DateTime $registryDate
     *
     * @return User
     */
    public function setRegistryDate($registryDate)
    {
        $this->registryDate = $registryDate;

        return $this;
    }

    /**
     * Get registryDate
     *
     * @return \DateTime
     */
    public function getRegistryDate()
    {
        return $this->registryDate;
    }

    /**
     * Set unregistryDate
     *
     * @param \DateTime $unregistryDate
     *
     * @return User
     */
    public function setUnregistryDate($unregistryDate)
    {
        $this->unregistryDate = $unregistryDate;

        return $this;
    }

    /**
     * Get unregistryDate
     *
     * @return \DateTime
     */
    public function getUnregistryDate()
    {
        return $this->unregistryDate;
    }

    public function getRoles(){
        return array('ROLE_USER');
    }

    public function getSalt(){
        return null;
    }

    public function getUserName(){
        return $this->dni;
    }

    public function eraseCredentials(){}
}

