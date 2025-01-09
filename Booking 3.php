<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <style>
        /* Add your styles here */
    </style>
</head>
<body>

  <?php
include 'dbcon.php';

// Check if the user is logged in
session_start();

if (!isset($_SESSION['uname'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// PHP logic for processing form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $date = $_POST["date"];
    $canopy = $_POST["canopy"];
    $days = $_POST["days"];

    $dailyRate = 1700;
    $canopyPrices = [
        'Arabian Canopy' => 2000,
        'Pyramid Canopy' => 1800,
        'Transparent Canopy' => 1300,
        'Half Moon Canopy' => 1500,
        'Marquee Canopy' => 1500,
        'Air Conditioned Canopy' => 3000
    ]; 
    if (isset($canopyPrices[$canopy])) {
            $canopyPrice = $canopyPrices[$canopy];
            $totalPrice = $canopyPrice * $days + $dailyRate;
            $deposit = $totalPrice * 0.5;

            echo "<p>Booking Details:</p>";
            echo "<p>Name: $name</p>";
            echo "<p>Phone Number: $phone</p>";
            echo "<p>Address: $address</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Date (Period): $date</p>";
            echo "<p>Canopy Category: $canopy</p>";
            echo "<p>Number of Days: $days</p>";
            echo "<p>Canopy Price (RM): $canopyPrice</p>";
            echo "<p>Total Price (RM): $totalPrice</p>";
            echo "<p>Deposit (50%): $deposit</p>";
        } else {
            echo "<p>Error: Please select a valid canopy category.</p>";
        }

    if (isset($canopyPrices[$canopy])) {
        $canopyPrice = $canopyPrices[$canopy];
        $totalPrice = $canopyPrice * $days + $dailyRate;
        $deposit = $totalPrice * 0.5;

        // Store booking details in the database
        $sql = "INSERT INTO bookings (name, phone, address, email, date, canopy, days, canopy_price, total_price, deposit)
                VALUES ('$name', '$phone', '$address', '$email', '$date', '$canopy', '$days', '$canopyPrice', '$totalPrice', '$deposit')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Booking Details successfully stored in the database.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    } else {
        echo "<p>Error: Please select a valid canopy category.</p>";
    }
}

// Close the database connection
$conn->close();
?>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="date">Date (Period):</label>
        <input type="date" id="date" name="date" required>

        <label for="canopy">Canopy Category:</label>
        <select id="canopy" name="canopy">
            <option value="Arabian Canopy">Arabian Canopy</option>
            <option value="Pyramid Canopy">Pyramid Canopy</option>
            <option value="Transparent Canopy">Transparent Canopy</option>
            <option value="Half Moon Canopy">Half Moon Canopy</option>
            <option value="Marquee Canopy">Marquee Canopy</option>
            <option value="Air Conditioned Canopy">Air Conditioned Canopy</option>
        </select>

        <label for="days">Number of Days:</label>
        <input type="number" id="days" name="days" min="1" value="1" required>

        <button type="submit">Calculate and Submit</button>
    </form>

</body>
</html>
