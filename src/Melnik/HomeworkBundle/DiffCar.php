<?php

namespace Melnik\HomeworkBundle;

class DiffCar
{
    protected $doctrine;

    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getAllCar()
    {
        $cars = $this->doctrine->getRepository('MelnikHomeworkBundle:Car')
            ->FindAll();

        return $cars;
    }

}