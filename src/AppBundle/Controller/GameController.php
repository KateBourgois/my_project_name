<?php
// src/AppBundle/Controller/GameController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\TaskDB;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DisabledType;

use AppBundle\Includes\Game;

class GameController extends Controller
{
   /**
     * @Route("/game")
     */
    public function newAction(Request $request)
    {
        $session = $request->getSession();
        $user = $session->get('user');
        $task = new TaskDB();
        $game = new Game();
        
        if($user=='') return $this->redirect('registreren');
        elseif(!is_null($user) && $user!='')
        {
        

        $player_status = $this->getUserStatus($user);
        if(!is_null($player_status)) $number = $player_status;else $number='';
        if(is_null($user)) return $this->redirect('registreren');

        $message = '';

        $form = $this->createFormBuilder($task)
           ->add('id',  HiddenType::class, array('label_format' => '%name% :',))
           ->add('save', SubmitType::class, array('label' => 'Aan het wiel draaien'))
           ->getForm();
         if($number=='' || is_null($number)){
            $form->handleRequest($request);
        } else $message ="Wiel zal niet meer draaien. U hebt al gewonnen $number";


       if (isset($form) && $form->isSubmitted() && $form->isValid()) {
           $number = '';
            while ($number == '') $number = $game->win();
            $task = $form->getData();
            $message ="U hebt gewonnen $number!";
            $conn = $this->get('database_connection');
            $sql = "UPDATE gamers SET spinned ='$number' WHERE id='$user'";
            $stmt = $conn->query($sql);

       }
    }
        if(!is_null($user) && $user!='') return $this->create_view($form->createView(),$message);
    }

    public function create_view($form_values,$message){
         return $this->render('game.html.twig', array(
            'form' =>$form_values, 'message'=>$message
        ));
    }

   public function getUserStatus($user)
    {
        
        $conn = $this->get('database_connection');
        $sql = "SELECT * FROM gamers WHERE id='$user' LIMIT 1";
        $stmt = $conn->query($sql);
        while ($row = $stmt->fetch()) {
            $spinned = $row['spinned'];
        }
        return $spinned;
    }

   
    
    
}