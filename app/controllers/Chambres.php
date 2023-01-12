<?php

class Chambres extends Controller 
{
    function __construct()
    {
        $this->chambre=$this->model('Chambre');
    }

    function filterChambre()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $id_nav=$_POST['id_nav'];
            $data=$this->chambre->filterChambre($id_nav);

            echo json_encode($data);
        }
    }

    function deleteChambre($id_ch)
    {
        if($this->Chambre->deletechambre($id_ch) == TRUE)
        {
            $_SESSION['notif'] = 'Room deleted';
            header('Location:'.URLROOT.'/pages/chambre');
            exit();
        }
    }

    function addchambre()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            extract($_POST);
            if($this->chambre->addchambre($prix_ch,$type,$id_navire)==true)
            {
                $_SESSION['notif']="chambre added";
                header('Location:'.URLROOT.'/pages/chambre');
                exit();
            }
        }
    }
}