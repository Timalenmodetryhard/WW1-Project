<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\EventModel;
use App\Models\GiftshopModel;
use App\Models\ScheduleModel;

require_once BASE_PATH . '/core/controller.php';
require_once BASE_PATH . '/app/models/eventModel.php';
require_once BASE_PATH . '/app/models/scheduleModel.php';
require_once BASE_PATH . '/app/models/giftshopModel.php';

class BaseController extends Controller
{
    private $eventModel;
    private $giftshopModel;
    private $scheduleModel;
    private $id;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->giftshopModel = new GiftshopModel();
        $this->scheduleModel = new ScheduleModel();
        $this->id = null;
    }

    public function home()
    {
        $response = array('success' => false);

        $events = $this->eventModel->getAll();
        $schedule = $this->scheduleModel->getAll();
        $items = $this->giftshopModel->getAll();
        $this->loadView('home.php', ['data'=>array("events"=>$events,"schedule"=>$schedule,"items"=>$items)]);
    }
}
