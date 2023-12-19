<?php

/**
 * PHP version 8.
 *
 * @category Test
 * @package  TaskControllerTest
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/P8---TodoList
 */

namespace App\Tests\Functional\Controller;

use App\Entity\User;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
{


    const CREATE_TASK_BUTTON_NAME = 'Créer une nouvelle tâche';
    const TASKS_BUTTON_NAME = 'Consulter la liste des tâches à faire';
    const CREATE_TASK_FLASH_MESSAGE = 'Superbe ! La tâche a été bien été ajoutée.';
    const EDIT_TASK_FLASH_MESSAGE = 'Superbe ! La tâche a bien été modifiée.';
    const FLASH_MESSAGE_OF_A_DELETE_TASK = 'Superbe ! La tâche a bien été supprimée.';
    const FLASH_MESSAGE_OF_UNAUTHORIZED_ATTEMPT_TO_DELETE_TASK = 'Oops ! Vous n\'êtes pas autorisé à supprimer cette tâche !.';
    const TITLE_BLANK_VALIDATION_MESSAGE = 'Vous devez saisir un titre.';
    const CONTENT_BLANK_VALIDATION_MESSAGE = 'Vous devez saisir du contenu.';

    private readonly KernelBrowser $browser;

    /**
     * Summary of setUp
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->browser = static::createClient();
    }

    /**
     * Summary of loginUser
     *
     * @param string $username string
     *
     * @return void
     */
    public function loginUser(string $username):void
    {
        $userRepository = static::getContainer()->get(UserRepository::class);
        $this->browser->loginUser($userRepository->findOneBy(['username' => $username]));
    }

    /**
     * Summary of getUser
     *
     * @param string $username string
     *
     * @return User
     */
    public function getUser(string $username): User
    {
        $userRepository = static::getContainer()->get(UserRepository::class);
        return $userRepository->findOneBy(['username' => $username]);
    }

    /**
     * Summary of testCreateTask
     *
     * @return void
     */
    public function testCreateTask(): void
    {
        $this->browser->followRedirects();

        $this->loginUser('User1');

        $this->browser->request('GET', '/');

        $this->browser->clickLink(self::CREATE_TASK_BUTTON_NAME);

        $this->browser->request('POST', '/tasks/create');

        $form = $this->browser->getCrawler()->selectButton('Ajouter')->form();
        $form->setValues([
            'task[title]' => 'Tâche test',
            'task[content]' => 'Welcome on Todo App ',
        ]);

        $this->browser->submit($form);

        $this->assertResponseIsSuccessful();
        $this->assertEquals(self::CREATE_TASK_FLASH_MESSAGE, $this->browser->getCrawler()->filter('.col-md-12 > .alert-success')->text());

    }

    public function testBlankTitleShouldReturnBlankValidationMessage():void
    {

        $this->browser->followRedirects();

        $this->loginUser('User1');

        $this->browser->request('GET', '/');

        $this->browser->clickLink(self::CREATE_TASK_BUTTON_NAME);

        $this->browser->request('POST', '/tasks/create');

        $form = $this->browser->getCrawler()->selectButton('Ajouter')->form();
        $form->setValues([
            'task[title]' => '',
        ]);

        $this->browser->submit($form);

        $this->assertEquals(self::TITLE_BLANK_VALIDATION_MESSAGE, $this->browser->getCrawler()->filter('.invalid-feedback')->text());
    }

    public function testContentShouldReturnBlankValidationMessage():void
    {

        $this->browser->followRedirects();

        $this->loginUser('User1');

        $this->browser->request('GET', '/');

        $this->browser->clickLink(self::CREATE_TASK_BUTTON_NAME);

        $this->browser->request('POST', '/tasks/create');

        $form = $this->browser->getCrawler()->selectButton('Ajouter')->form();
        $form->setValues([
            'task[content]' => '',
        ]);

        $this->browser->submit($form);
        $this->assertEquals(self::CONTENT_BLANK_VALIDATION_MESSAGE, $this->browser->getCrawler()->filter('.invalid-feedback')->eq(1)->text());
    }


    /**
     * Summary of testUnauthenticatedTaskUserShouldBeAnonymous
     *
     * @return void
     */
    public function testUnauthenticatedTaskUserShouldBeAnonymous(): void
    {

        $this->browser->followRedirects();

        $taskRepository = static::getContainer()->get(TaskRepository::class);

        $anonymousTasksOnDb = $taskRepository->findBy(['user' => null]);
        $anonymousTasksOnClient = [];

        $this->loginUser('User6');

        $this->browser->request('GET', '/');


        $this->browser->request('GET', '/tasks');


        $tasks = $this->browser->getCrawler()->filter('.container .row')->eq(3)->getIterator();

        foreach ($tasks as $task) {
            preg_match_all('/créé\spar\s(.*?)\n/', $task->nodeValue, $matches);
            $anonymousTasksOnClient = array_filter(next($matches), fn($value) => $value == "Anonyme");
        }
        $this->assertCount(count($anonymousTasksOnClient), $anonymousTasksOnDb);

    }

    /**
     * Summary of testEditTask
     *
     * @return void
     */
    public function testEditTask(): void
    {

        $this->browser->followRedirects();

        $this->loginUser('User5');

        $this->browser->request('GET', '/');

        $this->browser->clickLink(self::TASKS_BUTTON_NAME);

        $taskLink = $this->browser->getCrawler()->filter('h4 + h4')->text();

        $this->browser->clickLink($taskLink);

        $form = $this->browser->getCrawler()->selectButton('Modifier')->form();
        $form->setValues([
            'task[title]' => 'Tâche modifiée avec isolation de la connexion',
            'task[content]' => 'Contenu modifié avec isolation de l\'accès à l\'utilisateur'
        ]);

        $this->browser->submit($form);

        $this->assertResponseIsSuccessful();
        $this->assertEquals(self::EDIT_TASK_FLASH_MESSAGE, $this->browser->getCrawler()->filter('.alert-success')->text());

    }

    /**
     * Summary of testDeleteTaskByHisCreator
     *
     * @return void
     */
    public function testDeleteTaskByHisCreator(): void
    {

        $this->browser->followRedirects();

        $taskRepository = static::getContainer()->get(TaskRepository::class);

        $this->loginUser('User25');

        $userTasks = $taskRepository->findBy(['user' => $this->getUser('User25')]);
        $task = current($userTasks);

        $this->browser->request('GET', '/tasks');

        $this->browser->request('DELETE', "/tasks/" . $task->getId() . "/delete");

        $this->assertResponseIsSuccessful();
        $this->assertSame(self::FLASH_MESSAGE_OF_A_DELETE_TASK, $this->browser->getCrawler()->filter('.alert-success')->text());

    }


    /**
     * Summary of testPreventNormalUserToDeleteAnonymousTask
     *
     * @return void
     */
    public function testPreventNormalUserToDeleteAnonymousTask(): void
    {
        $this->browser->followRedirects();

        $taskRepository = static::getContainer()->get(TaskRepository::class);


        $tasks = $taskRepository->findAll();
        $task = end($tasks);

        $this->loginUser('User9');
        $this->browser->request('GET', '/tasks');

        $this->browser->request('DELETE', "/tasks/" . $task->getId() . "/delete");

        $this->assertResponseStatusCodeSame(400);
        $this->assertEquals(self::FLASH_MESSAGE_OF_UNAUTHORIZED_ATTEMPT_TO_DELETE_TASK,$this->browser->getCrawler()->filter('.alert-danger')->text());

    }

}
