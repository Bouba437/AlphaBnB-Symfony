<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {

    /**
     * @Route("/bonjour/{prenom}/age/{age}", name="hello")
     * @Route("/salut", name="hello_base")
     * @Route("/bonjour/{prenom}", name="hello_prenom")
     * Montre la page qui dit bonjour
     *
     * @return void
     */
    public function hello($prenom = "", $age = 0){
        return $this->render(
            'hello.html.twig',
            [
                'prenom' => $prenom,
                'age' => $age,
            ]
        );
    }
    /**
     * @Route("/", name="homepage")
     */
    public function home(){
        $prenoms = ["Bouba" => 28, "Amadou" => 13, "Aminata" => 56];

        return $this->render(
            'home.html.twig',
            [ 
                'title' => "Bonjour à tous",
                'age' => 16,
                'tableau' => $prenoms,
            ]
        );
    }
}

?>