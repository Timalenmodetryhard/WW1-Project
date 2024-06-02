<?php

require BASE_PATH . '/core/controller.php';

class BaseController extends Controller
{

    function __construct()
    {

    }
    public function information()
    {
        $this->loadView('information.php');
    }
    public function testimony()
    {
        $this->loadView('testimony.php');
    }
    public function helpandvolunteer()
    {
        $this->loadView('helpandvolunteer.php');
    }
    public function volunteer()
    {
        $this->loadView('volunteer.php');
    }
    public function praticalinfos()
    {
        $this->loadView('praticalinfos.php');
    }
    public function giftshop()
    {
        $this->loadView('giftshop.php');
    }
    public function deconnecter()
    {
        $this->loadView('deconnexion.php');
    }
}
