<?php
session_start();
require_once "dbh.inc.php";

$message = '';

try {
    if (isset($_POST["login"])) {
        if (empty($_POST["username"]) || empty($_POST["pwd"])) {
            $message = '<label>All fields are required</label>';
        } else {
            $username = $_POST["username"];
            $password = $_POST["pwd"];

            $query = "SELECT * FROM gebruiker WHERE username = :username;";
            $statement = $pdo->prepare($query); 
            $statement->execute(array(':username' => $username));
            $count = $statement->rowCount();
            if ($count > 0) {
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $row['pwd'])) {
                    $_SESSION["username"] = $username;
                    header("location: inloggen.html");
                    exit();
                } else {
                    $message = '<label>Wrong Password</label>';
                }
            } else {
                $message = '<label>Username not found</label>';
            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
