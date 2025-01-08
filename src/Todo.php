<?php
class Todo{
    private $tasks = [];

    public function addTask($tasks){
        $this->tasks[] = ['task' => $tasks, 'completed' => false];
    }

    public function completeTask($index){
        if(isset($this->tasks[$index])){
            $this->tasks[$index]['completed'] = true;
        }
    }

    public function getTasks(){
        return $this->tasks;
    }
}
?>