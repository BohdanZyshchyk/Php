<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $email = $_POST["email"];
    $name = $_POST["name"];
    $image = $_POST["image"];
    $password = $_POST["password"];
    include_once "connection_database.php";

    $sql = "INSERT INTO tbl_users (Email, Name, Password, Image) VALUES (?,?,?,?)";
    $stmt= $dbh->prepare($sql);
    $stmt->execute([$email, $name, $password, $image]);

    header("Location: /users.php");
    exit;
}