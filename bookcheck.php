<?php
include 'dbcon.php';

$name = $conn->real_escape_string($_POST['name']);
$phone = $conn->real_escape_string($_POST['phone']);
$address = $conn->real_escape_string($_POST['address']);
$email = $conn->real_escape_string($_POST['email']);
$dateperiod = $conn->real_escape_string($_POST['dateperiod']);
$canopytype = $conn->real_escape_string($_POST['canopytype']);
$quantity = $conn->real_escape_string($_POST['quantity']);
$numberofdays = $conn->real_escape_string($_POST['numberofdays']);

$prices = array(
   "Arabian Canopy" => 2000,
   "Pyramid Canopy" => 1800,
   "Transparent Canopy" => 1300,
   "Half Moon Canopy" => 1500,
   "Marquee Canopy" => 1500,
   "Air Conditioned Canopy" => 3000
);

$canopyprice = $prices[$canopytype];
$totalprice = $canopyprice * $quantity * $numberofdays;
$overallprice = $totalprice * 0.5;

$sql = "INSERT INTO booking (name, phone, address, email, dateperiod, canopytype, quantity, numberofdays, totalprice, overallprice) VALUES ('$name', '$phone', '$address', '$email', '$dateperiod', '$canopytype', '$quantity', '$numberofdays', '$totalprice', '$overallprice')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
   echo "";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

// Prepare your statement
$stmt = $conn->prepare("SELECT * FROM booking WHERE id = ?");

// Bind the parameter to the statement
$stmt->bind_param("i", $last_id); // replace 'i' with the correct type of your ID column

// Execute the statement
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();

// Fetch the row and generate the receipt
if ($row = $result->fetch_assoc()) {
  echo '<!DOCTYPE html>';
  echo '<html>';
  echo '<head>';
  echo '<title>Receipt</title>';
  echo '<style> body{background-color: #ffffff; background-repeat: no-repeat; background-size: cover;} .center{display: flex; justify-content: center; align-items: center; height: 10vh;} a{padding: 10px 30px; background: radial-gradient(759px at 14% 22.3%, rgb(10, 64, 88) 0%, rgb(15, 164, 102) 90%); font-size: 14px; color: #ffffff} a:hover{background: radial-gradient(circle at 6.4% 9.8%, rgb(88, 242, 174) 0%, rgb(0, 130, 240) 97.9%); color: #000000;} .container{margin-left: 50px; margin-right: 50px; font-size: 15px; width: 35%; border-style: solid; border-color: #000000; margin: auto; } .receipthead{padding: 1px; background-color: #4dbd67;} .receiptfooter{padding: 1px; background-color: #4dbd67;} .contform{padding: 0; margin-left: 25px; margin-right: 30px; font-size: 14px;}</style>';
  echo '</head>';
  echo '<body>';
  echo '<div class="container">';
  echo '<div id="receipt">';
  echo '<div class="receipthead">';
  echo '<h1 style="align-items:center;text-align:center; font-size: 25px;">Receipt</h1>';
  echo '</div>';
  echo '<h2 style="align-items:center;text-align:center;">Vancover</h2>';
  echo '<div class=contform>';
  echo "<p>Receipt ID: " . $last_id . "</p>";
  echo '<p>Name: ' . $row["name"] . '</p>';
  echo '<p>Phone: ' . $row["phone"] . '</p>';
  echo '<p style="line-height: 1.6;">Address: ' . $row["address"] . '</p>';
  echo '<p>Email: ' . $row["email"] . '</p>';
  echo '<p>Date Period: ' . $row["dateperiod"] . '</p>';
  echo '<p>Canopy Type: ' . $row["canopytype"] . '</p>';
  echo '<p>Quantity: ' . $row["quantity"] . '</p>';
  echo '<p>Number of Days: ' . $row["numberofdays"] . '</p>';
  echo '<p>Total Price: RM' . $row["totalprice"] . '</p>';
  echo '<p>Deposit Price (50%): RM' . $row["overallprice"] . '</p>';
  echo '</div>';
  echo '</div>';
  echo '<div class="receiptfooter">';
  echo '<div class="center">';
  echo "<a href='booksubmit.php?id=".$row["id"]."' style='align-items:center;text-align:center; margin-left:0; margin-right:0;'>Confirm</a><br>";
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</body>';
  echo '</html>';
} else {
  echo "No booking found with the given ID.";
}

$conn->close();
?>