<?php session_start(); ?>
<?php

   include 'init0.php';


   if(isset($_SESSION['email']))
	{
	//header("location: sign_in.php");
		echo "<script>location='./index.php'</script>";
		//echo 'not loggrd in <br>';
	}
   
   $error='';
  
   
    if (isset($_POST['login_submit'])){
      
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $login_sql = "SELECT * FROM `signup` WHERE email = '$email' and password = '$password'";
      $login_result = mysqli_query($conn,$login_sql);
      $stud_row = mysqli_fetch_array($login_result,MYSQLI_ASSOC);
      $active = $row['active'];
      //echo $stud_row['name'];
      //echo $stud_row['regno'];
      
      $count = mysqli_num_rows($login_result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {
         // session_register("username");
         $_SESSION['email'] = $email;
         $_SESSION['name'] = $stud_row['name'];
         //echo $_SESSION['regno'];
         $_SESSION['logged_in']=1;
	         echo "<script>location='./index.php'</script>";
        //header("location: index.php");
      }else {
         $error = "Your Username or Password is invalid";
         
      }
   
    }
   
?>






<!-- login end -->



<!DOCTYPE html>
<html lang="en">
    

<head>

        <!-- Title -->
        <title>SIGN IN-LOST & FOUND</title>
        
      
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Onlinesggs lost and found portal login" />
        <meta name="keywords" content="login, onlinesggs login, lost and found portal, lost, found, sggs, SGGSIE&T, lost and found, portal,Shri Guru Gobind Singhji Institute of Engineering and Technology, nanded, vishnupuri, onlinesggs" />
        <meta name="author" content="Ankur Narkhede" />
        
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

        <!-- login form starts here-->
          <div class="col s12 m12">
             <div class="card darken-1">
              <div class="card-content black-text">
              <img class="responsive-img" src="assets/images/sggs.png" style="max-height: 7em; margin: 0em 0em 0em 8em; ">
              <form method="post" enctype="multipart/form-data" action="sign_in.php">
                <span class="card-title">LogIn</span>
                <p style="color:red;"><?php echo $error;?></p>
                <div class="row">       
                          <div class="input-field col s12 m12">
                          <input id="email" class="validate" name="email" required="required" type="text">
                          <label for="email" data-error="wrong" data-success="right">E-mail</label>
                        </div>
                        </div>
               

                <div class="row">
                      <div class="input-field col s12 m12">
                      
                      <input id="pass" class="validate" name="password"  type="password">
                      <label for="pass" data-error="wrong" data-success="right">Password</label>
                    </div>                
                  </div>
                   <div class="">
                        <button class="waves-effect waves-light btn" name="login_submit" type="submit">LogIn</button>
                    </div>
              </form>
              </div>
              
              <div class="row">
                  <div class="col s12 " style="text-align: center;">
                        
                    <span style="text-align:center; font-size: 1.4em; ">Not registered! <a href="sign_up.php">Sign Up here</a>.</span>
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