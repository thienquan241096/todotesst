<?php

namespace Tests\Feature;

use App\Http\Services\TodoService;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoDeleteTaskTest extends TestCase
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

    public function deleteTaskNotFound()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('error not found');

        $todo = new TodoService(['tesstt 1']);
        $todo->deleteTask(1);
    }

    public function deleteSuccess()
    {
        $todo = new TodoService(['tessst 1']);
        $result = $todo->deleteTask(0);

        $this->assertTrue($result);
    }
}
