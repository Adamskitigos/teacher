<!DOCTYPE html>
<html>
<head>
    <title>Adam's page</title>
<link rel="stylesheet" href="project.css">
</head>
<body>
<div class="container">
    <div class="box form-box">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <header class="login-font">Login Here</header>
    <img class="background-image" src="http://ensat.ac.ma/Portail/wp-content/uploads/2021/07/YSR_2991-1024x683.jpg" alt="" class="wp-image-3406" srcset="http://ensat.ac.ma/Portail/wp-content/uploads/2021/07/YSR_2991-1024x683.jpg 1024w, http://ensat.ac.ma/Portail/wp-content/uploads/2021/07/YSR_2991-300x200.jpg 300w, http://ensat.ac.ma/Portail/wp-content/uploads/2021/07/YSR_2991-768x512.jpg 768w, http://ensat.ac.ma/Portail/wp-content/uploads/2021/07/YSR_2991-360x240.jpg 360w" sizes="(max-width: 1024px) 100vw, 1024px">
        <div class="field input">
            <label for="username">Username:</label>
            <input type="text" placeholder="Full name" id="username" name="username" required><br>
        </div>
        <div class="field input">
            <label for="email">Email:</label>
            <input type="text" placeholder="Email" id="Email" name="email" required><br>
        </div>
        <div class="field input">
            <label for="password">Password:</label>
            <input type="password" placeholder="Password" id="password" name="password" required><br>
        </div>
        <div class="field" >
        <input class="btn" type="submit" name="login" value="Log In">
        </div>
        <p class="signup-returntoline">Don't have an account?</p>
        <a style="text-decoration:none;" class="field" href="signup.php">Sign Up</a>
        </form>
        </div>
        </div>
    

        <?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM student WHERE user='$username' AND email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verify hashed password
        if (password_verify($password, $row['password'])) {
            header("Location: project.php");
            exit(); // Ensure script stops execution after redirection
        } else {
            $error_message = "Invalid password";
        }
    } else {
        $error_message = "Invalid username or email";
    }

    // Display error message
    echo '<div class="error-message">' . $error_message . '</div>';
}

mysqli_close($conn);
?>


</body>
</html>
