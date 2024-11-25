<?php

namespace App\Http\Services\Todo;

use Exception;
use Illuminate\Support\Arr;

class TodoUpdateService {

    /**
     * action
     *
     * @param array $tasks
     * @param int $index
     * @param mixed $title
     * @param mixed $status
     * @throws Exception
     * @return array
    */
    public function action(array $tasks, int $index, mixed $title = null, mixed $status = null ): array
    {
        if ($title === null && $status === null) {
            throw new Exception('error');
        }

        if (is_string($title) && trim($title) === '') {
            throw new Exception('error title');
        }

        if (is_string($status) && !in_array(trim($status), ['todo', 'progress', 'done'])) {
            throw new Exception('error status');
        }

        if (!isset($tasks[$index])) {
            throw new Exception('error');
        }

        $taskCurrent = $tasks[$index];

        $tasks[$index] = [
            'index' => Arr::get($taskCurrent, 'index'),
            'title' => $title ?? Arr::get($taskCurrent, 'title'),
            'status' => $status ?? Arr::get($taskCurrent, 'status')
        ];

        return $tasks;
    }
}