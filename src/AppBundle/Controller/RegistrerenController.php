<?php

// src/AppBundle/Controller/RegistrerenController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use AppBundle\Entity\TaskDB;

class RegistrerenController extends Controller
{
   /**
     * @Route("/registreren")
     */

    public function newAction(Request $request)
    {
        $task = new TaskDB();
        $form = $this->createFormBuilder($task)
            ->add('email',  EmailType::class, array('label_format' => 'E-MAILADRES :',))
            ->add('password',  PasswordType::class, array('label_format' => 'WACHTWOORD :',))
            ->add('firstname',  TextType::class, array('label_format' => 'VOORNAAM:',))
            ->add('name',  TextType::class, array('label_format' => 'NAAM:',))
            ->add('street',  TextType::class, array('label_format' => 'STRAAT :',))
            ->add('number',  NumberType::class, array('label_format' => 'NUMMER :',))
            ->add('bus',  TextType::class, array('label_format' => '%name% :',))
            ->add('postcode',  NumberType::class, array('label_format' => '%name% :',))
            ->add('city',  TextType::class, array('label_format' => 'WOONPLAATS:',))
            ->add('gsm',  TextType::class, array('label_format' => 'GSM-NUMMER:',))
            ->add('save', SubmitType::class, array('label' => 'Registreren'))
            ->getForm();

        $form->handleRequest($request);
        $task = $form->getData();
        if ($form->isSubmitted() && $form->isValid()) {
            $conn = $this->get('database_connection');
            $sql = "SELECT id FROM gamers WHERE (email='$task->email' OR gsm='$task->gsm') LIMIT 1";
            $stmt = $conn->query($sql);
            while ($row = $stmt->fetch())  $player = $row['id'];

           if(!isset($player)){
               $this->emailAction($form,$task);//exit;
               
               $sql = "INSERT INTO gamers SET email='$task->email',  password='$task->password',
                firstname='$task->firstname', name='$task->name', street='$task->street',
                number='$task->number', bus='$task->bus',postcode='$task->postcode',
                city='$task->city',gsm='$task->gsm'";
               $stmt = $conn->query($sql);
               
               //return  $this->redirect('inloggen');
               return $this->create_view($form->createView(),"Een bericht is verstuurd naar $task->email om uw e-mailadres te bevestigen");
           }else
               return $this->create_view($form->createView(),'Email of GSM bestaat al!');

        } else
            return  $this->create_view($form->createView(),'');
    }

    public function create_view($form_values,$message){
         return $this->render('registreren.html.twig', array(
            'form' =>$form_values,'message'=>$message
        ));
    }

    /**
     *
     * @param type $form
     * @param type $task 
     */
    public function emailAction($form,$task){
        $message = \Swift_Message::newInstance()
            ->setSubject('Registratie at symfony.be')
            ->setFrom('sky70426@skynet.be')
            ->setTo($task->email)
            ->setBody(
                $this->renderView('Emails/Sendmail.html.twig', array('name' => $task->name, 'auth' => base64_encode($task->email)) ),'text/html'//'text/plain'
            );
       $mailer = $this->get('mailer')->send($message); 
    }


}
