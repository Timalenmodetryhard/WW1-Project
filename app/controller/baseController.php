<?php

require BASE_PATH . '/core/controller.php';

class BaseController extends Controller
{

    function __construct()
    {

    }

    public function home()
    {
        $this->loadView('home.php');
    }
    public function booking()
    {
        $this->loadView('booking.php');
    }
    public function information()
    {
        $this->loadView('information.php');
    }
    public function testimony()
    {
        $this->loadView('testimony.php');
    }
    public function deconnecter()
    {
        $this->loadView('deconnexion.php');
    }
}
