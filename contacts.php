<?php
include 'dbcon.php';

if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $message = $_POST['message'];

   // Database connection
   $conn = new mysqli('localhost','root','','vancover');
   if($conn->connect_error){
       die('Connection Failed : '.$conn->connect_error);
   }else{
       $stmt = $conn->prepare("INSERT INTO comment (name, message) VALUES (?, ?)");
       if($stmt === false) {
          trigger_error('Wrong SQL: ' . $conn->error, E_USER_ERROR);
       }
       $stmt->bind_param("ss", $name, $message);
       $stmt->execute();
           echo "<script>alert('You had sent your message. We will consider your message.'); window.location.href='index.php';</script>";
       $stmt->close();
       $conn->close();
   }
}
?>
