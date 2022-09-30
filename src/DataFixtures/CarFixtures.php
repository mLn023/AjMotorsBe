<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\Category;
use Doctrine\ORM\EntityManager;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CarFixtures extends Fixture implements DependentFixtureInterface
{   

    public function load(ObjectManager $manager): void
    {   
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        $faker->addProvider(new \Faker\Provider\DateTime($faker));
        

        for($i=1; $i <= 100 ; $i++)
        {  
            $car = new Car();
            $car->setBrand($faker->vehicleBrand);
            $car->setModel($faker->vehicleModel);
            $car->setPrice(rand(250,5000000));
            $car->setMileage(rand(0,500000));
            $car->setCategory($this->getReference('category_'. $faker->numberBetween(1,12)));
            $car->setEnergy($faker->vehicleFuelType);
            $car->setGearbox($faker->vehicleGearBoxType);
            $car->setColorOutside($faker->colorName);
            $car->setColorInside($faker->colorName);
            $car->setNumOfDoors($faker->vehicleDoorCount);
            $car->setNumOfSeats($faker->vehicleSeatCount);
            $car->setIsFirstHand((bool)random_int(0,1));
            $car->setFiscalPower(random_int(1,50));
            $car->setHorsePower(random_int(50,1000));
            $car->setCO2Emission($faker->randomFloat(1,100,250));
            $car->setConsumption($faker->randomFloat(1,3,15));
            $car->setCreatedAt(new \DateTime('now'));
            
            $manager->persist($car);}

        $manager->flush();
    }

    public function getDependencies()
    {   
        return [
            CategoryFixture::class
        ];  
    }
}
