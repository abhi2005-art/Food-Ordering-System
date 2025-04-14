<?php

session_start();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $host = "localhost";
    $username = "root"; 
    $dbname = "login"; 

    $con = mysqli_connect($host, $username, "", $dbname); 

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $action = $_POST['submit'];

    if ($action == 'Insert') {
        $sql = "INSERT INTO login (id, email, password) VALUES ('$id', '$email', '$password')";
    } elseif ($action == 'Delete') {
        $sql = "DELETE FROM login WHERE id='$id'";
    }

    if (mysqli_query($con, $sql)) {
        echo "Operation successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
