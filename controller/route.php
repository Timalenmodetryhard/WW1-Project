<?php

if (isset($_GET['page'])){
    $page = $_GET['page'];

    if($page == "accueil"){
        include("view/accueil.php");
    }elseif($page == "homme"){
        include("view/homme.php");
    }elseif($page == "femme"){
        include("view/femme.php");
    }elseif($page == "article"){
        include("view/article.php");
    }elseif($page == "panier"){
        include("view/panier.php");
    }elseif($page == "user_connexion"){
        include("view/user_connexion.php");
    }elseif($page == "user_inscription"){
        include("view/user_inscription.php");
    }else{
        include("util/404.php");
    }
}