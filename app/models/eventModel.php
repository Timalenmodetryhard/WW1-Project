<?php

namespace App\Models;

use Core\Model;

class EventModel extends Model

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
            $sql      = "SELECT * FROM events ORDER BY id DESC";
            $resource = $conn->query($sql);
            if ($resource) {
                $result = $resource;
            }
        }

        return $result;
    }

    public function getEvent($id)
    {
        $conn = $this->connectDB();
        $result = null;

        if ($conn) {
            $sql = "SELECT * FROM events WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC); // Utilisez fetch pour obtenir une seule ligne
        }

        return $result;
    }

    public function newEvent($data = array())
    {
        $conn   = $this->connectDB();
        $result = array();

        if ($conn)
        {
            $sql        = "INSERT INTO events(title, description, image) VALUES (?, ?, ?)";
            $resource   = $conn->prepare($sql)->execute([$data["title"], $data["description"], $data["image"]]);
            $result     = $resource;
        }
        return $result;
    }
    public function editEvent($data)
    {
        $conn = $this->connectDB();
        $result = false;

        if ($conn) {
            $sql = "UPDATE events SET title = :title, description = :description, image = :image WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $data['id'], \PDO::PARAM_INT);
            $stmt->bindParam(':title', $data['title'], \PDO::PARAM_STR);
            $stmt->bindParam(':description', $data['description'], \PDO::PARAM_STR);
            $stmt->bindParam(':image', $data['image'], \PDO::PARAM_STR);
            $result = $stmt->execute();
        }

        return $result;
    }

    
    public function deleteEvent($id)
    {
        $conn   = $this->connectDB();
        $result = array();

        if ($conn)
        {
            $sql        = "DELETE FROM events WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $result = $stmt->execute();
        }
        return $result;
    }
}
