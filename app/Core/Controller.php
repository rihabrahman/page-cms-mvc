<?php

class Controller
    {
        public function view($name)
        {
            $fileName = "../views/" . $name . ".view.php"; 
            if(file_exists($fileName))
            {
                require $fileName;
            } else{

                $fileName = "../views/404.view.php"; 
                require $fileName;
            }
        }
    }
?>