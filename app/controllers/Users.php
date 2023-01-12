<?php
    class Users extends Controller
    {
        public function __construct()
        {
            $this->user=$this->model('User');
        }

        public function register()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                extract($_POST);
                $hashed_pass=password_hash($pass,PASSWORD_DEFAULT);
                if($this->user->register($nom,$prenom,$email,$hashed_pass)==TRUE)
                {
                    echo 'Added';
                }
            }
        }
            // else
            // {
            //     $data = [
            //         'name' => '',
            //         'email' => '',
            //         'password'=> '',
            //         'confirm_password' => '',
            //         'name_err' => '',
            //         'email_err' => '',
            //         'password_err' => '',
            //         'confirm_password_err' => ''
            //     ];

        public function login()
        {
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                extract($_POST);
                $data=$this->user->login($email, $pass);
                echo $data;
            }
        }
    }