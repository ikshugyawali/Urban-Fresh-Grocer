<?php
  // session_start();
  $user_check=$_SESSION['email'];
  $userquery="SELECT * FROM ALL_USER WHERE EMAIL='$user_check'";
  $usersql=oci_parse($conn,$userquery);
  oci_execute($usersql);
  $userrow=oci_fetch_array($usersql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    
    <!--ext css-->
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
    <div class="pull-left">
        <!-- Logo -->
        <div class="header-logo">
          <a class="logo" href="index.php">
            <img src="images/UFGFinal.png" alt="ufg-logo">
          </a>
        </div>
    </div>
    <!-- end-Logo -->

    <!-- start-nav -->

    <div class="container">
        <div class="searchbar">
            <form class="search" action="/action_page.php">
            <input type="text" placeholder="" name="search">
            <button type="submit">Search</button>
        </form>
    </div>
    <div class="pull-right">
    <ul class="header-btns">
      <!-- Account -->
      <!-- Account -->
      <li class="header-account">
        <div aria-expanded="true">
          <div class="header-btns-icon">
            <i class="fa fa-user-o"></i>
          </div>
          <strong class="text-uppercase" style="vertical-align:-10px;"><?php
          if(strtoupper($userrow['USER_ROLE'])=="CUSTOMER"){?>
                <a href="../customer/CustomerProfile.php" ><?php echo $userrow['FIRST_NAME'];?></a>
          <?php
          }
          if(strtoupper($userrow['USER_ROLE'])=="TRADER"){?>
                <a href="cart.php" ><?php echo $userrow['FIRST_NAME'];?></a>
          <?php
          }
          ?>
          <a href="../logout.php">Logout</a>
          </strong>
        </div>
        
      </li>
      <!-- /Account -->     
      <!-- Cart -->
      <li class="header-cart dropdown default-dropdown">
        <a href="cart.php">
          <div class="header-btns-icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <strong class="text-uppercase" style="vertical-align:-10px;">My Cart :  <?php
          if (isset($_SESSION['cart'])){
              $count = count($_SESSION['cart']);
              echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
            }else{
                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
            }

?></strong>
          </a></li>
      <!-- /Cart -->

      </ul>
    </div>
    </div>
    <!--end-top -->

    <!-- nav-->
    <div id="navigation">
        <!-- container-->
        <div class="container"><br>
          <div id="responsive-nav">
            <!-- category nav -->
            <div class="category-nav show-on-click">
              <span class="category-header">Categories <i class="fa fa-list"></i></span>
              <ul class="category-list">
                <li><a href="#">Fruits & Vegetables</a></li>
                <li class="g"><a href="#">Bakery</a></li>
                <li ><a href="#">Fish & Seafood</a></li>
                <li class="g"><a href="#">Meat</a></li>
                <li><a href="#">Delicatessen</a></li>
                <li class="g"><a href="#">View All products</a></li>
              </ul>
            </div>
            <!-- /category nav -->
    
            <!-- menu nav -->
            <div class="menu-nav">
              <ul class="menu-list">
                <li><a href="#"><b>Traders</b></a></li>
                <li><a href="#"><b>More</b></a></li>
            </div>
          </div>
        </div>
      </div>
      <!-- end-nav-->

      <!--slideshow-->
      <div class="container">
  <div class="slidercontents">
    
    <div class="mySlides ">
        <div class="numbertext">Bakery</div>
        <img src="images/bakery-shop.jpg" style="width:100%">
        <div class="text">Shop Now
        </div>
      </div>
      <div class="mySlides ">
          <div class="numbertext">Greengrocer</div>
          <img src="images/green-shop.jpg" style="width:100%">
          <div class="text">Shop Now
          </div>
        </div>
        <div class="mySlides ">
            <div class="numbertext">Fishmonger</div>
            <img src="images/fish-shop.jpg" style="width:100%">
            <div class="text">Shop Now
            </div>
          </div>
          <div class="mySlides ">
              <div class="numbertext">Butcher</div>
              <img src="images/butcher-shop.jpg" style="width:100%">
              <div class="text">Shop Now
              </div>
            </div>
          <div class="mySlides ">
              <div class="numbertext">Delicatseen</div>
              <img src="images/deli-shop.jpg" style="width:100%">
              <div class="text">Shop Now
              </div>
            </div>

    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
    <span class="dot" onclick="currentSlide(4)"></span>
    <span class="dot" onclick="currentSlide(5)"></span>
  </div> 
</div>
<!-- end-slideshow-->

<!--shops-->
<div class="shopintro">
    <h1 >Our Traders</h1>
    <div class="container-fluid">
			<div class="col-md-2" >
				<div class="shopbox">
					<h5 class="boxname"> My Bakery</h5>
					<p class="addressdet"><a href="trader"> Visit Profile</a>
					</p>
				</div>
			</div>
			<div class="col-md-2" >
				<div class="shopbox">
					<h5 class="boxname"> My Bakery</h5>
					<p class="addressdet"> <a href="trader"> Visit Profile</a>
					</p>
				</div>
			</div>
			<div class="col-md-2" >
				<div class="shopbox">
					<h5 class="boxname"> My Bakery</h5>
					<p class="addressdet"> <a href="trader"> Visit Profile</a>
					</p>
				</div>
			</div>
			<div class="col-md-2" >
				<div class="shopbox">
					<h5 class="boxname"> My Bakery</h5>
					<p class="addressdet"><a href="trader"> Visit Profile</a>
					</p>
				</div>
			</div>
			<div class="col-md-2" >
				<div class="shopbox">
					<h5 class="boxname"> My Bakery</h5>
					<p class="addressdet"> <a href="trader"> Visit Profile</a>
					</p>
				</div>
            </div>

		</div>

    </div>
    <!--end-shop-->
    <h1> OUR PRODUCTS </h1>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>