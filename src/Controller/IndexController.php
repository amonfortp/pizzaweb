<?php

namespace App\Controller;

use App\Entity\Pizza;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $pizzas = $this->obtenerPizzas();

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'pizzas' => $pizzas
        ]);
    }

    /**
     * Metodo para obtener todas las pizzas
     */
    private function obtenerPizzas()
    {
        $repository = $this->getDoctrine()->getRepository(Pizza::class);
        return $repository->findAll();
    }
}
