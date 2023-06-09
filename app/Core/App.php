<?php
    class App
    {
        private $controller = "Home";
        private $method = "index";

        private function split_url()
        {
            $url = $_GET['url'] ?? 'home';
            $url = explode("/", trim($url, "/"));
            return $url; 
        }

        public function load_controller()
        {
            $url = $this->split_url();

            $fileName = "../app/Controllers/" . ucfirst($url[0]). "Controller.php"; 

            // select controller
            if(file_exists($fileName))
            {
                require $fileName;
                $this->controller = ucfirst($url[0]). "Controller";
                unset($url[0]);
            } else {
                $fileName = "../app/Controllers/_404Controller.php"; 
                require $fileName;
                $this->controller = "_404Controller";
            }

            $controller = new $this->controller;
            
            // select method
            if(!empty($url[1]))
            {
                if(method_exists($controller, $url[1]))
                {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }   

            call_user_func_array([$controller, $this->method], $url);
        }
    }
?>