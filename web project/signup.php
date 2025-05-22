<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $passwordRepeat = $_POST['psw-repeat'];

   
    if ($password !== $passwordRepeat) {
        echo "<script>
                alert('Passwords do not match.');
                setTimeout(function() {
                    window.history.back();
                }, 100);
              </script>";
        exit();
    }

  
    $checkEmailSql = "SELECT email FROM signup WHERE email = ?";
    $stmt = $conn->prepare($checkEmailSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>
                alert('Email already exists.');
                setTimeout(function() {
                    window.history.back();
                }, 100);
              </script>";
        $stmt->close();
        $conn->close();
        exit();
    }
    $stmt->close();

   
    $insertSql = "INSERT INTO signup (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "<script>
                alert('Sign up successful.');
                setTimeout(function() {
                    window.location.href = 'login.php';
                }, 100);
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $conn->error . "');
                setTimeout(function() {
                    window.history.back();
                }, 100);
              </script>";
    }

    $stmt->close();
}

$conn->close();
?>
