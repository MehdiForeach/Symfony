<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Message;
use App\Form\MessageType;

class DemoController extends AbstractController
{
    /**
     * @Route("/demo", name="demo")
     */
    public function index(): Response
    {
        return $this->render('demo/index.html.twig', [
            'controller_name' => 'DemoController',
        ]);
    }

    public function accueil(): Response
    {
        return $this->render('demo/accueil.html.twig', [
            'controller_name' => 'DemoController',
        ]);
    }

    public function damier(): Response
    {
        $ligne = 8;
        $colone = 8;
        $n=1;
        $html = "<table class='dam'>\n";
        for( $i=0 ; $i<$ligne ; $i++ )
        {
            // la ligne est-elle pair ?
            if ( $i % 2 == 0 )
            {
                $html .= "<tr>\n";
                for( $j=0 ; $j < $colone ; $j++ )
                {
                    // la colonne est-elle pair ?
                    if ( $j % 2 == 0 )
                        $class="class='noir'";
                    else
                        $class="class='blanc'";
                    $html .= "<td $class>".$n."\n";
                    $n++;
                    $html .= "</td>\n";
                }
                $html .= "</tr>\n";
            }
            // sinon
            else
            {
                $html .= "<tr>\n";
                for( $j=0 ; $j < $colone ; $j++ )
                {
                    if ( $j % 2 == 0 )
                        $class="class='blanc'";
                    else
                        $class="class='noir'";
                    $html .= "<td $class>".$n."\n";
                    $n++;
                    $html .= "</td>\n";
                }
                $html .= "</tr>\n";
            }
        }
        $html .= "</table>\n";

        return $this->render('demo/damier.html.twig', [
            'damier' => $html,
        ]);
    }

    public function addMessage(): Response
    {
        $message = new Message();
        $form = $this->createForm( MessageType::class, $message);

        return $this->render('demo/addMessage.html.twig', [
            'formulaire' => $form->createView(),
        ]);
    }
}
