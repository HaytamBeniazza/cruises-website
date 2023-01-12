<?php

class Ports extends Controller
{
    function __construct()
    {
        $this->port=$this->model('Port');
    }

    public function addport()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            extract($_POST);
            if($this->port->addport($nom, $pays)==TRUE)
            {
                $_SESSION['notif']="Port added";
                header('Location:../pages/port');
                exit();
            }
        }
    }

    public function deleteport($id_p)
    {
        if($this->port->deleteport($id_p)==true)
        {
            $_SESSION['notif']="Port deleted";
            header('Location:'.URLROOT.'/pages/port');
            exit();
        }
    }
}
