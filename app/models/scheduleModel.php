<?php

namespace App\Models;

use Core\Model;

class ScheduleModel extends Model

{
    function __construct()
    {
        parent::__construct();
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
    
    public function editDay($data = array())
    {
        $conn   = $this->connectDB();
        $result = array();

        if ($conn)
        {
            $sql        = "UPDATE schedule SET hours = :hours, status = :status WHERE day = :day";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':day', $data["day"], \PDO::PARAM_STR);
            $stmt->bindParam(':hours', $data["hours"], \PDO::PARAM_STR);
            $stmt->bindParam(':status', $data["status"], \PDO::PARAM_STR);
            $result = $stmt->execute();
        }
        return $result;
    }
}
