<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use \Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * @codeCoverageIgnore
     */
    #[Route(path: '/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig');
    }
}
