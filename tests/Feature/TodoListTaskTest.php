<?php

namespace Tests\Feature;

use App\Http\Services\TodoService;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function getTasks()
    {
        $tasks = ['test111', 'testtt12222'];
        $todo = new TodoService($tasks);

        $this->assertEquals($tasks, array_map(fn($task) => $task['title'], $todo->getTasks()));
    }

    public function getTasksEmpty(): void
    {
        $tasks = [];
        $todo = new TodoService($tasks);

        $this->assertCount(0, $todo->getTasks());
    }


    public function getTaskNotFound()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('error not found');

        $tasks = ['testtt 1', 'testtt 2'];
        $todo = new TodoService($tasks);
        $todo->getTask(5);
    }
}
