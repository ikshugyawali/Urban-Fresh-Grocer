<?php
    include ('../Connection.php');
    session_start();
    $pid=$_SESSION['PRODUCT_ID'];
    // echo $pid;
    if(isset($_GET['id']) && isset($_POST['checkout'])){
        $query="SELECT * FROM PRODUCT WHERE PRODUCT_ID=".$_GET['id'];
        $detailqry = oci_parse($conn, $query);  
         oci_execute($detailqry);

        $row = oci_fetch_array($detailqry);
        echo $pid;
    }
?>