<?php
$servername = "localhost";
$username = "root";
$password = "";
$message ="";
try {
  $conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if (isset($_POST["signin"])){
      if (empty($_POST["email"])|| empty($_POST["password"])){
          $message = '<label> All fields is required</label>';
      }
      else{
          $query = "SELECT * FROM users WHERE email = :email AND password= :password";
          $statement = $conn ->prepare($query);
          $statement->execute(
              array (
                  'email' => $_POST["email"],
                  'password' => $_POST["password"]
              )
              );
              $count = $statement->rowCount();
              if ($count > 0)
              {
                  $_SESSION["username"] = $_POST["username"];
                  header("location: home.php");
              }
              else{
                  $message = '<label> Username OR Password is Wrong</label>';
              }
      }
  }
 // echo "Connected successfully";
} catch(PDOException $e) {
  $message =$e->getMessage();
}
$conn = null;
?>