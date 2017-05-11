<?php session_start(); ?>
<?php
include 'init0.php';
?>



<!-- signup start -->
<?php

if(isset($_SESSION['email']))
    {
    //header("location: sign_in.php");
        echo "<script>location='./index.php'</script>";
        //echo 'not loggrd in <br>';
    }

$signup_err=$signup_success='';

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



// define variables and set to empty values
$name= $email = $phone = $password ="";
$nameErr= $emailErr = $phoneErr = $passwordErr ="";

if(isset($_POST['signup_submit'])) {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }



 // if (empty($_POST["username"])) {
 //    $usernameErr = "Name is required";
 //  } else {
 //    $username = test_input($_POST["lname"]);
 //    // check if name only contains letters and whitespace
 //    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
 //      $usernameErr = "Only letters and white space allowed";
 //    }
 //  }

  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
     

   if (empty($_POST["phone"])) {
      $phone = "";
      } else {
      $phone = test_input($_POST["phone"]);
      }

    if ($_POST["password"] == $_POST["cpassword"]) {
        $password = $_POST["password"];
    }
    else {
        $passwordErr='Passwords do not match!';
        header("location: sign_up.php");
    }


    $sql="insert into signup (name,  email, phone, password) values ('$name', '$email', '$phone', '$password')";
    
    $result=mysqli_query($conn,$sql);


    if ($result) {
        $signup_success="<br> SignUp successful! <a href='sign_in.php'>LogIn Here</a><br>";
        
    }
    else
    { 
        $signup_err='ERROR in signup!';
        
    }
    



}
?>

<!-- signup ends -->





<!DOCTYPE html>
<html lang="en">
    

<head>

        <!-- Title -->
        <title>SIGN UP-LOST & FOUND</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        

        	
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        
      
    </head>
    <body class="signup-page">
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
       










<div class="row container">
          <div class="col s12 m6 offset-m3">

      

          <!-- SignUp form starts here-->
         <div class="col s12 m12">
                      <div class="card darken-1">
              <div class="card-content black-text">
              <img class="responsive-img" src="assets/images/sggs.png" style="max-height: 7em; margin: 0em 0em 0em 8em; ">

              <form method="post" enctype="multipart/form-data" action="sign_up.php">
                <span class="card-title">SignUp</span>
                <p><?php echo $signup_success;  ?></p>
                <p><?php echo $signup_err;  ?></p>
                <div class="row">
                  <div class="input-field col s12 m12">
                    <input id="name" class="validate" name="name" required="required" type="text">
                    <label for="name" data-error="wrong" data-success="right">Name</label>
                  </div>

                 
                 <!--  <div class="input-field col s12 m12">
                    <input id="username" class="validate" name="username" required="required" type="text">
                    <label for="username" data-error="wrong" data-success="right">Username</label>
                  </div> -->

                  <div class="input-field col s12 m12">
                    <input id="Email" class="validate" name="email" required="required" type="email">
                    <label for="Email" data-error="wrong" data-success="right">Email</label>
                  </div>

                  <div class="input-field col s12 m12">
                    <input id="phNum" maxlength="10" class="validate" name="phone" required="required" type="number">
                    <label for="phNum" data-error="wrong" data-success="right">Phone Number</label>
                  </div>

                  <div class="input-field col s12 m12">
                    <input id="pass" class="validate" name="password" required="required" type="password">
                    <label for="pass">Password</label>
                  </div>

                  <div class="input-field col s12 m12">
                    <input id="cPass" class="validate" name="cpassword" required="required" type="password">
                    <label for="cPass" data-error="wrong" data-success="right">Confirm Password</label>
                  </div>                
                </div>

                <div class="card-action">

                <button class="waves-effect waves-light btn" name="signup_submit" type="submit">SignUp</button>

              </form>
              </div>


                <div class="col s12 " style="text-align: center;">
                        
                    <span style="text-align:center; font-size: 1.4em; ">Already registered! <a href="sign_in.php">LogIn here</a>.</span>
                  </div>
              </div>

              
                <div class="row">
                  <div class="col s12 " style="text-align: center;">
                        
<span style="text-align:center;">Developed by <a href="https://www.facebook.com/adi.chaudhari1997">Aditya Chaudhari</a> & <a href="https://www.facebook.com/smartankur4u">Ankur Narkhede</a></span>                  </div>
                </div>

                <div class="row">
                    <div class="col s8 offset-s2">
                        <span style="float: left;">SGGS IE&amp;T © 2016 </span>&nbsp
                        <span style="float: right;"><a href="https://onlinesggs.org/forum/">Forum</a></span>
                    </div>
                </div>




                        
            </div>
          </div>
          
        </div>
</div>





        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        
    </body>


</html>