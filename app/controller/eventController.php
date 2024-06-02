<?php

require BASE_PATH . '/core/controller.php';
require BASE_PATH . '/app/models/eventModel.php';

class EventController extends Controller
{      
    private $model;
    private $id;

    public function __construct()
    {
        $this->model = new EventModel();
        $this->id = null;
    }

    public function home()
    {
        $response = array('success' => false);

        $events = $this->model->getAll();
        $this->loadView('home.php', ['data'=>$events]);
    }

    public function booking()
    {
        $response = array('success' => false);

        $events = $this->model->getAll();
        $this->loadView('booking.php', ['data'=>$events]);
    }
}