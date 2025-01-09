<?php
include 'dbcon.php';

   if(isset($_POST['submit'])){
      $uname = $_POST['uname'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];

   // Check if the username already exists
      $query = "SELECT * FROM user WHERE uname = '$uname'";
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
         echo "<script type='text/javascript'>
         alert('Username already exists');
         window.location.href='register.php';
         </script>";
         exit();
      }

   // Check if the email already exists
      $query = "SELECT * FROM user WHERE email = '$email'";
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
         echo "<script type='text/javascript'>
         alert('Email already exists');
         window.location.href='register.php';
         </script>";
         exit();
      }

   // Check if the phone number already exists
      $query = "SELECT * FROM user WHERE phone = '$phone'";
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
         echo "<script type='text/javascript'>
         alert('Phone Number already exists');
         window.location.href='register.php';
         </script>";
         exit();
      }

   // Check if the password already exists
      $query = "SELECT * FROM user WHERE password = '$password'";
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
         echo "<script type='text/javascript'>
         alert('Password already exists');
         window.location.href='register.php';
         </script>";
         exit();
      }

      // Hash the password
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $sql = "INSERT INTO user (uname, email, phone, password) VALUES ('$uname', '$email', '$phone', '$hashedPassword')";

      $result = mysqli_query($conn, $sql);

      if ($result) {
         echo "<script type='text/javascript'>
         alert('Registration Successful! Go to Login');
         window.location.href='login.php';
         </script>";
      } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
      }
   }
?>