<?php 

    class Network extends Controller {
        
        public function index() {
            $net = $this->model('NetworkBlock');
            $forward = $net->getSwAll();
            $this->view('network/index',$forward);
            
           
        }

        public function block($nameBlock = 'A', $numberSW = 'All') {
            $net = $this->model('NetworkBlock');
            $net->numBlock = $nameBlock;
            $net->numSwith = $numberSW;
            $forward = $net->getSwBlock();
            $this->view('network/block',$forward);
            
        }

        public function edit() {
            $this->view('network/edit');
            
        }
        

    }