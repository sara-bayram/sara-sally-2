<?php

$data = json_decode(file_get_contents("php://input"), true);


$productId = $data['productId'];
$imageName = $data['imageName'];
$discount = $data['discount'];
$description = $data['description'];
$price = $data['price'];
$name = $data['name']; 


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("INSERT INTO wishlist (product_id, image, discount, description, price, name) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isisss", $productId, $imageName, $discount, $description, $price, $name); 

if ($stmt->execute()) {
    echo "Product added to wishlist successfully";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
