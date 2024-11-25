

php artisan test --filter=TodoDeleteTaskTest::deleteTaskNotFound
php artisan test --filter=TodoDeleteTaskTest::deleteSuccess

php artisan test --filter=TodoListTaskTest::getTasks
php artisan test --filter=TodoListTaskTest::getTasksEmpty
php artisan test --filter=TodoListTaskTest::getTaskNotFound

php artisan test --filter=TodoStoreTaskTest::storeTaskEmpty
php artisan test --filter=TodoStoreTaskTest::storeTaskTodoEmpty
php artisan test --filter=TodoStoreTaskTest::storeTask

php artisan test --filter=TodoUpdateTaskTest::updateStatus
php artisan test --filter=TodoUpdateTaskTest::updateTitle
php artisan test --filter=TodoUpdateTaskTest::updateTaskErrorTitleAndSTT
php artisan test --filter=TodoUpdateTaskTest::updateTaskNotFound
php artisan test --filter=TodoUpdateTaskTest::updateTitleTask
php artisan test --filter=TodoUpdateTaskTest::updateTaskStatusNoFound
php artisan test --filter=TodoUpdateTaskTest::uupdateTaskTitleEmpty