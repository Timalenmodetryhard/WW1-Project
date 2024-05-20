<?php

require BASE_PATH . '/core/model.php';

class ArticleModel extends Model
{
    function __construct()
    {

    }

    public function getAll()
    {
        $conn     = $this->connectDB();
        $result   = null;

        if ($conn) {
            $sql      = "SELECT * FROM article ORDER BY name DESC";
            $resource = $conn->query($sql);
            if ($resource) {
                $result = $resource;
            }
        }

        return $result;
    }

    public function getLastArticles()
    {
        $conn   = $this->connectDB();
        $result = array();

        if ($conn)
        {
            $sql        = "SELECT * FROM article ORDER BY date DESC";
            $resource   = $conn->query($sql);
            $result     = $resource;
        }
        return $result;
    }

    public function sellArticle($data = array())
    {
        $conn   = $this->connectDB();
        $result = array();

        if ($conn)
        {
            $sql        = "INSERT INTO article(email, price, name , description, state, date, image) VALUES(?, ?, ?, ?, ?, ? ,?)";
            $result     = $conn->prepare($sql)->execute([$data["email"], $data["price"], $data["name"], $data["description"], $data["state"], $data["date"], $data["image"]]);
        }
        return $result;
    }

    public function buyArticle($data = array())
    {
        $conn   = $this->connectDB();
        $result = array();

        if ($conn)
        {
            $sql        = "DELETE FROM article WHERE id = ?";
            $result     = $conn->prepare($sql)->execute([$data["id"]]);
        }
        return $result;
    }
}
