<?php

require BASE_PATH . '/core/model.php';

class EventModel extends Model

{
    function __construct()
    {

    }

    public function getAll()
    {
        $conn     = $this->connectDB();
        $result   = null;

        if ($conn) {
            $sql      = "SELECT * FROM events ORDER BY id DESC";
            $resource = $conn->query($sql);
            if ($resource) {
                $result = $resource;
            }
        }

        return $result;
    }
}
