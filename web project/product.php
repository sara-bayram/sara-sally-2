<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />

    <link rel="stylesheet" href="./css/styles.css" />
    <title>Boy’s T-Shirt</title>
  </head>

  <body>
 
    <div class="top-nav">
      <div class="container d-flex">
        <p>Order Online Or Call Us: (961) 77-777777</p>
        <ul class="d-flex">
          <li><a href="#">About Us</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
    </div>
    <?php include 'getcount.php'; ?>
    <?php include 'getwishcount.php'; ?>
    <div class="navigation">
      <div class="nav-center container d-flex">
        <a href="index.php" class="logo"><h1>Dans</h1></a>

        <ul class="nav-list d-flex">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="product.php" class="nav-link">Shop</a>
          </li>
          <li class="nav-item">
            <a href="#about" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="#contact" class="nav-link">Contact</a>
          </li>
          <li class="icons d-flex">
            <a href="login.html" class="icon">
              <i class="bx bx-user"></i>
            </a>
            <div class="icon">
              <i class="bx bx-search"></i>
            </div>
            <a href="wishlist.php">
            <div class="icon">
              <i class="bx bx-heart"></i>
              <span class="d-flex"><?php echo $totalRow; ?></span>
            </div>
            <a href="cart.php" class="icon">
              <i class="bx bx-cart"></i>
              <span class="d-flex"><?php echo $totalRows; ?></span>
            </a>
          </li>
        </ul>

        <div class="icons d-flex">
          <a href="login.html" class="icon">
            <i class="bx bx-user"></i>
          </a>
          <div class="icon">
            <i class="bx bx-search"></i>
          </div>
          <a href="wishlist.php">
            <div class="icon">
              <i class="bx bx-heart"></i>
              <span class="d-flex"><?php echo $totalRow; ?></span>
            </div>
          <a href="cart.php" class="icon">
            <i class="bx bx-cart"></i>
            <span class="d-flex"><?php echo $totalRows; ?></span>
          </a>
        </div>

        <div class="hamburger">
          <i class="bx bx-menu-alt-left"></i>
        </div>
      </div>
    </div>

    
    <section class="section all-products" id="products">
      <div class="top container">
        <h1>All Products</h1>
        <form>
          <select>
            <option value="1">Defualt Sorting</option>
            <option value="2">Sort By Price</option>
            <option value="3">Sort By Popularity</option>
            <option value="4">Sort By Sale</option>
            <option value="5">Sort By Rating</option>
          </select>
          <span><i class="bx bx-chevron-down"></i></span>
        </form>
      </div>
      <div class="product-center container">

      <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id, image, discount, price, description, name FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
       
        echo '<div class="product-item">';
        echo '    <div class="overlay">';
        echo '        <a href="productDetails.html" class="product-thumb">';
        echo '            <img src="' . $row["image"] . '" alt="" />';
        echo '        </a>';
        if ($row["discount"] != 0) {
            echo '        <span class="discount">' . $row["discount"] . '%</span>';
        }
        echo '    </div>';
        echo '    <div class="product-info" data-product-id="' . $row["id"] . '" data-product-image="' . $row["image"] . '" data-product-price="' . $row["price"] . '" data-product-discount="' . $row["discount"] . '" data-product-description="' . $row["description"] . '" data-product-name="' . $row["name"] . '">'; // Use 'name' column here
        echo '        <span>' . $row["name"] . '</span>';
        echo '        <a href="productDetails.html">' . $row["description"] . '</a>';
        echo '        <h4>$' . $row["price"] . '</h4>';
        echo '    </div>';
        echo '    <ul class="icons">';
        echo '        <li><i class="bx bx-heart wish-icon1" data-product-id="' . $row["id"] . '" data-image="' . $row["image"] . '" data-discount="' . $row["discount"] . '" data-description="' . $row["description"] . '" data-price="' . $row["price"] . '" data-name="' . $row["name"] . '"></i></li>';
        echo '        <li id="cart1"><i class="bx bx-cart"></i></li>';
        echo '    </ul>';
        echo '</div>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>

      </div>
    </section>
   
    <footer class="footer">
      <div class="row">
        <div class="col d-flex">
          <h4>INFORMATION</h4>
          <a href="">About us</a>
          <a href="">Contact Us</a>
          <a href="">Term & Conditions</a>
          <a href="">Shipping Guide</a>
        </div>
        <div class="col d-flex">
          <h4>USEFUL LINK</h4>
          <a href="">Online Store</a>
          <a href="">Customer Services</a>
          <a href="">Promotion</a>
          <a href="">Top Brands</a>
        </div>
        <div class="col d-flex">
          <span><i class="bx bxl-facebook-square"></i></span>
          <span><i class="bx bxl-instagram-alt"></i></span>
          <span><i class="bx bxl-github"></i></span>
          <span><i class="bx bxl-twitter"></i></span>
          <span><i class="bx bxl-pinterest"></i></span>
        </div>
      </div>
    </footer>
    
    <script src="./js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#cart1").click(function() {
           
            var productItem = $(this).closest(".product-item");
            
          
            var productId = productItem.find(".product-info").data("product-id");
            var productImage = productItem.find(".product-info").data("product-image");
            var productPrice = productItem.find(".product-info").data("product-price");
            var productDiscount = productItem.find(".product-info").data("product-discount");
            var productDescription = productItem.find(".product-info").data("product-description");
            
           
            $.ajax({
                type: "POST",
                url: "addtocart.php",
                data: { 
                    product_id: productId,
                    image: productImage,
                    price: productPrice,
                    discount: productDiscount,
                    description: productDescription
                },
                success: function(response) {
                    alert(response); 
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); 
                }
            });
        });
    });
</script>

<script>

document.addEventListener("DOMContentLoaded", function() {
    var wishIcons = document.querySelectorAll('.wish-icon1');
    wishIcons.forEach(function(icon) {
        icon.addEventListener('click', function() {
            var productInfo = {
                productId: this.getAttribute('data-product-id'),
                imageName: this.getAttribute('data-image'),
                discount: this.getAttribute('data-discount'),
                description: this.getAttribute('data-description'),
                price: this.getAttribute('data-price'),
                name: this.getAttribute('data-name') 
            };

            addToWishlist(productInfo);
        });
    });
});

function addToWishlist(productInfo) {
   
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "addtowish.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                
                alert("Product added to wishlist successfully!");
            } else {
            
                alert("Failed to add product to wishlist. Please try again later.");
            }
        }
    };
    xhr.send(JSON.stringify(productInfo));
}
</script>
  </body>
</html>
