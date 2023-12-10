<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use \Symfony\Component\HttpFoundation\Response;
class SecurityController extends AbstractController
{
    /**
     * @codeCoverageIgnore
     */
    #[Route(path: '/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
    /**
     * @codeCoverageIgnore
     */
    #[Route(path: '/login_check', name: 'login_check')]
    public function loginCheck(): void
    {
        // This code is never executed.
    }
    /**
     * @codeCoverageIgnore
     */
    #[Route(path: '/logout', name: 'logout')]
    public function logoutCheck(): void
    {
        // This code is never executed.
    }
}
