<?php

/**
 * PHP version 8.
 *
 * @category Controller
 * @package  UserController
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/P8---TodoList
 */

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends AbstractController
{
    /**
     * Summary of list
     *
     * @param UserRepository $userRepository Object
     *
     * @return Response
     */
    #[Route(path: '/users', name: 'user_list')]
    public function list(UserRepository $userRepository): Response
    {
        return $this->render('user/list.html.twig', ['users' => $userRepository->findAll()]);
    }

    /**
     * Summary of create
     * @param Request $request Object
     * @param UserPasswordHasherInterface $passwordHasher Object
     * @param UserRepository $userRepository Object
     *
     * @return RedirectResponse|Response
     */
    #[Route(path: '/users/create', name: 'user_create')]
    public function create(Request $request, UserPasswordHasherInterface $passwordHasher, UserRepository $userRepository): RedirectResponse|Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($password);
            $user->setRoles([$user->getUserGroup()]);
            $userRepository->getEntityManager()->persist($user);
            $userRepository->getEntityManager()->flush();

            $this->addFlash('success', "L'utilisateur a bien été ajouté.");

            return $this->redirectToRoute('user_list');
        }

        return $this->render('user/create.html.twig', ['form' => $form]);
    }

    /**
     * Summary of edit
     *
     * @param User $user Object
     * @param Request $request Object
     * @param UserPasswordHasherInterface $passwordHasher Object
     * @param UserRepository $userRepository Object
     *
     * @return RedirectResponse|Response
     */
    #[Route(path: '/users/{id}/edit', name: 'user_edit')]
    public function edit(User $user, Request $request, UserPasswordHasherInterface $passwordHasher, UserRepository $userRepository): RedirectResponse|Response
    {
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordHasher->hashPassword($user, $user->getPassword());
            $user->setUsername($user->getUsername());
            $user->setPassword($password);
            $user->setRoles([$user->getUserGroup()]);
            $userRepository->getEntityManager()->flush();

            $this->addFlash('success', "L'utilisateur a bien été modifié");

            return $this->redirectToRoute('user_list');
        }

        return $this->render('user/edit.html.twig', ['form' => $form, 'user' => $user]);
    }
}
