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
    public function giftshop()
    {
        $this->loadView('giftshop.php');
    }
}
