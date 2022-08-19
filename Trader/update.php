<?php
include '../Connection.php';

if(isset($_GET['id'])){
    $query="SELECT * FROM PRODUCT WHERE PRODUCT_ID=".$_GET['id'];
    $detailqry = oci_parse($conn, $query);  
    oci_execute($detailqry);

    $row = oci_fetch_array($detailqry);
    
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="updateproduct.php" method="POST">
            <fieldset>
                <legend>Edit Product Details</legend>
                <label for="prodimg">Product Image: </label>
                <input type="text" name="prodimg" value="<?php echo $row['PRODUCT_IMAGE'] ?>"></br>
                <label for="txtProductName">Product Name: </label>
                <input type="text" name="prodname" value="<?php echo $row['PRODUCT_NAME'] ?>"></br>
                <label for="price">Price: </label>
                <input type="text" name="price" value="<?php echo $row['PRODUCT_PRICE'] ; ?>"></br>
                <label for="txtProductImageName">Qunatity:</label>
                <input type="text" name="quantity" value="<?php echo $row['QUANTITY_PER_PRODUCT'] ; ?>"></br>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
                <input type= "submit" value="Submit" name='submit'>
                <input type="reset" value="Clear"> 
            </fieldset>
        </form>
</body>
</html>

