<?php

     class App {

        protected $controller = 'Home';
        protected $method = 'index';
        protected $params = [];

        public function parserUrl(){
            if(isset($_GET['url'])){
                return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_STRING));
            }
        }

        public function __construct(){
            $url = $this->parserUrl();

            if($url !== NULL) {
                if(file_exists('app/controller/'.ucfirst($url[0]).'.php')){
                    $this->controller = ucfirst($url[0]);
                    unset($url[0]);
                }
            }
            require_once 'app/controller/'.$this->controller.'.php';

            $this->controller = new $this->controller;
            
            if(isset($url[1])){
                if(method_exists($this->controller, $url[1])){
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }
            
            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller, $this->method], $this->params);

        }


     }