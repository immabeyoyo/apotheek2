<?php
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];
  $email = $_POST["email"];

  try {
      require_once "dbh.inc.php";

      $query = "INSERT INTO gebruiker (username, pwd, email) VALUES (:username, :pwd, :email);";

      $stmt = $pdo->prepare($query);

      $stmt->bindParam(":username", $username);
      $stmt->bindParam(":pwd", $pwd);
      $stmt->bindParam(":email", $email);

      $stmt->execute();

      $pdo = null;
      $stmt = null;

      header("Location: ../Inschrijven/inschrijven.html");
      die();
  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }
} else {
  header("Location: ../Inschrijven/inschrijven.html");
}

*/
// ---------------------------------------------------------

try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM users WHERE username = :username AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["username"] = $_POST["username"];  
                     header("location:../Voorlichting/voorlichting.html.");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  