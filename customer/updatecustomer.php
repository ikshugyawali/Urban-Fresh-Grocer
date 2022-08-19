<?php
    include '../Connection.php';
    session_start();

    if(isset($_POST['save'])){
        $uid=$_SESSION['USER_ID'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $address=$_POST['address'];
        $mobile=$_POST['mobile'];
        $gender=$_POST['gender'];
        $dob=date('d-m-Y', strtotime($_POST['dob']));
        
        
        $query = "UPDATE ALL_USER SET 
        FIRST_NAME='$fname',
        LAST_NAME='$lname',
        EMAIL='$email',
        ADDRESS='$address',
        MOBILE_NUMBER='$mobile',
        PASSWORD='$password',
        BIRTH_DATE=to_date(:dob, 'DD/MM/YYYY'),
        GENDER='$gender'
        WHERE USER_ID='$uid'
        ";

        $detailqry = oci_parse($conn, $query);  
        oci_bind_by_name($detailqry, ":dob",$dob);
        

        oci_execute($detailqry);

        
    }else{
        echo "no inserted";
    }
        header('location:CustomerProfile.php');

?>
 