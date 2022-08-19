<?php

  include '../Connection.php';

  session_start();
	$user_check=$_SESSION['email'];
    $userquery="SELECT * FROM ALL_USER WHERE EMAIL='$user_check'";
    $usersql=oci_parse($conn,$userquery);
    oci_execute($usersql);
    $userrow=oci_fetch_array($usersql);

    $fname=$userrow['FIRST_NAME'];
    $lname=$userrow['LAST_NAME'];
    $email=$userrow['EMAIL'];
    $address=$userrow['ADDRESS'];
    $mobile=$userrow['MOBILE_NUMBER'];
    $pass=$userrow['PASSWORD'];
    $gender=$userrow['GENDER'];
    $dob=$userrow['BIRTH_DATE'];
    $_SESSION['USER_ID'] =$userrow['USER_ID'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mywishlist.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

<body>
    <div id="wrap">
    <div class="container">
        <div class="header">
            <div class="item item1">
                <img src="settings.png" alt="" width=80 height="70" style="margin-left: 50px; margin-top: -10px;">
                <span style="position:relative;top:-15px;font-size:30px;"> Profile Settings</span>

            </div>
        </div>
        <h2 style="padding-top: 50px; margin-left: 30px;">Edit Your Profile</h2>
 <form action="updatecustomer.php" method="POST">
      <div class="form-content">
          <div class="input-boxes">
            <div class="input-box">
              <p style="font-weight: bolder;">First Name</p>
              <input type="text" name="fname" placeholder="Please enter your full name" required style="margin-top: 10px;" value="<?php echo $fname  ?>">
             
            </div>
            <div class="input-box">
            <p style="font-weight: bolder;">Last Name</p>
              <input type="text" name="lname" placeholder="Please enter your full name" required style="margin-top: 10px;" value="<?php echo $lname  ?>">
              </div>
            <div class="input-box">
              <p style="font-weight: bolder;">Mobile Number</p>
              <input type="number" name="mobile" placeholder="Please enter your mobile number" required style="margin-top: 10px;" value="<?php echo $mobile  ?>">
            </div>
           
          
            
        </div>
      
         
            <div class="input-box">
             <p style="font-weight: bolder;">Email ID</p>
              <input type="text" name="email" placeholder="Please enter your email address" required style="margin-top: 10px;" value="<?php echo $email ?>">
            </div>
            <div class="input-box">
             <p style="font-weight: bolder;">Address</p>
              <input type="text" name="address" placeholder="Please add your address" required style="margin-top: 10px;" value="<?php echo $address  ?>">
            </div>
            <div class="input-box">
              <p style="font-weight: bolder;">Password</p>
              <input type="text" name="password" placeholder="Please enter a new password" required style="margin-top: 10px;" value="<?php echo $pass  ?>">
    </div>
    
     <div class="gender" style="margin-top: 44px; margin-left: 26px; ">
        <p style="font-weight: bolder;">Gender</p>
            <label for="gender"></label>
<select name="gender" style="background-color: #F0EFEF; margin-top: 10px; border: none;" value="<?php echo $gender ?>">
    <option value="male" <?php if($gender=="Male"){echo "selected";}?>>Male</option>
    <option value="female" <?php if($gender=="Female"){echo "selected";}?>>Female</option>
    <option value="other" <?php if($gender=="Other"){echo "selected";}?>>Other</option>
</select>
</div>

<div class="birthday" style="margin-left: 500px; margin-top: -44px;">
<p style="font-weight: bolder;">Birthday</p>
    <label for="birthday"></label>
  <input type="date" id="birthday" name="dob" style="background-color: #F0EFEF; margin-top: 10px; border: none;" value="<?php echo $dob  ?>">
</div>
<div class="savechanges"><button type="save" name="save">Save Changes</button></div><br><br><br><br>
        </div>
   
    </form>

                
            
   

   

</div>

   
       
  


    


</body>

</html>
