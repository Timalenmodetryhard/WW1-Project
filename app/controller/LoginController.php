<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\LoginModel;

require_once BASE_PATH . '/core/controller.php';
require_once BASE_PATH . '/app/models/loginModel.php';
class LoginController extends Controller
{      
    private $model;
    private $id;

    public function __construct()
    {
        $this->model = new LoginModel();
        $this->id = null;
    }

    public function login()
    {
        $response = array('success' => false);

        $this->loadView('login.php');
        if (isset($_POST["login"])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $remember_me = isset($_POST['remember_me']);  // Check if "Remember Me" checkbox is checked
            $user = $this->model->getUser($email);
            if (password_verify($password, $user['password'])) {
                if ($remember_me) {
                    setcookie('email', $email, time() + (15 * 24 * 60 * 60), "/", "", false, true);
                    setcookie('password_hash', $user['password'], time() + (15 * 24 * 60 * 60), "/", "", false, true);
                }
                header("Location: /");
                exit();
            } else {
                header("Location: /login");
                exit();
            }
        }
    }

    public function forget_password()
    {
        $response = array('success' => false);
   
        $this->loadView('forget_password.php');
        if (isset($_POST["forget"])){
            $email = $_POST['email'];
            $user = $this->model->getUser($email);
            // generate a new password
            $new_password = bin2hex(random_bytes(10));
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
    
            // send the new password by email
            $to = $email;
            $subject = "new password request";
            $message = "You password has been update. Now it is : " . $new_password;
            $headers = "From: $email";
    
            if (mail($to, $subject, $message, $headers)) {   
                if ($response['success'] = $this->model->updatePassword($hashed_password, $email)) {
                    echo "Password updated in the database";
                    // reduction to the success page
                    header("Location: /");
                    echo "Password updated";
                    exit();
                } else {
                    // redirection to the error page
                    header("Location: /login");
                    echo("it since to be an error ... please verify the information enter and retry.");
                    exit();
                }
            } else {
                echo "Erreur lors de l'envoi de l'e-mail";
                // redirection to the error page
                header("Location: /login");
                echo("it simce to be an error ... please verify the information enter and retry.");
                exit();
            }
        }
    }
}