<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

 
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
 
  <link rel="stylesheet" href="./css/styles.css" />
  <title>ecommerce Website</title>
</head>
<body>
  
    <header class="header" id="header">
     
      <div class="top-nav">
        <div class="container d-flex">
          <p>Order Online Or Call Us: (961) 77-777 777</p>
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
        <a href="/" class="logo"><h1>Dans</h1></a>

          <ul class="nav-list d-flex">
            <li class="nav-item">
              <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="product.php" class="nav-link">Shop</a>
            </li>
            <li class="nav-item">
              <a href="#footer" class="nav-link" onclick="scrollToFooter()">About</a>
            </li>
            <li class="nav-item">
              <a href="#contact" class="nav-link" onclick="scrollToFooter()">Contact</a>
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
            <a href="cart.html" class="icon">
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

    <div class="hero">
      <div class="glide" id="glide_1">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide">
              <div class="center">
                <div class="left">
                  <span class="">New Inspiration 2020</span>
                  <h1 class="">NEW COLLECTION!</h1>
                  <p>Trending from men's and women's  style collection</p>
                  <a href="#" class="hero-btn">SHOP NOW</a>
                </div>
                <div class="right">
                    <img class="img1" src="./images/hero-1.png" alt="">
                </div>
              </div>
            </li>
            <li class="glide__slide">
              <div class="center">
                <div class="left">
                  <span>New Inspiration 2020</span>
                  <h1>THE PERFECT MATCH!</h1>
                  <p>Trending from men's and women's  style collection</p>
                  <a href="#" class="hero-btn">SHOP NOW</a>
                </div>
                <div class="right">
                  <img class="img2" src="./images/hero-2.png" alt="">
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </header>

    <section class="section category">
      <div class="cat-center">
        <div class="cat">
          <img src="./images/cat3.jpg" alt="" />
          <div>
            <p>WOMEN'S WEAR</p>
          </div>
        </div>
        <div class="cat">
          <img src="./images/cat2.jpg" alt="" />
          <div>
            <p>ACCESSORIES</p>
          </div>
        </div>
        <div class="cat">
          <img src="./images/cat1.jpg" alt="" />
          <div>
            <p>MEN'S WEAR</p>
          </div>
        </div>
      </div>
    </section>

  
    <section class="section new-arrival">
      <div class="title">
        <h1>NEW ARRIVALS</h1>
        <p>All the latest picked from designer of our store</p>
      </div>

      <div class="product-center">
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
        echo '        <li><i class="bx bx-heart wish-icon" data-product-id="' . $row["id"] . '" data-image="' . $row["image"] . '" data-discount="' . $row["discount"] . '" data-description="' . $row["description"] . '" data-price="' . $row["price"] . '" data-name="' . $row["name"] . '"></i></li>';
        echo '        <li id="cart4"><i class="bx bx-cart"></i></li>';
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




    <section class="section banner">
<div class="left">
  <span class="trend">Trend Design</span>
  <h1>New Collection 2021</h1>
  <p>New Arrival <span class="color">Sale 50% OFF</span> Limited Time Offer</p>
  <a href="#" class="btn btn-1">Discover Now</a>
</div>
<div class="right">
  <img src="./images/banner.png" alt="">
</div>
    </section>




 
  
    <section class="section new-arrival">
      <div class="title">
        <h1>Featured</h1>
        <p>All the latest picked from designer of our store</p>
      </div>

      <div class="product-center">
        <div class="product-item">
          <div class="overlay">
            <a href="" class="product-thumb">
              <img src="./images/product-7.jpg" alt="" />
            </a>
            <span class="discount">10%</span>
          </div>
          <div class="product-info">
            <span>MEN'S CLOTHES</span>
            <a href="">shirt</a>
            <h4>$40</h4>
          </div>
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
        </div>
        <div class="product-item">
          <div class="overlay">
            <a href="" class="product-thumb">
              <img src="./images/product-4.jpg" alt="" />
            </a>
          </div>

          <div class="product-info">
          <span class="discount">50%</span>
            <span>MEN'S CLOTHES</span>
            <a href="">Hoodie</a>
            <h4>$250</h4>
          </div>
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
        </div>
        <div class="product-item">
          <div class="overlay">
            <a href="" class="product-thumb">
              <img src="./images/product-1.jpg" alt="" />
            </a>
            <span class="discount">30%</span>
          </div>
          <div class="product-info">
            <span>WOMEN'S CLOTHES</span>
            <a href="">shirt</a>
            <h4>$100</h4>
          </div>
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
        </div>
        <div class="product-item">
          <div class="overlay">
            <a href="" class="product-thumb">
              <img src="./images/product-6.jpg" alt="" />
            </a> <span class="discount">20%</span>
          </div>
          <div class="product-info">
            <span>MEN'S CLOTHES</span>
            <a href="">shirt</a>
            <h4>$60</h4>
          </div>
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
        </div>

    </section>

 
    <section class="section contact">
      <div class="row">
        <div class="col">
          <h2>EXCELLENT SUPPORT</h2>
          <p>We love our customers and they can reach us any time
          of day we will be at your service 24/7</p>
          <a href="" class="btn btn-1">Contact</a>
        </div>
        <div class="col">
          <form action="contactus.php" method="POST" class="contact-form">
            <div>
                <input type="email" name="email" placeholder="Email Address" required>
                <button type="submit">Send</button>
            </div>
            <div>
                <textarea id="description" name="description" placeholder="Enter your description" rows="8" required></textarea>
            </div>
        </form>
        </div>
      </div>
    </section>

  
    <footer class="footer" >
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
        <div class="col d-flex" id="footer">
          <span><i class='bx bxl-facebook-square'></i></span>
          <span><i class='bx bxl-instagram-alt' ></i></span>
          <span><i class='bx bxl-github' ></i></span>
          <span><i class='bx bxl-twitter' ></i></span>
          <span><i class='bx bxl-pinterest' ></i></span>
        </div>
      </div>
    </footer>


 
  <div class="popup hide-popup">
    <div class="popup-content">
      <div class="popup-close">
        <i class='bx bx-x'></i>
      </div>
      <div class="popup-left">
        <div class="popup-img-container">
          <img class="popup-img" src="./images/popup.jpg" alt="popup">
        </div>
      </div>
      <div class="popup-right">
        <div class="right-content">
          <h1>Get Discount <span>50%</span> Off</h1>
          <p>Sign up to our newsletter and save 30% for you next purchase. No spam, we promise!
          </p>
    <form action="subscribe.php" method="POST">
        <input type="email" name="email" placeholder="Enter your email..." class="popup-form" required>
        <button type="submit" class="subscribe-button">Subscribe</button>
    </form>
        </div>
      </div>
    </div>
  </div>

  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="./js/slider.js"></script>
  <script src="./js/index.js"></script>
  <script>
$(document).ready(function() {
    $("#cart4").click(function() {
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
                alert(response); // You can show a success message here
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Failed to add product to cart. Please try again later.");
            }
        });
    });
});

</script>

<script>

document.addEventListener("DOMContentLoaded", function() {
    var wishIcons = document.querySelectorAll('.wish-icon');
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
<script>
      function scrollToFooter() {
      
        document.getElementById('footer').scrollIntoView({ behavior: 'smooth' });
    }
</script>


</html>
