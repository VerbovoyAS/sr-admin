<?php 

    class Home extends Controller {
        
        public function index() {  
            $this->view('home/index');  
        }

        public function auth() { 
            $this->view('home/auth');
        }

        public function exit() {
            $this->view('home/exit'); 
        }
        

    }