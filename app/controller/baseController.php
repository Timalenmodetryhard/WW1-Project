<?php

require BASE_PATH . '/core/controller.php';

class BaseController extends Controller
{

    function __construct()
    {

    }

    public function contact()
    {
        $this->loadView('contact.php');
    }
    public function deconnecter()
    {
        $this->loadView('deconnexion.php');
    }
}
