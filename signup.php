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
                <header class="Login-font">Sign Up</header>
                <img class="background-image" src="http://ensat.ac.ma/Portail/wp-content/uploads/2021/07/YSR_2991-1024x683.jpg" alt="" class="wp-image-3406" srcset="http://ensat.ac.ma/Portail/wp-content/uploads/2021/07/YSR_2991-1024x683.jpg 1024w, http://ensat.ac.ma/Portail/wp-content/uploads/2021/07/YSR_2991-300x200.jpg 300w, http://ensat.ac.ma/Portail/wp-content/uploads/2021/07/YSR_2991-768x512.jpg 768w, http://ensat.ac.ma/Portail/wp-content/uploads/2021/07/YSR_2991-360x240.jpg 360w" sizes="(max-width: 1024px) 100vw, 1024px">
                <div class="field input">
                    <label for="username">Username:</label>
                    <input type="text" placeholder="Full name" id="username" name="username" required><br>
                </div>
                <div class="field input">
                    <label for="email">Email:</label>
                    <input type="email" placeholder="Email" id="email" name="email" required><br>
                </div>
                <div class="field input">
                    <label for="password">Password:</label>
                    <input type="password" placeholder="Password" id="password" name="password" required><br>
                </div>
                <div class="field input">
                    <label for="confirm_password">Confirm password:</label>
                    <input type="password" placeholder="Confirm password" id="confirm_password" name="confirm_password" required><br>
                </div>
                <div class="btn-container">
                    <input class="btn" type="submit" name="signup" value="Sign Up"><br>
                    <?php
                    if (isset($error_message)) {
                        echo '<div class="error-message">' . $error_message . '</div>';
                    }
                    ?>
                </div>
                <p class="signup-returntoline">Already have an account?</p>
            <a style="text-decoration:none;" class="field" href="http://localhost/ensat/index.php">Log In</a>
            </form>
        </div>
    </div>
    </form>
    
    <?php
include("database.php");

// Initialize $result and $registration_successful variables
$result = null;
$registration_successful = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email=$_POST['email'];
    $confirmpassword = $_POST['confirm_password'];

    // Check if passwords match
    if ($confirmpassword !== $password) {
        $error_message = "Password and Confirm Password do not match.";
    } else {
        // Assuming there is an 'ID' column in your database, use NULL for auto-increment
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO student (ID, password, user,email) VALUES (NULL, '$hash', '$username','$email')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: index.php");
            exit(); // Ensure script stops execution after redirection
        } else {
            $error_message = "Error: " . mysqli_error($conn);
        }
    }

    // Display error message if there is one
    if (isset($error_message)) {
        echo '<div class="error-message">' . $error_message . '</div>';
    }
}

// Display success message if registration was successful

mysqli_close($conn);
?>

</body>
</html>


