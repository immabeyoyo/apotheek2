<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = '';

try {
    require_once "dbh.inc.php";
    if (isset($_POST["login"])) {
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $message = '<label>All fields are required</label>';
        } else {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $query = "SELECT * FROM gebruiker WHERE username = :username;";
            $statement = $connect->prepare($query);
            $statement->execute(array(':username' => $username));
            $count = $statement->rowCount();
            if ($count > 0) {
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $row['pwd'])) {
                    $_SESSION["username"] = $username;
                    header("location: ../Voorlichting/voorlichting.html");
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
?>
