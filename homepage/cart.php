<?php

session_start();
require_once ("../Connection.php");
include ('component.php');
$user_check=$_SESSION['email'];
  $userquery="SELECT * FROM ALL_USER WHERE EMAIL='$user_check'";
  $usersql=oci_parse($conn,$userquery);
  oci_execute($usersql);
  $userrow=oci_fetch_array($usersql);


if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}

$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; 
//Test PayPal API URL
$paypal_email = 'sb-9vvhe6756281@business.example.com';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

<?php
    require_once ('topnav.php');
?>

<div class="shopping-cart">
<div class="container-fluid">
            
                <h1>My Shopping Cart</h1>
                <hr>

                <?php
                    
                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');
                        $query="SELECT * FROM PRODUCT";
                        $detailqry = oci_parse($conn, $query);  
                        oci_execute($detailqry);
                        while ($row = oci_fetch_assoc($detailqry)){
                            foreach ($product_id as $id){
                                if ($row['PRODUCT_ID'] == $id){
                                    cartElement($row['PRODUCT_IMAGE'], $row['PRODUCT_NAME'],$row['PRODUCT_PRICE'], $row['PRODUCT_ID']);
                                    $total = $total + (int)$row['PRODUCT_PRICE'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>
                <hr>
                </div>
</div>

        

            <div class="summary">
                
                <h5><strong>PRICE DETAILS</strong>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="free">FREE</h6>
                        <hr>
                        <h6>$<?php
                            echo $total;
                            ?></h6>
                         
                    </div>
                </div>
            </div>
            <form action="<?php echo $paypal_url; ?>" method="post">
            <input type="hidden" name="business" value="<?php echo $paypal_email; ?>">
            <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="amount" value=<?php echo $total ?>>
				<input type="hidden" name="currency_code" value="GBP">	   
            <input type='hidden' name='cancel_return' value='http://localhost/pm%20codes/cancel.php'>
			<input type='hidden' name='return' value='http://localhost/pm%20codes/sucess.php'>						
			<!-- payment button. -->
			<input type="image" name="submit" border="0"
			src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
			<img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >    
			</form>

<?php require_once ("foot.php");?>
</body>
</html>
