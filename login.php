<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/vancover/img/favicon-vc.ico" rel="icon">
    <link href="/vancover/img/apple-touch-icon-vc.png" rel="apple-touch-icon">

    <!-- Font Icon -->
    <link rel="stylesheet" href="/vancover/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/vancover/css/register.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <div class="signup-content">
            <form action="logcheck.php" method="post">
                <h2>Sign In</h2>
                <div class="form-group">
                    <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-input" id="password" name="password" placeholder="Password" required>
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                </div>
                <div class="form-group">
                    <input type="submit" name="login" id="submit" class="form-submit" value="Login"/>
                </div>
                <script>
                    const togglePassword = document.querySelector("#togglePassword");
                    const password = document.querySelector("#password");

                    togglePassword.addEventListener("click", function () {
                    // toggle the type attribute
                        const type = password.getAttribute("type") === "password" ? "text" : "password";
                        password.setAttribute("type", type);
       
                    // toggle the icon
                        this.classList.toggle("bi-eye");
                    });
                </script>
            </form>
            <p>No Account . <a href="register.php" class="loginhere-link">Register Now</a></p>
        </div>
    </div>
</body>
</html>