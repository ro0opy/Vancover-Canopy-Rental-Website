<?php
session_start();

include 'dbcon.php';

if(isset($_POST['login'])){
   $email = $_POST['email'];
   $password = $_POST['password'];

   $sql = "SELECT * FROM user WHERE email='$email'";
   $result = mysqli_query($conn, $sql);

   if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        if(password_verify($password, $hashedPassword)) {
           $_SESSION["loggedin"] = true;
           $_SESSION["id"] = $row["id"];
           $_SESSION["uname"] = $row["uname"];
           header("location:index.php");
        }else {
            echo "<script>alert('Email or Password is incorrect'); window.location.href='login.php';</script>";
        }

   } else {
       echo "<script>alert('Email or Password is incorrect'); window.location.href='login.php';</script>";
   }

   mysqli_close($conn);
}
?>