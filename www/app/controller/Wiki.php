<?php 

    class Wiki extends Controller {
        
        public function index() {
            $net = $this->model('WikiTable');
            $forward = $net->getInfo();
            $this->view('wiki/index', $forward);
            
           
        }

        public function category($type = 'Device') {
            $net = $this->model('WikiTable');
            $net->typeWiki = $type;
            $forward = $net->getInfo();
            $this->view('wiki/index', $forward);
            
        }

        public function edit() {
            $this->view('wiki/edit');
            
        }

        public function add() {
            $this->view('wiki/add');
            
        }
       

    }

