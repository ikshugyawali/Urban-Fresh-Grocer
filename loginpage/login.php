<?php
  include '../Connection.php';
  include 'function.php';
  session_start();
  
  if(isset($_POST['submit'])){
      $email = $_POST['email'];
	  $pass = $_POST['password'];
      

      
      $query="select * from ALL_USER WHERE EMAIL='$email' AND PASSWORD='$pass'";
      $sql=oci_parse($conn,$query);  
      oci_execute($sql);
        $row=oci_fetch_array($sql);
        $emails=$row['EMAIL'];
        $password=$row['PASSWORD'];
        $user_type=$row['USER_ROLE'];
        $userid=$row['USER_ID'];
      
      

    if(oci_num_rows($sql) == 1){
            
      if($pass==$password){
        $_SESSION['USER_ID'] =$_POST['USER_ID'];	
        $_SESSION['email'] = $_POST['email'];
          if(strtoupper($user_type)=="CUSTOMER"){
                        header('location:../homepage/index.php');
           }else if(strtoupper($user_type)=="TRADER"){
                  header('location:../homepage/index.php');
            }
            else if(strtoupper($user_type)=="ADMIN"){
              header('location:http://localhost:8080/apex/f?p=103:5:6500176902341::NO:::');
              }
                    
      }
      }else if($emails!=$email || $password!=$pass){?>
        <script type="text/javascript"> alert('Email or Password is INVALID') </script>
  <?php
  if(oci_error()){
    echo "error";
}
// else{
//     $_SESSION['USER_ID'] =$_POST['USER_ID'];	
//     $_SESSION['fname'] =$_POST['fname'];
//     $_SESSION['lname'] = $_POST['lname'];
//     header('location:../homepage/home.php');
// } 
          
      

}
    }

 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>login form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="center">
        <form method="POST">
            <img src="icon.png" class="photo" width="80" height="90">
            <h1>LOGIN</h1>
            <div class="txt_field">
                <label for="Email"><b>Email</b></label>
                <div class="input-icons">
                    <i class="fa fa-user icon">
                    </i>
                    <input class="input-field" type="text" placeholder="Email" name="email">
                </div>
            </div>
            <div class="txt_field">
                <label for="Password"><b>Password</b></label>
                <div class="input-icons">
                    <i class="fa fa-lock icon">
                    </i>
                    <input class="input-field" type="password" placeholder="Password" name="password"  required>
                </div>
            </div>
            <button type="submit" class="btn" name="submit">
                <h2><b>Login</b></h2>
            </button></br><br>
            <a href="">Forgot Password?</a><br>
            Create a new account.<a href="../register/register.php">Register</a>
        </form>
    </div>

</body>

</html>
