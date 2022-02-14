<?php 
if (isset($_POST["signup"])) {
  $full_name = mysqli_real_escape_string($conn, $_POST["signup_full_name"]);
  $email = mysqli_real_escape_string($conn, $_POST["signup_email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["signup_password"]));
  $cpassword = mysqli_real_escape_string($conn, md5($_POST["signup_cpassword"]));

  //Check if the Email Already Exist in the Database
  $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'"));

  //Check if the password Match
  if ($password !== $cpassword) {
    echo "<script>alert('Password did not match.');</script>";
  } elseif ($check_email > 0) {
    echo "<script>alert('Email already taken.');</script>";
  }else{
    //Insert user information into the database
    $sql = "INSERT INTO users (full_name, email, password)VALUES('$full_name','$email','$password')";
    $result= mysqli_query($conn, $sql);
    //Notification on whether Registration was successfully or not
    if($result){
      echo "<script>alert('User Registration Succesfully.');</script>";
    }else{
      echo "<script>alert('User Registration Failed.');</script>";
    }
  }
}
?>