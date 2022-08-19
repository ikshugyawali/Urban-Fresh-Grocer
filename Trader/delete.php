<?php
   include '../Connection.php';

   if(isset($_GET['id'])){
    
    $query = "DELETE FROM PRODUCT WHERE PRODUCT_ID=".$_GET['id']; 
    $detailqry = oci_parse($conn, $query);  
    oci_execute($detailqry);
    echo oci_num_rows($detailqry);
    if (oci_num_rows($detailqry) > 0) {

     //If yes , return to calling page(stored in the server variables) 
     header("Location: {$_SERVER['HTTP_REFERER']}"); 
     } else {
     // print error message
     echo "Error in query: $query. " . oci_error($conn);
    //  exit ;
     }
 }
    
    
        
?>