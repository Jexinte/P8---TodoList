<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TaskTest extends KernelTestCase
{
    const TITLE_BLANK_VALIDATION_MESSAGE = 'Vous devez saisir un titre.';
    const CONTENT_BLANK_VALIDATION_MESSAGE = 'Vous devez saisir du contenu.';


    public function testTitleShouldReturnBlankValidationMessage(): void
    {
        $task = new Task();
        $task->setTitle("");
        $validator = self::getContainer()->get('validator');
        $this->assertEquals(self::TITLE_BLANK_VALIDATION_MESSAGE, $validator->validateProperty($task, 'title')->get(0)->getMessage());
    }

    public function testContentShouldReturnBlankValidationMessage(): void
    {
        $task = new Task();
        $task->setContent("");
        $validator = self::getContainer()->get('validator');
        $this->assertEquals(self::CONTENT_BLANK_VALIDATION_MESSAGE, $validator->validateProperty($task, 'content')->get(0)->getMessage());
    }

  
}
