<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "user_management");
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE name = '$name' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Name or Email has already taken'); </script>";
    } else {
        $query = "INSERT INTO users VALUES('', '$name', '$phone', '$email', '$password')";
        mysqli_query($conn, $query);
        echo "<script> alert('Registration succefully'); </script>";
        header("Location: login.php");
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Website</title>
</head>

<body>
    <div class="center">
        <h1>Registration</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="name" required>
                <span></span>
                <label>Name</label>
            </div>
            <div class="txt_field">
                <input type="text" name="phone" required>
                <span></span>
                <label>Phone</label>
            </div>
            <div class="txt_field">
                <input type="text" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" name="submit" value="Create account">
            <div class="signup_link">
                Already have an account? <a href="login.php">Sign In</a>
            </div>
        </form>
    </div>
</body>

</html>