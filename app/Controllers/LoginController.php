<?php

    class LoginController extends Controller
    {
        public function index()
        {
            $data = [];
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $user = new User;
                $arr['name'] = 'test';
                $arr['email'] = 'test';
                $arr['password'] = 'test';
                $arr['role'] = 'test';
                $arr['status'] = 'test';
                $row = $user->index($arr);
                if($row)
                {
                    if($row['password'] === md5($_POST['password']))
                    {
                        $_SESSION['USER'] = $row;
                        redirect('home');
                    }
                }

                $user->errors['email'] = "Wrong email or password";

                $data['errors'] = $user->errors;
            }

            $this->view('login',$data);
        }
    }
?>