<?php

class Navires extends Controller
{
    function __construct()
    {
        $this->navire=$this->model('model');
    }

    public function addnavire()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            extract($_POST);
            if($this->navire->addnavire($nom,$nbr_ch,$nbr_p)==TRUE)
            {
                $_SESSION['notif']="Navire added";
                header('Location:../pages/navires');
                exit();
            }
        }
    }

    public function deletenavire($id_n)
    {
        if($this->navire->deletenavire($id_n)==TRUE)
        {
            $_SESSION['notif'] = "navire deleted";
            header("Location:".URLROOT.'/pages/navire');
            exit();
        }
    }
}