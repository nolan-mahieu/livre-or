<?php
require 'model/model.php';
require 'authCTRL.php';

userNotConneted();

$msg['login'] = "";
$msg['valid'] = "";
$msg['pwd'] = "";
$msg['c-pwd'] = "";

$userSession = getUserSession();

if(isset($_POST['mod']) && isset($_POST['mod']) == 'Modifier') {
    
    $login = htmlentities(trim($_POST['login']));
    $pwd = htmlentities(trim($_POST['password']));
    $confirmPwd = htmlentities(trim($_POST['confirm-password']));

    $result = UserExist($login);

    if(($result != 0) && $login != $_SESSION['login']) {
        $msg['login'] = "Ce login est déjà utilisé.";

    } else {
  
        if ($pwd == $confirmPwd) {

            $updateUser = updateUser($login, $pwd);
            session_start();
            $_SESSION['login'] = $login;

            header('Location: ?page=profil');
        } else {
            $msg['pwd'] = "Les mots de passe ne correspondent pas";
        }
    }
}