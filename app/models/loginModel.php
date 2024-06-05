<?php

namespace App\Models;

use Core\Model;

class LoginModel extends Model

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
            $sql      = "SELECT * FROM users";
            $resource = $conn->query($sql);
            if ($resource) {
                $result = $resource;
            }
        }

        return $result;
    }

    public function getUser($email)
    {
        $conn = $this->connectDB();
        $result = null;

        if ($conn) {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        return $result;
    }

    public function updatePassword($hashed_password, $email)
    {
        $conn = $this->connectDB();
        $result = null;

        if ($conn) {
            $sql = "UPDATE users SET password = :password WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":password", $hashed_password, \PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, \PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        return $result;
    }
}
