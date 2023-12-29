<?php
try {
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "businessdb";

    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        throw new Exception("Could not connect: " . mysqli_connect_error());
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Note: You don't need to close the connection explicitly here.
// It will be closed automatically at the end of the script execution.
?>



