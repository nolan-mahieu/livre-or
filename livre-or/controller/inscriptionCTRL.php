<?php
require 'model/model.php';
require 'authCTRL.php';

userConnet();

$msg['login'] = "";
$msg['pwd'] = "";
$msg['c-pwd'] = "";

if(isset($_POST['ins']) && $_POST['ins'] == 'S\'inscrire') {

    $login = htmlentities(trim($_POST['login']));
    $pwd = htmlentities(trim($_POST['password']));
    $confirmPwd = htmlentities(trim($_POST["confirm-password"]));
    
    $result = UserExist($login);

    if($result != 0) {
        $msg['login'] = "Ce login est déjà utilisé";
    }

    else if(!empty($login) && !empty($pwd)) {

        if ($pwd == $confirmPwd) {
            $registrationUser = insertUserDB($login, $pwd);
            header('Location: ?page=connexion');
        } else {
            $msg['c-pwd'] = "Les mots de passe ne correspondent pas";
        }

    } else {     
        if (empty($login)) {
            $msg['login'] = "Veuillez entrer un login";
        }

        if (empty($pwd)) {
            $msg['pwd'] = "Veuillez entrer un mot de passe";
        }

        if (empty($confirmPwd)) {
            $msg['c-pwd'] = "Veuillez confirmer le mot de passe";
        }
    }
}