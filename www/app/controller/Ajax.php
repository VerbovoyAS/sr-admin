<?php 

    class Ajax extends Controller {
        
        public function index() {
            $this->view('ajax/index'); 
        }

        public function editNetwork() {
            $this->view('ajax/editNetwork');
            
        }
        
        public function editWiki() {
            $this->view('ajax/editWiki');
            
        }
        public function addWiki() {
            $this->view('ajax/addWiki');
            
        }

        public function editList() {
            $this->view('ajax/editList');
            
        }

        public function addList() {
            $this->view('ajax/addList');
            
        }
        

    }