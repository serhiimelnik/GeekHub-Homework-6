<?php

namespace  Melnik\HomeworkBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Melnik\HomeworkBundle\Entity\Manufacturer;

class LoadManufactureData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $manufacturyData = array(
            array('manufacturer'=>'Bugatti Automobiles S.A.S.'),
            array('manufacturer'=>'McLaren Automotive'),
        );

        foreach ($manufacturyData as $manufacturerData)
        {
            $manufacturer = new Manufacturer();

            $manufacturer->setManufacturer($manufacturerData['manufacturer']);

            $manager->persist($manufacturer);

            $this->addReference($manufacturerData['manufacturer'], $manufacturer);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1; // number in which order to load fixtures
    }

}