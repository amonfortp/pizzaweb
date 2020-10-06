<?php

namespace App\DataFixtures;

use App\Entity\Ingrediente;
use App\Entity\Pizza;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Crea todos los elementos de la base de datos necesarios para sus pruebas minimas
 */
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $ingrediente1 = new Ingrediente();
        $ingrediente1->setNombre("Tomate");
        $ingrediente1->setPrecio(0.5);
        $manager->persist($ingrediente1);

        $ingrediente2 = new Ingrediente();
        $ingrediente2->setNombre("Champiñones en rodajas");
        $ingrediente2->setPrecio(0.5);
        $manager->persist($ingrediente2);

        $ingrediente3 = new Ingrediente();
        $ingrediente3->setNombre("Queso feta");
        $ingrediente3->setPrecio(1);
        $manager->persist($ingrediente3);

        $ingrediente4 = new Ingrediente();
        $ingrediente4->setNombre("Salchichas");
        $ingrediente4->setPrecio(1);
        $manager->persist($ingrediente4);

        $ingrediente5 = new Ingrediente();
        $ingrediente5->setNombre("Cebolla en rodajas");
        $ingrediente5->setPrecio(0.5);
        $manager->persist($ingrediente5);

        $ingrediente6 = new Ingrediente();
        $ingrediente6->setNombre("Queso mozzarella");
        $ingrediente6->setPrecio(0.5);
        $manager->persist($ingrediente6);

        $ingrediente7 = new Ingrediente();
        $ingrediente7->setNombre("Orégano");
        $ingrediente7->setPrecio(1);
        $manager->persist($ingrediente7);

        $ingrediente8 = new Ingrediente();
        $ingrediente8->setNombre("Tocino");
        $ingrediente8->setPrecio(1);
        $manager->persist($ingrediente8);

        $pizza1 = new Pizza();
        $pizza1->setNombre("The Fun Pizza");
        $pizza1->setPrecio(7.5);
        $pizza1->addIngrediente($ingrediente1);
        $pizza1->addIngrediente($ingrediente2);
        $pizza1->addIngrediente($ingrediente3);
        $pizza1->addIngrediente($ingrediente4);
        $pizza1->addIngrediente($ingrediente5);
        $pizza1->addIngrediente($ingrediente6);
        $pizza1->addIngrediente($ingrediente7);
        $manager->persist($pizza1);

        $pizza2 = new Pizza();
        $pizza2->setNombre("The Super Mushroom Pizza");
        $pizza2->setPrecio(5.25);
        $pizza2->addIngrediente($ingrediente1);
        $pizza2->addIngrediente($ingrediente8);
        $pizza2->addIngrediente($ingrediente6);
        $pizza2->addIngrediente($ingrediente2);
        $pizza2->addIngrediente($ingrediente7);
        $manager->persist($pizza2);

        $manager->flush();
    }
}
