<?php

require_once 'vendor/autoload.php';
require_once 'TodoModel.php';

class TodoController {
    private $todoModel;
    private $twig;

    public function __construct($twig) {
        $this->todoModel = new TodoModel();
        $this->twig = $twig;
    }

    public function handleRequest() {
        // POST 요청으로 작업 추가
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
            $this->todoModel->addTask($_POST['task']);
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }

        // GET 요청으로 작업 완료 처리
        if (isset($_GET['complete'])) {
            $this->todoModel->completeTask($_GET['complete']);
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }

        // GET 요청으로 모든 작업 가져오기
        $tasks = $this->todoModel->getAllTasks();

        // Twig 템플릿 렌더링
        echo $this->twig->render('todo.twig', ['tasks' => $tasks]);
    }
}


?>