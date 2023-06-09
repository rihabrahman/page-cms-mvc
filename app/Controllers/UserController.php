<?php

    class UserController extends Controller
    {
        public function index()
        {
            $data = [];
            $user = new User();
            $data = $user->index();
            $this->view('user/index',$data);
        }

        public function create()
        {
            $this->view('user/create');
        }


        public function store()
        {
            $data = [];
		
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $user = new User();
                $arr['email'] = $_POST['email'];

                // Duplicate email address check
                $duplicateEmailCheckQuery = $user->where($arr);
                if ($duplicateEmailCheckQuery > 0) {
                    $_SESSION['failedMessage'] = 'The email has already been taken.';
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    die();
                }

                $user = new User();
                $user->store($_POST);
                redirect('user/index');

                $data['errors'] = $user->errors;			
            }
            $this->view('user/create');
        }

        public function edit($id)
        { 
            $arr['id'] = $id;		
            $user = new User();
            $data = $user->first($arr);

            $this->view('user/edit', $data);
        }

        public function update($id)
        { 
            $data = [];
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $user = new User();
                $arr['email'] = $_POST['email'];
                $notArr['id'] = $_POST['id'];
                
                // Duplicate email address check
                $duplicateEmailCheckQuery = $user->where($arr, $notArr);
                if ($duplicateEmailCheckQuery > 0) {
                    $_SESSION['failedMessage'] = 'The email has already been taken.';
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    die();
                }

                $user->update($id, $_POST);
                $_SESSION['successMessage'] = 'Editor information updated successfully.';
                return redirect('user/index');
                die();

                $data['errors'] = $user->errors;			
            }
        }

        public function destroy($id)
        {
            $array['id'] = $id;
            $user = new User();
            $data = $user->destroy($array);

            $_SESSION['successMessage'] = 'Editor deleted successfully.';
            return redirect('user/index');
            die();
        }
    }
?> 