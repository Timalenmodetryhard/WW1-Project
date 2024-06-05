<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\ScheduleModel;

require_once BASE_PATH . '/core/controller.php';
require_once BASE_PATH . '/app/models/scheduleModel.php';

class ScheduleController extends Controller

{      
    private $model;
    private $id;

    public function __construct()
    {
        $this->model = new ScheduleModel();
        $this->id = null;
    }

    public function edit_day()
    {
        $response = array('success' => false);

        $this->loadView('schedule_edit.php');
        if (isset($_POST["edit"])){
            if ($_POST['statu'] === "Closed"){
                $_POST["hours"] = "";
            }
            $data = array(
                'day' => filter_var(trim($_POST['day'])) ?? null,
                'status' => filter_var(trim($_POST['statu'])) ?? null,
                'hours' => filter_var(trim($_POST['hours'])) ?? null,
            );
            
            if (!empty($data)) {
                $response["success"] = $this->model->editDay($data);
                echo "Day edited";
            }
        }
    }
}