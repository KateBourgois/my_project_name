<?php

// src/AppBundle/Controller/InloggenController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\TaskDB;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Session;

class InloggenController extends Controller
{
   /**
     * @Route("/inloggen")
     */
    public function newAction(Request $request)
    {

     $session = $request->getSession();
     $task = new TaskDB();
    
     $conn = $this->get('database_connection');

     if(isset($_GET['auth'])) {
         $auth = $_GET['auth'];
         $sql = "UPDATE gamers SET auth='$auth' WHERE email='".base64_decode($auth)."'";
         $stmt = $conn->query($sql);
     } 
    
    $form = $this->createFormBuilder($task)
        ->add('email',  EmailType::class, array('label_format' => 'E-MAILADRES :',))
        ->add('password',  PasswordType::class, array('label_format' => 'WACHTWOORD  :',))
        ->add('save', SubmitType::class, array('label' => 'Aanmelden'))
        ->getForm();
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $task = $form->getData();

        $sql = "SELECT * FROM gamers WHERE email='$task->email' AND password='$task->password' AND auth='".base64_encode($task->email)."' LIMIT 1";
        $stmt = $conn->query($sql);
        while ($row = $stmt->fetch()) {
            $player = $row['id'];
        }

       if(!isset($player)){
            return $this->create_view($form->createView(),'Onjuist e-mailadres of wachtwoord' );
       }else {

           $session->set('user', $player);
            return  $this->redirect('game');
       }
    } else {
        $session->set('user', '');
        return  $this->create_view($form->createView(),'');
    }
    }

    public function create_view($form_values,$message){
         return $this->render('inloggen.html.twig', array(
            'form' =>$form_values,'message'=>$message
        ));
    }

}
