<?php 

    class Listsrv extends Controller {
        
        public function index($type = '') {
            $net = $this->model('Listtable');
            $net->typeList = $type;
            $forward = $net->getInfo();
            $this->view('list/index', $forward);
           
        }

        public function category($type = 'SRV') {
            $net = $this->model('Listtable');
            $net->typeList = $type;
            $forward = $net->getInfo();
            $this->view('list/category', $forward);
            
        }

        public function edit() {
            
            $this->view('list/edit');
            
        }

        public function add() {
            
            $this->view('list/add');
            
        }
       

    }

