<?php

session_start();
require_once ('../Connection.php');
include ('component.php');

        $query="SELECT * FROM PRODUCT";
		$detailqry = oci_parse($conn, $query);  
		oci_execute($detailqry);
        $products=array();
        while($row=oci_fetch_array($detailqry)){
            array_push($products, $row);
        }
        // $productid=$row['PRODUCT_ID'];
        // $productname=$row['PRODUCT_NAME'];
        // $productimg=$row['PRODUCT_IMAGE'];
        // $productprice=$row['PRODUCT_PRICE'];
        // $productdesc=$row['PRODUCT_DESCRIPTION'];

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>


<?php require_once ("nav.php");?>

<div class="container">
        <div class="row text-center py-5">
            <?php 
            foreach($products as $product){
                $productid = $product['PRODUCT_ID'];
                $productname = $product['PRODUCT_NAME'];
                $productprice = $product['PRODUCT_PRICE'];
                $productdesc = $product['PRODUCT_DESCRIPTION'];
                $productimg = $product['PRODUCT_IMAGE'];
                
                component($productname, $productprice, $productimg,$productid,$productdesc);
            }
            ?>
        </div>
</div>
<br><br>





<?php require_once ("foot.php");?>
</body>
</html>
