<?php
session_start();

if (isset($_GET['page'])){
    $page = $_GET['page'];
    if (stripos($page, "user") !== false){
        include_once("view/user.php");
    }elseif ($page=="deconnexion"){
        include_once("view/deconnexion.php");
    } else {
        include_once("view/layout/header.php");
        include_once("controller/route.php");
        include_once("view/layout/footer.php");
    }
}