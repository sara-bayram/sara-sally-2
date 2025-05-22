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
    $password = $_POST['psw'];


    $sql = "SELECT password FROM signup WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
       
        if ($password === $row['password']) { 
            echo "<script>
                    alert('Login successful.');
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 100);
                  </script>";
        } else {
            echo "<script>
                    alert('Invalid email or password.');
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 100);
                  </script>";
        }
    } else {
        echo "<script>
                alert('Invalid email or password.');
                setTimeout(function() {
                    window.location.href = 'login.php';
                }, 100);
              </script>";
    }

    $stmt->close();
}

$conn->close();
?>
