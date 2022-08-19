<?php
session_start();

include 'connection.php';
if(isset($_POST['submit'])){
        $fname=$_SESSION['fname'];
        $lname=$_SESSION['lname'];
        $address=$_SESSION['address'];
        $email=$_SESSION['email'];
        $pass=$_SESSION['pass'];
        $repass=$_SESSION['repass'];
		$desc = $_POST['desc'];
		
		$sql = "INSERT INTO ALL_USER(USER_ID,FIRST_NAME,LAST_NAME, ADDRESS, EMAIL, PASSWORD, USER_ROLE) VALUES 
					(seq_user.nextval,'$fname','$lname','$address', '$email', '$email', 'Trader')";
						
				$result = oci_parse($conn,$sql);			
				oci_execute($result);
					if(oci_error()){
						echo "<script>alert('Oci Error');</script>";
					}
					
		$msg = "Hello, I would like to register as a trader 
				\nShop Description: $desc
				\nEmail: $email
				\nFirst Name: $fname
				\nLast Name: $lname";

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);
		
		$to="anujmaharjan32@gmail.com";
		$subject="Request for trader membership";
		$headers = "From: ikshugyawali@gmail.com"."\r\n"."Cc: acharyasrijan360@gmail.com"."\r\n"."Bcc: ufg333@example.com";
        $mail_sent=mail($to,$subject,$msg,$headers);       
		if ( $mail_sent==true) 
		{
   			echo "Your account confirmation email has been sent to the admin!";
   	} 
		else 
		{
   			echo "Failed to send email, try again!";
   		}
		
		
	}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Urban Food Grocer | Register Trader</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link type="text/css" rel="stylesheet" href="misc/css/bootstrap.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="misc/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
	<!-- /top Header -->
	<div class="container" id="logo">
		<div class="container">
			<div class="pull-left">
				<!-- Logo -->
				<div class="header-logo">
					<a class="logo" href="index.php">
						<img src="misc/img/logo.png" alt="">
					</a>
				</div>
				<!-- /Logo -->				
			</div>
		</div>
	</div>
	
<body class="hold-transition">
<style>
#login {
    border: 0px solid;
    padding: 10px;
    box-shadow: 0 0 5px #888888;
	background-color: #ffffff;
}
#logo {
	width: 100%;
	background-color: #ffffff;
}

body {
    background-color: #f9f9f9;
}
</style>
<div class="login-box" id="login">
  <div class="login-logo">
    <a href="index.php"><b>Urban Food Grocer</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Enter a short description of your shop or the products you are trying to sell</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Description" name="desc">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      	<div class="row">
        <div class="col-xs-8">
          </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit">Submit</button>
        </div>
        <!-- /.col -->
      </div>

    </form>

	<br>
    <a href="register.php" class="text-center">Register a new membership</a>
        

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="assets/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>

</body>
</html>