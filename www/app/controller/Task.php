<?php 

    class Task extends Controller {
        
        public function index() {
            $task = $this->model('TaskTable');
            $forward = $task->taskTable();
            $this->view('task/index', $forward);

        }

        public function edit() {
            $this->view('task/edit');
        }

        public function add() {
            $this->view('task/add');
        }
        

    }