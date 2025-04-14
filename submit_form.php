<?php
$servername = "localhost"; 
$username = "root";     
$password = "";         
$dbname = "freshfare";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));


    if (!empty($name) && !empty($email) && !empty($phone) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/^[0-9]{10}$/', $phone)) {

            $stmt = $conn->prepare("INSERT INTO contact_details (name, email, phone, message) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $phone, $message);


            if ($stmt->execute()) {
                echo "Thank you! Your information has been submitted.";
            } else {
                echo "Error: " . $stmt->error;
            }

            
            $stmt->close();
        } else {
            echo "Invalid email or phone number format.";
        }
    } else {
        echo "All fields are required.";
    }
}


$conn->close();
?>
