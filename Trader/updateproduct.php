<?php
    include '../Connection.php';

    
    
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['prodname'];
        $price = $_POST['price'];
        $qty = $_POST['quantity'];
        $prodimg = $_POST['prodimg'];



        $query = "UPDATE PRODUCT SET 
        PRODUCT_NAME='$name',
        PRODUCT_PRICE='$price',
        QUANTITY_PER_PRODUCT='$qty',
        PRODUCT_IMAGE='$prodimg'
        WHERE PRODUCT_ID='$id'
        ";


        
        $detailqry=oci_parse($conn, $query);
        oci_execute($detailqry);
        

    
    }else{
        echo "no inserted";
    }

         header('Location: crud.php');
?>
