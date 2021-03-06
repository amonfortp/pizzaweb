<?php

namespace App\Controller;

use App\Entity\Ingrediente;
use App\Entity\Pizza;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    /**
     * @Route("/pizza/{id}", name="pizza")
     */
    public function index(int $id)
    {
        $pizza = null;
        if ($id == 0) {
            $pizzaExiste = false;
        } else {
            $pizzaExiste = true;
            $pizza = $this->obtenerPizza($id);
        }

        $ingredientes = $this->obtenerIngredientes();

        return $this->render('pizza/index.html.twig', [
            'controller_name' => 'PizzaController',
            'pizzaExiste' => $pizzaExiste,
            'pizza' => $pizza,
            'ingredientes' => $ingredientes
        ]);
    }

    /**
     * Metodo para obtener una pizza en específico
     * int $id -> id de la pizza que queremos obtener
     * return Pizza -> devuelve la pizza
     */
    private function obtenerPizza(int $id)
    {

        $repository = $this->getDoctrine()->getRepository(Pizza::class);
        return $repository->findOneBy(['id' => $id]);
    }

    /**
     * Metodo para obtener todos los ingredientes
     * return array -> devuelve un array de objetos Ingredientes
     */
    private function obtenerIngredientes()
    {
        $repository = $this->getDoctrine()->getRepository(Ingrediente::class);
        return $repository->findAll();
    }
}
