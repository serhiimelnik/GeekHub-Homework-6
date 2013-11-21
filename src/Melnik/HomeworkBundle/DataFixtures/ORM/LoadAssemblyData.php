<?php

namespace Melnik\HomeworkBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Melnik\HomeworkBundle\Entity\Assembly;

class LoadAssemblyData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $assembliesData = array(
            array('assembly' => 'England'),
            array('assembly' => 'France'),
        );

        foreach ($assembliesData as $assemblyData) {
            $assembly = new Assembly();

            $assembly->setAssembly($assemblyData['assembly']);

            $manager->persist($assembly);

            $this->addReference($assemblyData['assembly'], $assembly);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1; // number in which order to load fixtures
    }

}