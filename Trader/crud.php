
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="head">
  <div class="col-div-6">

<span style="font-size:30px;cursor:pointer; color: black;" class="nav"> My Products</span>
</div>


<div class="clearfix"></div>
</div>
</div>
    <?php
    include '../connection.php';
    
    
    $query="SELECT * FROM PRODUCT";
    $detailqry = oci_parse($conn, $query);  
    oci_execute($detailqry);
    $products = array();
    $row=0;
    while($row = oci_fetch_array($detailqry)){
    array_push($products, $row);
    $row++;
    }
    foreach($products as $product){
    $productId = $product['PRODUCT_ID'];
    $productName = $product['PRODUCT_NAME'];
    $price = $product['PRODUCT_PRICE'];
    $quantity = $product['QUANTITY_PER_PRODUCT'];
    $prodimg = $product['PRODUCT_IMAGE'];?>
    <?php  include 'trader-nav.php' ?>
    <div id="main">


    <img src='images/<?php echo $prodimg; ?>' style='width:150px;heigth:150px;padding'>
    <div>Product Name:<?php echo $productName; ?></div>
    <div>Product Price:<?php echo $price; ?></div>
    <div>Product Quantity:<?php echo $quantity; ?></div>
    <div><?php 
             echo "<a href='update.php?id=$product[PRODUCT_ID]'>update</a>
             <a href='delete.php?id=$product[PRODUCT_ID]'>delete</a>";
    
    
    ?> 
    

      
        
   
    <?php
    }
    ?>
    



</body>
</html>