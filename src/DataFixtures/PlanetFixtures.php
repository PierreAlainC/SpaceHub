<?php

namespace App\DataFixtures;

use App\Entity\Planet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlanetFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $planets = [
            ['Mercury', 'mercury'],
            ['Venus', 'venus'],
            ['Earth', 'earth'],
            ['Mars', 'mars'],
            ['Jupiter', 'jupiter'],
            ['Saturn', 'saturn'],
            ['Uranus', 'uranus'],
            ['Neptune', 'neptune']
        ];

        foreach ($planets as [$name, $slug]) {
            $planet = new Planet();
            $planet->setName($name);
            $planet->setSlug($slug);
            $planet->setIsPlanet(true);

            $manager->persist($planet);
        }

        $manager->flush();
    }
}
