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
   
    $email = $_POST['email'];

    
    $sql = "INSERT INTO subscribe (email) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        echo "<script>
                alert('Subscription successful.');
                setTimeout(function() {
                    window.location.href = 'index.php';
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
