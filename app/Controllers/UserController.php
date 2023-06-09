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
                $user->store($_POST);
                redirect('user/index');

                $data['errors'] = $user->errors;			
            }
            $this->view('user/create');
        }

        public function edit($id)
        { 
            $array['id'] = $id;
		
            $user = new User();
            $data = $user->first($array);

            redirect('user/edit', $data);


            $this->view('user/create');

            dd($id); die();
        }

        public function destroy($id)
        {
            $array['id'] = $id;
            $user = new User();
            $data = $user->destroy($array);

            $this->index();
        }
    }
?> 