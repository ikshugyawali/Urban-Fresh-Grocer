<?php
  include '../Connection.php';
  

  $prodname=$stock=$Proddetail=$proddesc=$prodimg=$prodprice=$allgery=$quantity="";
  if(isset($_POST['submit'])){
		$prodname= $_POST['PRODUCT_NAME'];
		$stock = $_POST['STOCK_AVAILABLE'];
		$Proddetail = $_POST['PRODUCT_DETAILS'];
		$proddesc = $_POST['PRODUCT_DESCRIPTION'];
		$prodimg = $_POST['PRODUCT_IMAGE'];
		$prodprice = $_POST['PRODUCT_PRICE'];
    $allegry = $_POST['ALLERGY_INFORMATION'];
    $quantity = $_POST['QUANTITY_PER_PRODUCT'];

    	
    $sql = "INSERT INTO PRODUCT(PRODUCT_ID,PRODUCT_NAME,STOCK_AVAILABLE,PRODUCT_DETAILS,PRODUCT_DESCRIPTION,PRODUCT_IMAGE,PRODUCT_PRICE,ALLERGY_INFORMATION,QUANTITY_PER_PRODUCT)
            VALUES (seq_product.nextval,'$prodname','$stock,'$Proddetail','$proddesc','$prodimg','$prodprice','$allegry','$quantity')";
      
    $result = oci_parse($conn,$sql);			
    oci_execute($result);
    if(oci_error()){
      echo "failed";
    }
    else{
      echo "data  inserted";
    }
  }
  
  ?>
  <?php  
  // include 'trader-nav.php'; 
  ?>
<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
<div id="main">

<div class="head">
  <div class="col-div-6">

<span style="font-size:30px;cursor:pointer; color: black;" class="nav"> Add New Product</span>
</div>


<div class="clearfix"></div>
</div>


<div class="content-box">
  <h3 style="margin-left: 30px;">Enter Your Details</h3>
  <form method="POST">
  <fieldset style="border: none;">
                <label for="name"  style="font-weight: bolder; margin-top: 0px;">Product Name:     </label>
                    <input class="input-field" type="text"  name="PRODUCT_NAME" style="width: 34%; height: 24px; border: none; box-shadow: 2px 2px 2px 2px #C4C4C4;"><br><br>
                
                
                <label for="PRODUCT_DESCRIPTION"  style="font-weight: bolder; margin-top: 0px;">Stock Available: </label>
                    <input class="input-field" type="text"  name="STOCK_AVAILABLE" style="width: 34%; height: 24px; border: none; box-shadow: 2px 2px 2px 2px #C4C4C4;"><br><br>
                
                
                <label for="PRODUCT_DETAILS"  style="font-weight: bolder; margin-top: 0px;">Porduct Details: </label>
                    <input class="input-field" type="text"  name="PRODUCT_DETAILS" style="width: 34%; height: 24px; border: none; box-shadow: 2px 2px 2px 2px #C4C4C4;"><br><br>
                
                
                <label for="PRODUCT_DESCRIPTION"  style="font-weight: bolder; margin-top: 0px;">Product Descreption: </label>
                    <input class="input-field" type="text"  name="PRODUCT_DESCRIPTION" style="width: 34%; height: 24px; border: none; box-shadow: 2px 2px 2px 2px #C4C4C4;"><br><br>
                
                
                <label for="PRODUCT_IMAGE"  style="font-weight: bolder; margin-top: 0px;">Product Image: </label>
                    <input class="input-field" type="text"  name="PRODUCT_IMAGE" style="width: 34%; height: 24px; border: none; box-shadow: 2px 2px 2px 2px #C4C4C4;"><br><br>
                
                
                <label for="PRODUCT_PRICE"  style="font-weight: bolder; margin-top: 0px;">Product Price: </label>
                    <input class="input-field" type="text"  name="PRODUCT_PRICE" style="width: 34%; height: 24px; border: none; box-shadow: 2px 2px 2px 2px #C4C4C4;"><br><br>
                
                
                <label for="ALLERGY_INFORMATION"  style="font-weight: bolder; margin-top: 0px;">Allergy Information: </label>
                    <input class="input-field" type="text"  name="ALLERGY_INFORMATION" style="width: 34%; height: 24px; border: none; box-shadow: 2px 2px 2px 2px #C4C4C4;"><br><br>
                
                
                <label for="QUANTITY_PER_PRODUCT"  style="font-weight: bolder; margin-top: 0px;">Product Quantity: </label>
                    <input class="input-field" type="number"  name="QUANTITY_PER_PRODUCT" style="width: 34%; height: 24px; border: none; box-shadow: 2px 2px 2px 2px #C4C4C4;"><br><br>
                
                <input type="submit" name="submit" style="background-color: #168E16; color: white; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);border: none; font-size: 20px; border-radius: 12px;"/>

<input type="reset" value="Clear" style="background-color: #D03817; color: white; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);border: none; font-size: 20px; border-radius: 12px;"/> <br/>

</fieldset>
</form>
</div>