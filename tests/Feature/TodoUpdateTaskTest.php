<?php

namespace Tests\Feature;

use App\Http\Services\TodoService;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoUpdateTaskTest extends TestCase
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

    public function updateStatus(): void
    {
        $todoService = new TodoService(['tesstt 1']);
        $index = 0;
        $task = $todoService->updateTask(index: $index, status: 'progress');
        $this->assertEquals('progress', $task['status']);
        $this->assertEquals($index, $task['index']);
    }

    public function updateTitle(): void
    {
        $todoService = new TodoService(['testt 1']);
        $index = 0;
        $task = $todoService->updateTask(index: $index, title: 'title update');
        $this->assertEquals('title update', $task['title']);
        $this->assertEquals($index, $task['index']);
    }

    public function updateTaskErrorTitleAndSTT(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('error title, stt');

        $todoService = new TodoService(['testt 1']);
        $todoService->updateTask(index: 0);
    }

    public function updateTaskNotFound(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('error not found');

        $todoService = new TodoService(['testt 1']);
        $todoService->updateTask(index: 1, title: 'testtt 2');
    }

    public function updateTitleTask()
    {
        $todoService = new TodoService(['testt 1', 'testt 2']);
        $titleUpdate = 'new tesst2';
        $taskUpdated = $todoService->updateTask(index: 1, title: $titleUpdate);
        
        $this->assertEquals($titleUpdate, $taskUpdated['title']);
    }

    public function updateTaskStatusNoFound()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('error stt');

        $todoService = new TodoService(['testt 1']);
        $todoService->updateTask(index: 0, status: 'done');
    }

    public function uupdateTaskTitleEmpty()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('not empy title');

        $todo = new TodoService(['testtt 1']);
        $todo->updateTask(index: 0, title: '');
    }
}
