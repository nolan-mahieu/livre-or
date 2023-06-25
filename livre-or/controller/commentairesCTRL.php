<?php
require 'model/model.php';
require 'authCTRL.php';

userNotConneted();

$msg['erreur'] = "";
$msg['valid'] = "";

if ((isset($_POST['valider'])) && $_POST['valider'] == 'Valider') {

    if (!empty($_POST['commentaire'])) {

        $comment = $_POST['commentaire'];
        $id = $_SESSION['id'];

        $addcomment = insertComment($comment, $id);

        $msg['valid']= "Votre commentaire à bien été ajouté";

    } else {
        $msg['erreur']= "Veuillez écrire un commentaire";
    }
}