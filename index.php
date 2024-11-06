<?php


?>



<!-- HTML code start here  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor</title>
    <link rel="stylesheet" href="assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="bg-gradient">
    <div class="container text-muted blockquote text-center mb-1">
        <h1>Welcome to Blood Bank Donor Page.</h1>
        <h2>  Log in For more details</h2>
    </div>
    <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-2 shadow-md" style="width: 20rem;">
            <h4>Login here</h4>
            <form action="./actions/php/login.php" method="post">
                <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
                <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn btn-dark w-100">Login</button>
            </form>
            <p class="mt-3">Don't have an account yet? <a href="./assets/html/signup_form.html">Sign up here!</a></p>
        </div>
    </div>

    <script src="assets/javascript/jquery-2.2.3.min.js"></script>  
    <script src="assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/javascript/script.js"></script>
</body>
</html>
