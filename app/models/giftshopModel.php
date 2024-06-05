<?php

namespace App\Models;

use Core\Model;

class GiftshopModel extends Model

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
            $sql      = "SELECT * FROM giftshop ORDER BY id DESC";
            $resource = $conn->query($sql);
            if ($resource) {
                $result = $resource;
            }
        }

        return $result;
    }

    public function getItem($id)
    {
        $conn = $this->connectDB();
        $result = null;

        if ($conn) {
            $sql = "SELECT * FROM giftshop WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC); // Utilisez fetch pour obtenir une seule ligne
        }

        return $result;
    }


    public function newItem($data = array())
    {
        $conn   = $this->connectDB();
        $result = array();

        if ($conn)
        {
            $sql        = "INSERT INTO giftshop(name, price, description, image) VALUES (?, ?, ?, ?)";
            $resource   = $conn->prepare($sql)->execute([$data["name"], $data["price"], $data["description"], $data["image"]]);
            $result     = $resource;
        }
        return $result;
    }
    
    public function editItem($data = array())
    {
        $conn = $this->connectDB();
        $result = false;

        if ($conn) {
            $sql = "UPDATE giftshop SET name= :name, price= :price, description = :description, image = :image WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $data['id'], \PDO::PARAM_INT);
            $stmt->bindParam(':name', $data['name'], \PDO::PARAM_STR);
            $stmt->bindParam(':price', $data['price'], \PDO::PARAM_STR);
            $stmt->bindParam(':description', $data['description'], \PDO::PARAM_STR);
            $stmt->bindParam(':image', $data['image'], \PDO::PARAM_STR);
            $result = $stmt->execute();
        }

        return $result;
    }

    
    public function deleteItem($id)
    {
        $conn   = $this->connectDB();
        $result = array();

        if ($conn)
        {
            $sql        = "DELETE FROM giftshop WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $result = $stmt->execute();
        }
        return $result;
    }
}
