<?php

function dbConnect() {
    $host = 'localhost';
    $dbname = 'livreor';
    $username = 'root';
    $password = 'Azerty01';

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

function userExist($login) {
    $db = dbConnect();
    $sql = "SELECT login FROM utilisateurs WHERE login = :login";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->execute();
    $result = $stmt->rowCount();
    return $result;
}

function insertUserDB($login, $pwd) {
    $db = dbConnect();
    $sql = "INSERT INTO utilisateurs (login, password) VALUES (:login, :pwd)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':pwd', $pwd);
    $stmt->execute();
    return $stmt;
}

function getUser($login) {
    $db = dbConnect();
    $sql = "SELECT * FROM utilisateurs WHERE login = :login";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->execute();
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $user;
}

function getUserSession() {
    $db = dbConnect();
    $sql = "SELECT * FROM utilisateurs WHERE login = :login";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':login', $_SESSION['login']);
    $stmt->execute();
    $userSession = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $userSession;
}

function updateUser($login, $pwd) {
    $db = dbConnect();
    $sql = "UPDATE utilisateurs SET login = :login, password = :pwd WHERE login = :sessionLogin";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':pwd', $pwd);
    $stmt->bindParam(':sessionLogin', $_SESSION['login']);
    $stmt->execute();
    return $stmt;
}

function insertComment($comment, $id) {
    $db = dbConnect();
    $sql = "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (:comment, :id, NOW())";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt;
}

function getComment() {
    $db = dbConnect();
    $sql = "SELECT * FROM commentaires 
            INNER JOIN utilisateurs ON utilisateurs.id = commentaires.id_utilisateur
            ORDER BY date DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $showComment = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $showComment;
}
