<?php

require BASE_PATH . '/core/controller.php';
require BASE_PATH . '/app/models/scheduleModel.php';

class ScheduleController extends Controller
{      
    private $model;
    private $id;

    public function __construct()
    {
        $this->model = new ScheduleModel();
        $this->id = null;
    }

    public function schedule()
    {
        return $this->model->getAll();
    }
}