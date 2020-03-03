<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    /**
     * @Route("/learning", name="learning")
     */

    private $lorem = "Pakt dat dees ne Lorem is";
    private $name =  "Unknown";

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }



    public function goToChangeName()
    {
        return $this->redirectToRoute('changeMyName');
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function showMyName()
    {
        if (!isset($_SESSION['name'])){
            return $this->render('learning/showmyname.html.twig', [
                'controller_name' => 'LearningController',
                'inputName' => $this->getName(),
            ]);
        } else {
            $this->setName($_SESSION['name']);
            return $this->render('learning/changemyname.html.twig', [
                'controller_name' => 'LearningController',
                'inputName' => $this->getName()
            ]);
        }


    }

    public function changeMyName()
    {
        $_SESSION['name'] = $_POST['inputName'];
        $this->setName($_SESSION['name']);
        return $this->render('learning/changemyname.html.twig', [
            'controller_name' => 'LearningController',
            'inputName' => $this->getName()
        ]);
    }

    public function index()
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
            'lorem' => $this->aboutMe(),
        ]);
    }

    public function aboutMe()
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
            'lorem' => $this->lorem,
        ]);
    }
}
