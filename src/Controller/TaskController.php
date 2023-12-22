<?php

/**
 * PHP version 8.
 *
 * @category Controller
 * @package  TaskController
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/P8---TodoList
 */

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TaskController extends AbstractController
{
    /**
     * Summary of list
     *
     * @param TaskRepository $taskRepository Object
     *
     * @return Response
     */
    #[Route(path: '/tasks', name: 'task_list')]
    public function list(TaskRepository $taskRepository): Response
    {
        return $this->render('task/list.html.twig', ['tasks' => $taskRepository->findAll()]);
    }

    /**
     * Summary of create
     *
     * @param Request        $request Object
     * @param TaskRepository $taskRepository Object
     *
     * @return RedirectResponse|Response
     */
    #[Route(path: '/tasks/create', name: 'task_create')]
    public function create(Request $request, TaskRepository $taskRepository): RedirectResponse|Response
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task->setUser($this->getUser());
            $taskRepository->getEntityManager()->persist($task);
            $taskRepository->getEntityManager()->flush();

            $this->addFlash('success', 'La tâche a été bien été ajoutée.');

            return $this->redirectToRoute('task_list');
        }

        return $this->render('task/create.html.twig', ['form' => $form]);
    }

    /**
     * Summary of edit
     *
     * @param Task           $task Object
     * @param Request        $request Object
     * @param TaskRepository $taskRepository Object
     *
     * @return RedirectResponse|Response
     */
    #[Route(path: '/tasks/{id}/edit', name: 'task_edit')]
    public function edit(Task $task, Request $request, TaskRepository $taskRepository): RedirectResponse|Response
    {
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $taskRepository->getEntityManager()->flush();
            $this->addFlash('success', 'La tâche a bien été modifiée.');
            return $this->redirectToRoute('task_list');
        }

        return new Response(
            $this->render(
                'task/edit.html.twig',
                [
                'form' => $form,
                'task' => $task,
                ]
            )
        );
    }

    /**
     * Summary of toggleTask
     *
     * @param Task           $task Object
     * @param TaskRepository $taskRepository Object
     *
     * @return RedirectResponse
     */
    #[Route(path: '/tasks/{id}/toggle', name: 'task_toggle')]
    public function toggleTask(Task $task, TaskRepository $taskRepository): RedirectResponse
    {
        $task->toggle(!$task->isDone());

        $taskRepository->getEntityManager()->flush();

        $this->addFlash('success', sprintf('La tâche %s a bien été marquée comme faite.', $task->getTitle()));

        return $this->redirectToRoute('task_list');
    }

    /**
     * Summary of deleteTask
     *
     * @param Task           $task Object
     * @param TaskRepository $taskRepository Object
     *
     * @return RedirectResponse|Response
     */
    #[Route(path: '/tasks/{id}/delete', name: 'task_delete')]
    public function deleteTask(Task $task, TaskRepository $taskRepository): RedirectResponse|Response
    {
        $user = $this->getUser() ?: '';
        $taskUserStatus = $task->getUser() ?: '';
        switch (true) {
            case !empty($user) && !empty($taskUserStatus):
                if ($user->getUserIdentifier() == $task->getUser()->getUserIdentifier()) {
                    $taskRepository->getEntityManager()->remove($task);
                    $taskRepository->getEntityManager()->flush();
                    $this->addFlash('success', 'La tâche a bien été supprimée.');
                    return $this->redirectToRoute('task_list');
                }

                $this->addFlash('error', 'Vous n\'êtes pas autorisé à supprimer cette tâche !.');
                break;
            case empty($taskUserStatus) && current($user->getRoles()) == "ROLE_ADMIN":
                $taskRepository->getEntityManager()->remove($task);
                $taskRepository->getEntityManager()->flush();
                $this->addFlash('success', 'La tâche a bien été supprimée.');
                return $this->redirectToRoute('task_list');
            default:
                $this->addFlash('error', 'Vous n\'êtes pas autorisé à supprimer cette tâche !.');
        }

        return new Response(
            $this->render('/task/list.html.twig', ['tasks' => $taskRepository->findAll()]),
            Response::HTTP_BAD_REQUEST
        );
    }
}
