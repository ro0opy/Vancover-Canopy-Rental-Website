<?php
session_start();

if(isset($_SESSION["loggedin"])) {
   unset($_SESSION["loggedin"]);
   unset($_SESSION["id"]);
   unset($_SESSION["uname"]);
   session_destroy();
   echo "<script>alert('You are now logged out'); window.location.href='index.html';</script>";
} else {
   echo "<script>alert('You are not logged in');</script>";
}
?>
