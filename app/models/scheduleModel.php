<?php

require BASE_PATH . '/core/model.php';

class ScheduleModel extends Model

{
    function __construct()
    {

    }

    public function getAll()
    {
        $conn     = $this->connectDB();
        $result   = null;

        if ($conn) {
            $sql      = "SELECT * FROM schedule";
            $resource = $conn->query($sql);
            if ($resource) {
                $result = $resource;
            }
        }

        return $result;
    }
}
