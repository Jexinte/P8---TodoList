<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Task;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    /**
     * Summary of testTitleShouldReturnTheSameValue
     *
     * @return void
     */
    public function testTitleShouldReturnTheSameValue(): void
    {
        $task = new Task();
        $task->setTitle('Title for John Doe');
        $this->assertSame('Title for John Doe', $task->getTitle());
    }

    /**
     * Summary of testContentShouldReturnTheSameValue
     *
     * @return void
     */
    public function testContentShouldReturnTheSameValue(): void
    {
        $task = new Task();
        $task->setContent('Content for John Doe');
        $this->assertSame('Content for John Doe', $task->getContent());
    }

    /**
     * Summary of testToggleShouldReturnTheSameValue
     *
     * @return void
     */
    public function testToggleShouldReturnTheSameValue(): void
    {
        $task = new Task();
        $number = rand(1, 2);
        $boolean = $number % 2 == 0;
        $task->toggle($boolean);
        $this->assertIsBool($task->isDone());
    }
}
