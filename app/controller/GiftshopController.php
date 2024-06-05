<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\GiftshopModel;

require_once BASE_PATH . '/core/controller.php';
require_once BASE_PATH . '/app/models/giftshopModel.php';
class GiftshopController extends Controller
{      
    private $model;
    private $id;

    public function __construct()
    {
        $this->model = new GiftshopModel();
        $this->id = null;
    }

    public function giftshop()
    {
        $response = array('success' => false);

        $items = $this->model->getAll();
        $this->loadView('giftshop.php', ['data'=>$items]);
    }

    public function new_item()
    {
        $response = array('success' => false);

        $this->loadView('giftshop_add.php');

        if (isset($_POST["add"])) {
            if (!isset($_POST["name"])) {
                echo "Name is missing";
                return;
            }

            if (!isset($_POST["description"])) {
                echo "Description is missing";
                return;
            }

            // Vérifier si le fichier a été correctement téléchargé
            if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                echo "An error occurred while uploading the image.";
                return;
            }

            // Définir le répertoire cible
            $target_dir = "uploads/";

            // Construire le chemin complet du fichier cible
            $target_file = $target_dir . basename($_FILES["image"]["name"]);

            // Déplacer le fichier téléchargé vers le répertoire cible
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "Sorry, there was an error uploading your file.";
                return;
            }

            // Redimensionner l'image
            $resized_file = "uploads/resized_item_" . basename($_FILES["image"]["name"]);
            list($width, $height) = getimagesize($target_file);
            $new_width = 504;
            $new_height = 336;
            // Déterminer le type de l'image et utiliser la fonction appropriée
            $image_type = exif_imagetype($target_file);
            switch ($image_type) {
                case IMAGETYPE_JPEG:
                    $image = imagecreatefromjpeg($target_file);
                    break;
                case IMAGETYPE_PNG:
                    $image = imagecreatefrompng($target_file);
                    break;
                case IMAGETYPE_GIF:
                    $image = imagecreatefromgif($target_file);
                    break;
                default:
                    echo "Unsupported image type.";
                    return;
            }

            $image_p = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

            // Sauvegarder l'image redimensionnée
            switch ($image_type) {
                case IMAGETYPE_JPEG:
                    imagejpeg($image_p, $resized_file);
                    break;
                case IMAGETYPE_PNG:
                    imagepng($image_p, $resized_file);
                    break;
                case IMAGETYPE_GIF:
                    imagegif($image_p, $resized_file);
                    break;
            }

            // Libérer la mémoire
            imagedestroy($image);
            imagedestroy($image_p);

            // Supprimer le fichier original
            unlink($target_file);

            // Données à enregistrer dans la base de données
            $data = array(
                'name' => filter_var(trim($_POST['name'])) ?? null,
                'price' => filter_var(trim($_POST['price'])) ?? null,
                'description' => filter_var(trim($_POST['description'])) ?? null,
                'image' => $resized_file, // Utilisez le chemin du fichier redimensionné
            );

            // Enregistrer les données dans la base de données
            $response['success'] = $this->model->newItem($data);
            echo "Item added";
        }
    }

    public function edit_item()
    {
        $response = array('success' => false);
        $requestUri = $_SERVER['REQUEST_URI']; // "/site/home?id=x"
        $request = trim($requestUri, "/?"); // "site/home?id=x"

        // Extraire les parties de l'URL
        $parsedUrl = parse_url($request);
        $query = [];
        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $query);
        }

        $id = $query["id"];
        if (!isset($item)){
            $item = $this->model->getItem($id);
        }
        $this->loadView('giftshop_edit.php', ['data'=>$item]);
        var_dump($item);

        if (isset($_POST["edit"])){
            if ($_POST['name'] === ""){
                $_POST['name'] = $item["name"];
            }
            if ($_POST['price'] === ""){
                $_POST['price'] = $item["price"];
            }
            if ($_POST['description'] === ""){
                $_POST['description'] = $item["description"];
            }
            if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                $_FILES['image'] = $item["image"];
                return;
            }
    
            // Définir le répertoire cible
            $target_dir = "uploads/";
    
            // Construire le chemin complet du fichier cible
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
            // Déplacer le fichier téléchargé vers le répertoire cible
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "Sorry, there was an error uploading your file.";
                return;
            }
    
            // Redimensionner l'image
            $resized_file = "uploads/resized_item_" . basename($_FILES["image"]["name"]);
            list($width, $height) = getimagesize($target_file);
            $new_width = 504;
            $new_height = 336;
            // Déterminer le type de l'image et utiliser la fonction appropriée
            $image_type = exif_imagetype($target_file);
            switch ($image_type) {
                case IMAGETYPE_JPEG:
                    $image = imagecreatefromjpeg($target_file);
                    break;
                case IMAGETYPE_PNG:
                    $image = imagecreatefrompng($target_file);
                    break;
                case IMAGETYPE_GIF:
                    $image = imagecreatefromgif($target_file);
                    break;
                default:
                    echo "Unsupported image type.";
                    return;
            }

            $image_p = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

            // Sauvegarder l'image redimensionnée
            switch ($image_type) {
                case IMAGETYPE_JPEG:
                    imagejpeg($image_p, $resized_file);
                    break;
                case IMAGETYPE_PNG:
                    imagepng($image_p, $resized_file);
                    break;
                case IMAGETYPE_GIF:
                    imagegif($image_p, $resized_file);
                    break;
            }

            // Libérer la mémoire
            imagedestroy($image);
            imagedestroy($image_p);

            // Supprimer le fichier original
            unlink($target_file);
            $data = array(
                'id' => $id,
                'name' => filter_var(trim($_POST['name'])) ?? $item["name"],
                'price' => filter_var(trim($_POST['price'])) ?? $item["price"],
                'description' => filter_var(trim($_POST['description'])) ?? $item["description"],
                'image' => $resized_file,
            );
        }
        
        if (!empty($data)) {
            $response['success'] = $this->model->editItem($data);
            echo "Event edited";
        }
    }

    public function delete_item()
    {
        $response = array('success' => false);

        $response = array('success' => false);
        $requestUri = $_SERVER['REQUEST_URI']; // "/site/home?id=x"
        $request = trim($requestUri, "/?"); // "site/home?id=x"

        // Extraire les parties de l'URL
        $parsedUrl = parse_url($request);
        $query = [];
        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $query);
        }

        $id = $query["id"];
                
        $this->loadView('giftshop_delete.php');

        if ($id) {
            $response['success'] = $this->model->deleteItem($id);
        }
    }
}