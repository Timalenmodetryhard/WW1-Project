<?php

require BASE_PATH . '/core/controller.php';
require BASE_PATH . '/app/models/giftshopModel.php';

class GiftShopController extends Controller
{      
    private $model;
    private $id;

    public function __construct()
    {
        $this->model = new GiftshopModel();
        $this->id = null;
    }

    public function giftshop()
    {
        $response = array('success' => false);

        $items = $this->model->getAll();
        $this->loadView('giftshop.php', ['data'=>$items]);
    }
}