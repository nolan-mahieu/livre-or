<?php

function userNotConneted() {
    // REDIRECTION UTILISATEUR NON CONNECTE
    if (!isset($_SESSION['login'])) {
        header("location: ?page=connexion");
        exit;
      }
      session_write_close();
}

function userConnet() {
    // REDIRECTION UTILISATEUR CONNECTE
    if (isset($_SESSION['login'])) {
        header("location: ?page=profil");
        exit;
      }
}