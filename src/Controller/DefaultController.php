<?php

/**
 * PHP version 8.
 *
 * @category Controller
 * @package  DefaultController
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/P8---TodoList
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * Summary of index
     *
     * @return Response
     */
    #[Route(path: '/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig');
    }
}
