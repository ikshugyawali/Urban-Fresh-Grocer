<?php
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
      <li class="header-account">
        <div aria-expanded="true">
          <div class="header-btns-icon">
            <i class="fa fa-user-o"></i>
          </div>
          <strong class="text-uppercase" style="vertical-align:-10px;"><?php
          if(strtoupper($userrow['USER_ROLE'])=="CUSTOMER"){?>
                  <a href="../customer/CustomerProfile.php"><?php echo $userrow['FIRST_NAME']; ?></a> 
          <?php
          }
          if(strtoupper($userrow['USER_ROLE'])=="TRADER"){?>
                  <a href="../customer/CustomerProfile.php"><?php echo $userrow['FIRST_NAME']; ?></a> 
          <?php
          }?>
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
    <br>
    </div>
    <!--end-top -->

    <!-- nav-->
    <div id="navigation">
        <!-- container-->
        <div class="container">
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
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
