<?php

namespace Tests\Feature;

use App\Http\Services\TodoService;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoStoreTaskTest extends TestCase
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

    public function storeTask()
    {
        $todo = new TodoService(['test 1']);
        $title = 'test 2';

        $task = $todo->storeTask($title);

        $this->assertEquals($title, $task['title']);
        $this->assertCount(2, $todo->getTasks());
    }

    public function storeTaskTodoEmpty()
    {
        $todo = new TodoService([]);
        $todo->storeTask('tesst 2');

        $this->assertCount(1, $todo->getTasks());
    }

    public function storeTaskEmpty()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('erro title empty');

        $todo = new TodoService([]);
        $todo->storeTask('');

        $this->assertCount(0, $todo->getTasks());
    }
}
