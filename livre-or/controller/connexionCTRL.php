<?php
require 'model/model.php'; 
require 'authCTRL.php';

userConnet();

$msg['login'] = "";
$msg['pwd'] = "";

if(isset($_POST['co']) && $_POST['co'] == 'Se Connecter') {

    $login = htmlentities(trim($_POST['login']));
    $pwd = htmlentities(trim($_POST['password']));
    
    if (!empty($login) && !empty($pwd)) {
        $user = getUser($login);
            
        if(count($user)) {
            if($pwd == $user[0]['password']) {

                $_SESSION['login'] = $user[0]['login'];
                $_SESSION['id'] = $user[0]['id'];

                header('Location: ?page=accueil');
                
            } else {
                $msg['pwd']= "Le mot de passe est incorrect.";
            }
        } else {
            $msg['login']= "Le login est inconnu.";
        }
    }

    if (empty($login)) {
        $msg['login'] = "Veuillez entrer votre login";
    }

    if (empty($pwd)) {
        $msg['pwd'] = "Veuillez entrer votre mot de passe";
    }
}