<?php

namespace App\Tests\Functional\Controller;

use App\Entity\User;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{

    const WELCOME_MESSAGE_HOMEPAGE = 'Bienvenue sur Todo List, l\'application vous permettant de gérer l\'ensemble de vos tâches sans effort !';

    const USERS_PAGE_MAIN_TITLE = "Liste des utilisateurs";

    private KernelBrowser $browser;

    public function setUp(): void
    {
        $this->browser = static::createClient();
    }

    public function loginUser(string $username): void
    {
        $userRepository = static::getContainer()->get(UserRepository::class);
        $this->browser->loginUser($userRepository->findOneBy(['username' => $username]));
    }

    public function getUser(string $username): User
    {
        $userRepository = static::getContainer()->get(UserRepository::class);
        return $userRepository->findOneBy(['username' => $username]);
    }

    public function testSavingUser(): void
    {
        $number = rand(1, 2);
        $role = $number % 2 == 0 ? "ROLE_ADMIN" : "ROLE_USER";

        $this->browser->followRedirects();

        $this->browser->request('POST', '/users/create');

        $form = $this->browser->getCrawler()->selectButton('Ajouter')->form();
        $form->setValues([
            'user[username]' => 'Testa',
            'user[password][first]' => '0000',
            'user[password][second]' => '0000',
            'user[email]' => 'fx@gmail.com',
            'user[userGroup]' => $role
        ]);
        $this->browser->submit($form);

        $this->assertResponseIsSuccessful();
    }

    public function testUpdateOfUserRole(): void
    {

        $number = rand(1, 2);

        $role = $number % 2 == 0 ? "ROLE_ADMIN" : "ROLE_USER";

        $this->browser->followRedirects();

        $this->loginUser('User2');

        $this->browser->request('/GET', '/users');

        $editLink = $this->browser->getCrawler()->selectLink('Edit')->first()->text();

        $this->browser->clickLink($editLink);

        $form = $this->browser->getCrawler()->selectButton('Modifier')->form();

        $this->browser->request('PUT', $form->getUri());
        $form->setValues([
            'user[username]' => $form->getValues()['user[username]'],
            'user[password][first]' => '0000',
            'user[password][second]' => '0000',
            'user[email]' => $form->getValues()['user[email]'],
            'user[userGroup]' => $role
        ]);
        $this->browser->submit($form);

        $this->assertResponseIsSuccessful();
        $this->assertEquals(self::USERS_PAGE_MAIN_TITLE, $this->browser->getCrawler()->filter('h1')->text());
    }

    public function testRedirectToHomePageForUnauthenticatedUsers(): void
    {

        $this->browser->followRedirects();

        $this->loginUser('User9');

        $this->browser->request('GET', '/users');

        $this->assertSame(self::WELCOME_MESSAGE_HOMEPAGE, $this->browser->getCrawler()->filter('h1')->text());

    }


}