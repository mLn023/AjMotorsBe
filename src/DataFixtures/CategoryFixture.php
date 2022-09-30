<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {   
        $categories = [
            1 => [
                'name' => '4x4, Suv & Crossover'
            ],
            2 => [
                'name' => 'Citadine'
            ],
            3 => [
                'name' => 'Berline'
            ],
            4 => [
                'name' => 'Break'
            ],
            5 => [
                'name' => 'Cabriolet'
            ],
            6 => [
                'name' => 'Coupé'
            ],
            7 => [
                'name' => 'Monospace'
            ],
            8 => [
                'name' => 'Bus & Minibus'
            ],
            9 => [
                'name' => 'Fourgonette'
            ],
            10 => [
                'name' => 'Fourgon (- de 3,5T)'
            ],
            11 => [
                'name' => 'Pick-up'
            ],
            12 => [
                'name' => 'Voiture de société'
            ],
        ];

        foreach($categories as $key => $value){
            $category = new Category();
            $category->setName($value['name']);
            $manager->persist($category);
            $this->addReference('category_'.$key, $category);
        }


        $manager->flush();
    }
}
