<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\EventModel;

require_once BASE_PATH . '/core/controller.php';
require_once BASE_PATH . '/app/models/eventModel.php';

class EventController extends Controller
{      
    private $model;
    private $id;

    public function __construct()
    {
        $this->model = new EventModel();
        $this->id = null;
    }

    public function new_event()
    {
        $response = array('success' => false);

        $this->loadView('event_add.php');

        if (isset($_POST["add"])) {
            if (!isset($_POST["title"])) {
                echo "Title is missing";
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

            // Déterminer le type de l'image et vérifier s'il est pris en charge
            $image_type = exif_imagetype($_FILES['image']['tmp_name']);
            if ($image_type !== IMAGETYPE_JPEG && $image_type !== IMAGETYPE_PNG && $image_type !== IMAGETYPE_GIF) {
                echo "Unsupported image type.";
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
            $resized_file = "uploads/resized_event_" . basename($_FILES["image"]["name"]);
            list($width, $height) = getimagesize($target_file);
            $new_width = 500;
            $new_height = 197;

            // Utiliser la fonction appropriée selon le type de l'image
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
                'title' => filter_var(trim($_POST['title'])) ?? null,
                'description' => filter_var(trim($_POST['description'])) ?? null,
                'image' => $resized_file, // Utilisez le chemin du fichier redimensionné
            );

            // Enregistrer les données dans la base de données
            $response['success'] = $this->model->newEvent($data);
            echo "Event added";
        }
    }

    public function edit_event()
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
        if (!isset($item)) {
            $item = $this->model->getEvent($id);
        }
        $this->loadView('event_edit.php', ['data' => $item]);
        var_dump($item);

        if (isset($_POST["edit"])) {
            $title = $_POST['title'] === "" ? $item["title"] : $_POST['title'];
            $description = $_POST['description'] === "" ? $item["description"] : $_POST['description'];

            // Vérifier si une nouvelle image a été téléchargée
            if ($_FILES['image']['name'] === "") {
                // Si le champ image est vide, utiliser l'image existante
                $resized_file = $item["image"];
            } else {
                // Vérifier si le fichier a été correctement téléchargé
                if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                    echo "An error occurred while uploading the image.";
                    return;
                }

                // Vérifier le type de l'image et vérifier s'il est pris en charge
                $image_type = exif_imagetype($_FILES['image']['tmp_name']);
                if ($image_type !== IMAGETYPE_JPEG && $image_type !== IMAGETYPE_PNG && $image_type !== IMAGETYPE_GIF) {
                    echo "Unsupported image type.";
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
                $resized_file = "uploads/resized_event_" . basename($_FILES["image"]["name"]);
                list($width, $height) = getimagesize($target_file);
                $new_width = 500;
                $new_height = 197;

                // Utiliser la fonction appropriée selon le type de l'image
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
            }

            $data = array(
                'id' => $id,
                'title' => filter_var(trim($title)) ?? $item["title"],
                'description' => filter_var(trim($description)) ?? $item["description"],
                'image' => $resized_file,
            );

            if (!empty($data)) {
                $response['success'] = $this->model->editEvent($data);
                echo "Event edited";
            }
        }
    }


    public function delete_event()
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
                
        $this->loadView('event_delete.php');

        if ($id) {
            $response['success'] = $this->model->deleteEvent($id);
        }
    }
}

