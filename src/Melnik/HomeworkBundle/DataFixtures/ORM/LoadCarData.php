<?php

namespace Melnik\HomeworkBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Melnik\HomeworkBundle\Entity\Car;

class LoadCarData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $carsData = array(
            array(
                'make' => 'Bugatti',
                'model' => 'Veyron',
                'year' => '2010',
                'comment' => 'Out of the initial production run of 30 there were 5, named the Super Sport World Record Edition, which had the electronic limiter turned off, and were capable of 267.857 mph (431.074 km/h). All others were electronically limited to 257.87 mph (415.00 km/h). The record attempt of the Super Sport World Record Edition was driven by Pierre-Henri Raphanel and was verified by Guinness World Records.',
                'numberBuilt' => '30',
                'topSpeed' => '431.07 km/h',
                'assemblys' => array('France'),
                'manufacturer' => 'Bugatti Automobiles S.A.S.',
            ),
            array(
                'make' => 'McLaren',
                'model' => 'F1',
                'year' => '1993',
                'comment' => 'At factory rev limit, it reached 231 mph (371.8 km/h) at Nardò (oval) test track. It still remains the worlds fastest naturally aspirated production car in terms of top speed',
                'numberBuilt' => '65',
                'topSpeed' => '372 km/h',
                'assemblys' => array('England'),
                'manufacturer' => 'McLaren Automotive',
            )
        );
        foreach ($carsData as $carData) {
            $car= new Car();

            $car->setMake($carData['make']);
            $car->setYear($carData['year']);
            $car->setModel($carData['model']);
            $car->setComment($carData['comment']);
            $car->setNumberBuilt($carData['numberBuilt']);
            $car->setTopSpeed($carData['topSpeed']);
            $car->setAssemblys($this->getReferencesFromArray($carData['assemblys']));
            $car->setManufacturer($this->getReference($carData['manufacturer']));

            $manager->persist($car);

            $this->addReference($carData['make'], $car);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 6; // number in which order to load fixtures
    }

    protected function getReferencesFromArray(array $array)
    {
        $outputReferences = new ArrayCollection();

        foreach ($array as $reference) {
            $outputReferences->add($this->getReference($reference));
        }

        return $outputReferences;
    }
}