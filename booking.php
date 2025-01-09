<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Booking Page</title>
    <!-- Favicons -->
    <link href="/vancover/img/favicon-vc.ico" rel="icon">
    <link href="/vancover/img/apple-touch-icon-vc.png" rel="apple-touch-icon">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f8ea; /* Light green background */
            background-image: url("/vancover/img/regback.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            width: 660px;
            position: relative;
            margin: 0 auto;
        }

        form {
            max-width: 600px;
            height: 800px;
            margin: auto;
            background-color: #ffffff; /* White form background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #336633; /* Dark green text */
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #336633; /* Dark green border */
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        button:hover {
            background-color: #45a049;
        }
        .submit-btn {
            background-color: #008000; /* Darker green for Submit button */
            width: 100%;
        }
        .submit-btn:hover {
            background-color: #006400; /* Darker green on hover for Submit button */
        }
        #deposit {
            color: #336633; /* Dark green text for deposit */
            font-weight: bold;
            margin-top: 10px;
        }

        h2 {
            line-height: 1.66;
            margin: 0;
            padding: 0;
            font-weight: 900;
            color: #222;
            font-family: 'Arial', sans-serif;
            font-size: 24px;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 40px; 
        }

    </style>
</head>
<body>
<div class="container">
<form method="post" action="bookcheck.php">
<h2><strong>Book Now</strong></h2>
  Name: <input type="text" name="name"><br>
  Phone: <input type="text" name="phone"><br>
  Address: <input type="text" name="address"><br>
  Email: <input type="text" name="email"><br>
  Date Period: <input type="date" name="dateperiod"><br>
  Canopy Type: 
  <select name="canopytype" id="canopytype">
      <option value="Arabian Canopy">Arabian Canopy</option>
      <option value="Pyramid Canopy">Pyramid Canopy</option>
      <option value="Transparent Canopy">Transparent Canopy</option>
      <option value="Half Moon Canopy">Half Moon Canopy</option>
      <option value="Marquee Canopy">Marquee Canopy</option>
      <option value="Air Conditioned Canopy">Air Conditioned Canopy</option>
  </select><br>
  Price (RM): <input type="text" id="price" readonly><br>
  Quantity: <input type="number" name="quantity"><br>
  Number of Days: <input type="number" name="numberofdays"><br><br>
  <button type="submit" class="submit-btn">Submit</button>
  <script>
       $(document).ready(function() {
           var prices = {
               "Arabian Canopy": 2000,
               "Pyramid Canopy": 1800,
               "Transparent Canopy": 1300,
               "Half Moon Canopy": 1500,
               "Marquee Canopy": 1500,
               "Air Conditioned Canopy": 3000
           };

           $('#canopytype').change(function() {
                var selectedCanopy = $(this).val();
                console.log('Selected canopy:', selectedCanopy); // Debugging line
                $('#price').val(prices[selectedCanopy]);
                console.log('Updated price:', $('#price').val()); // Debugging line
           });
       });
   </script>
</form><br>
</div>
</body>
</html>
