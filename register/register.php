<?php
include 'Connection.php';
session_start();
$isRegistered = false;
	$fname = $lname = $address = $email = $pass = $repass = $user_type = "";
	$rowCount=0;
	if(isset($_POST['submit'])){
		$fname =$_POST['fname'];
		$lname = $_POST['lname'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$repass = $_POST['repass'];
		$user_type = $_POST['user_type'];

		$detail="SELECT * FROM ALL_USER WHERE EMAIL='$email'";
		$detailqry = oci_parse($conn, $detail);
		oci_execute($detailqry);
		while($row = oci_fetch_array($detailqry)){
			$rowCount++;
		}
    if($rowCount==0){
			if($repass == $pass){
				$repass = $pass;
				if(strtoupper($user_type) == 'CUSTOMER'){			
				$sql = "INSERT INTO ALL_USER(USER_ID,FIRST_NAME,LAST_NAME, ADDRESS, EMAIL, PASSWORD, USER_ROLE) VALUES 
					(seq_user.nextval,'$fname','$lname','$address', '$email', '$pass', '$user_type')";
						
				$result = oci_parse($conn,$sql);			
				oci_execute($result);
					if(oci_error()){
						echo "<script>alert('Oci Error');</script>";
					}
				}else{
            $_SESSION['USER_ID'] =$_POST['USER_ID'];	
						$_SESSION['fname'] =$_POST['fname'];
						$_SESSION['lname'] = $_POST['lname'];
						$_SESSION['address'] = $_POST['address'];
						$_SESSION['email'] = $_POST['email'];
						$_SESSION['pass'] = $_POST['pass'];
						$_SESSION['repass'] = $_POST['repass'];
						header('location:trader.php');
				}
			}else{
				if($repass != $pass){				
					echo "<script>alert('Your confirm Password does not match');</script>";
				}			
			}
		}else{
			$isRegistered = true;
			echo "<script>alert('User Already Registered. Please Enter new id');</script>";
		}
	}
  
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Register form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="center">
      <form method="POST">
          <img src="icon.png" class="photo" width="80" height="90">
          <h1>Register</h1>
        <div class="txt_field">
                <label for="Firstname"><b>FirstName</b></label>
                <div class="input-icons">
                    <i class="fa fa-user icon">
                  </i>
                    <input class="input-field" type="text" placeholder="FirstName" name="fname">
                </div>
              </div>
              <div class="txt_field">
                    <label for="Lastname"><b>Lastname</b></label>
                    <div class="input-icons">
                        <i class="fa fa-user icon">
                      </i>
                        <input class="input-field" type="text" placeholder="Lastname" name="lname">
                    </div>
                  </div>
                  <div class="txt_field">
                        <label for="Address"><b>Address</b></label>
                        <div class="input-icons">
                            <i class="fa fa-address-book icon">
                          </i>
                            <input class="input-field" type="text" placeholder="Address" name="address">
                        </div>
                      </div>
                      <div class="txt_field">
                            <label for="email"><b>email</b></label>
                            <div class="input-icons">
                                <i class="fa fa-envelope icon">
                              </i>
                                <input class="input-field" type="text" placeholder="email" name="email" required>
                            </div>
                          </div>
        <div class="txt_field">
            <label for="Password"><b>Password</b></label>
            <div class="input-icons">
                <i class="fa fa-lock icon">
              </i>
                <input class="input-field" type="password" placeholder="Password" name="pass" required>
            </div>
          </div>
          
          <div class="txt_field">
                <label for="Retype Password"><b>Retype Password</b></label>
                <div class="input-icons">
                    <i class="fa fa-lock icon">
                  </i>
                    <input class="input-field" type="password" placeholder="Retype Password" name="repass">
                </div>
            </div> 
            <div class="txt_field">
              <label for="register"><b>Register as</b></label>
              <select class="input-field" type="text" name="user_type">
                <option style="display: none;">Select</option>
                <option value="Customer" <?php if($user_type=="Customer"){echo "selected";}?>>Customer</option>
                <option value="Trader" <?php if($user_type=="Trader"){echo "selected";}?>>Trader</option>
              </select>
            </div>
              <input type="checkbox">
              <label for="agree"> I agree to terms and conditions</label><br><br>
          <button type="submit" name="submit" class="btn"><h2><b>Register</b></h2></button></br><br>
        Already have an account?<a href="../loginpage/login.php">Login</a>
      </form>
    </div>

  </body>
</html>