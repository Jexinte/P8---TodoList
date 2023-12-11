<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Faker;
// Ajouter --env=test pour générer des données pour la bdd todolist_test
class AppFixtures extends Fixture
{
    /**
     * @codeCoverageIgnore
     */
    public function load(ObjectManager $manager): void
    {
         $faker = Faker\Factory::create();
         for ($i = 0 ; $i < 40; $i++)
         {
             $user = new User();
             $user->setUsername("User".$i+1);
             $user->setPassword(password_hash('0000',PASSWORD_BCRYPT));
             $user->setEmail(strtolower($user->getUsername()).'@gmail.com');
             $i < 5 ? $user->setUserGroup('ROLE_ADMIN') : $user->setUserGroup('ROLE_USER');
             $user->setRoles([$user->getUserGroup()]);
             $users[] = $user;
             $manager->persist($user);
         }

         for ($i = 0 ; $i < 40; $i++)
         {
             $number = rand(1,20);

             $task = new Task();
             $task->setTitle(str_replace('.','',$faker->text(10)));
             $task->setContent($faker->text(10));
             $number % 2 == 0 ? $task->setUser($users[array_rand($users)]) : $task->setUser(null);

             $manager->persist($task);
         }

        $manager->flush();
    }
}
