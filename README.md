# Description

Given the age of the project, the aim was to upgrade it from Symfony 3 to version 6.


# Installation

1 - Clone the repo

2 - Use the package manager [composer](https://getcomposer.org/doc/00-intro.md) to install packages.
```
composer install
```


3 - In the .env file check which database you are using if it's MariaDb just uncomment it and you'll ready to use it otherwise checkout on the documentation(https://symfony.com/doc/current/doctrine.html#configuring-the-database) on  how to configure the database for the one that you need.

4 - Thanks to datafixtures If you want to use the tests you have to create a database 'todolist_test' with the following command ( You can also import the sql file you can find it on the config folder) : 

```
bin/console --env=test d:f:l
```

Check in the terminal if you have Xdebug install with the following command on terminal :

```
php -m
``` 


If you don't have it install it and follow the instruction of the website regardless to your architecture(https://xdebug.org/wizard)

To launch all tests in sequence, use the following command :

```
php bin/phpunit tests
```

It's highly likely that subsequent tests will fail, and this is to be expected - depending on the test, you'll need to check the database to see what's going on.

For example, if the delete test doesn't work with a specific user, you'll simply need to check the table to see who it belongs to and then make the modification in the test to see if the tested behavior works.

So to launch a single test use this command for example to register a user:
```
php bin/phpunit --filter=testSavingUser
```
# Database & User

Create a database called `todolist` in phpmyadmin and insert the `todolist.sql` file store in config folder
