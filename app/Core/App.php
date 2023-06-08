<?php

    class App
    {
        private $controller = "Home";
        private $method = "index";

        private function split_url()
        {
            $url = $_GET['url'] ?? 'home';
            $url = explode("/", $url);
            return $url; 
        }

        public function load_controller()
        {
            $url = $this->split_url();

            $fileName = "../app/Controllers/" . ucfirst($url[0]). "Controller.php"; 

            if(file_exists($fileName))
            {
                require $fileName;
                $this->controller = ucfirst($url[0]). "Controller";
            } else {
                $fileName = "../app/Controllers/_404Controller.php"; 
                require $fileName;
                $this->controller = "_404Controller";
            }

            $controller = new $this->controller;
            call_user_func_array([$controller, $this->method], $url);
        }
    }
?>