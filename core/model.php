<?php

require BASE_PATH . '/app/configs.php';

class Model
{
    protected $table;

    function __construct()
    {

    }

    protected function connectDB()
    {
        try {
            $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true);
            $pdo = new PDO(
                'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME,
                DB_USER,
                DB_PASSWORD,
                $options
            );
            return $pdo;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
}
