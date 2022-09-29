<?php

namespace App\DataFixtures;

use App\Entity\Car;
use Faker\Generator;
use Faker\Provider\FakeCar;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{   
    private Generator $faker;

   /* public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
        $faker->addProvider(new FakeCar($faker));
    } */

    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i < 50; $i++){
            $car = new Car();

        }

        $manager->flush();
    }
}
