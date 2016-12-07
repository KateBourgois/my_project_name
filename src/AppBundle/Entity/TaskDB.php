<?php
// src/AppBundle/Entity/TaskDB.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="gamers")
 */
class TaskDB
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    public $street;

    /**
     * @ORM\Column(type="string", length=100)
     */
    public $firstname;

     /**
     * @ORM\Column(type="string", length=100)
     */
    public $name;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    public $email;

    /**
     * @ORM\Column(type="integer",  length=50)
     */
    public $number;

    /**
     * @ORM\Column(type="string",  length=5)
     */
    public $bus;

    /**
     * @ORM\Column(type="integer",  length=4)
     */
    public $postcode;
    
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    public $city;
    
    
    /**
     * @ORM\Column(type="string",  length=100)
     */
    public $gsm;
    
    /**
     * @ORM\Column(type="string", length=20)
     */
    public $password;
    
    /**
     * @ORM\Column(type="string",nullable=true,  length=100)
     */
    public $spinned;//played
    
    /**
     * @ORM\Column(type="string",nullable=true,  length=100)
     */
    public $auth;
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set street
     *
     * @param \string $street
     *
     * @return TaskDB
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return \text
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set email
     *
     * @param \string $email
     *
     * @return TaskDB
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return \string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set number
     *
     * @param string $number
     *
     * @return TaskDB
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return TaskDB
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return TaskDB
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
     * Set bus
     *
     * @param string $bus
     *
     * @return TaskDB
     */
    public function setBus($bus)
    {
        $this->bus = $bus;

        return $this;
    }

    /**
     * Get bus
     *
     * @return string
     */
    public function getBus()
    {
        return $this->bus;
    }

    /**
     * Set postcode
     *
     * @param integer $postcode
     *
     * @return TaskDB
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return integer
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return TaskDB
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set gsm
     *
     * @param integer $gsm
     *
     * @return TaskDB
     */
    public function setGsm($gsm)
    {
        $this->gsm = $gsm;

        return $this;
    }

    /**
     * Get gsm
     *
     * @return integer
     */
    public function getGsm()
    {
        return $this->gsm;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return TaskDB
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
     * Set spinned
     *
     * @param integer $spinned
     *
     * @return TaskDB
     */
    public function setSpinned($spinned)
    {
        $this->spinned = $spinned;

        return $this;
    }

    /**
     * Get spinned
     *
     * @return integer
     */
    public function getSpinned()
    {
        return $this->spinned;
    }
    
    
    /**
     * Set auth
     *
     * @param string $auth
     *
     * @return TaskDB
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;

        return $this;
    }

    /**
     * Get spinned
     *
     * @return string
     */
    public function getAuth()
    {
        return $this->auth;
    }
}
