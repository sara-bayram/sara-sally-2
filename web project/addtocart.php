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
      
        $product_id = $_POST["product_id"];
        $image = $_POST["image"];
        $price = $_POST["price"];
        $discount = $_POST["discount"];
        $description = $_POST["description"];

  
        $sql = "INSERT INTO cart (product_id, image, price, discount, description) VALUES ('$product_id', '$image', '$price', '$discount', '$description')";

        if ($conn->query($sql) === TRUE) {
            echo "Product added to cart successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>
