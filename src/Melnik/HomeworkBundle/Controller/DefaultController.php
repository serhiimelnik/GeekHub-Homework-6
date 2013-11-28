<?php

namespace Melnik\HomeworkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MelnikHomeworkBundle:Default:index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('MelnikHomeworkBundle:Default:about.html.twig');
    }

    public function contactAction()
    {
        return $this->render('MelnikHomeworkBundle:Default:contact.html.twig');
    }

    public function carAction()
    {
        $DiffCar = $this->get('diff_car');
        $cars = $DiffCar->getAllCar();

        return $this->render('MelnikHomeworkBundle:Default:car.html.twig', array(
            'cars' => $cars));
    }
}
