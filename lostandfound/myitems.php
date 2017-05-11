<?php session_start(); ?>
<?php
include 'init0.php';
    if (isset($_SESSION['logged_in'])){
        $email = ($_SESSION['email']);
        // header("location: index.php");
    }
    // else{
    //  $username='';
    //  header("location: sign_in_up.php");
    // }
?>

<?php 

//declaring variables

$msg_err=$msg_err1=$msg=$email="";

 ?>


<?php
$del_msg='';
if(isset($_POST["lf_delete"]))
{
    $del_id=$_POST['id'];
    $delete_query="delete from lf_responses where id=$del_id";
    $result=mysqli_query($conn,$delete_query);
    if ($result) {
        $del_msg= "Response deleted successfully!<br>";
    }
}
?>




<?php
if(isset($_POST["lf_submit"])){
    
    // echo "processing started<br>";
    // echo "temp0<br>";

    
        // echo "processing target<br>";
    $target_image1="assets/images/lf_images/".basename($_FILES['image1']['name']);
    $target_image2="assets/images/lf_images/".basename($_FILES['image2']['name']);

     //echo "processing data<br>";
    $lf_name=$user_row['name'];
    $lf_email=$user_row['email'];
    $select_lf=$_POST['select_lf'];
    $title=$_POST['title'];
    $date=$_POST['date'];
    $description=$_POST['description'];
    $image1=$_FILES['image1']['name'];
    $image2=$_FILES['image2']['name'];

    $mov_image1=move_uploaded_file($_FILES['image1']['tmp_name'], $target_image1);
    $mov_image2=move_uploaded_file($_FILES['image2']['tmp_name'], $target_image2);

                 //echo "files uploaded<br>";
            $sql="insert into lf_responses (lf_name, lf_email, select_lf, title, date, description, image1, image2) values ('$lf_name', '$lf_email', '$select_lf', '$title', '$date', '$description', '$image1', '$image2')";
    //$result = $conn->query($sql);
     if ($sql) {
          //echo "query done<br>";
     }
            $result=mysqli_query($conn,$sql);

            if ($result) {
                $msg="Your response has been recorded!<br>";
                //echo $msg;
            }
            else
            {
                $msg_err= "ERROR submitting your response!<br>";
            }
    


}
?>







<?php
 if (isset($_SESSION['logged_in'])){
    $user_query= "select * from `signup` where (email='$email')";
    $user_result=mysqli_query($conn,$user_query);
    // $user_row=mysqli_fetch_array($user_result);
    $user_row=mysqli_fetch_assoc($user_result);
}
?>



<?php
if(isset($_POST["lf"])){
    $lf_id=$_POST['id'];
    $select_lf=$_POST['select_lf'];
    $base_name=$_POST['base_name'];
    $base_email=$_POST['base_email'];
    $response_name=$_POST['response_name'];
    $response_email=$_POST['response_email'];
    $response_original_phone_0=$_POST['response_original_phone_0'];
    $response_original_phone_1=$_POST['response_original_phone_1'];
    $response_given_phone=$_POST['response_given_phone'];
    
    
$response_query="insert into post_responses (lf_id, select_lf, base_name, base_email, response_name, response_email, response_original_phone_0, response_original_phone_1, response_given_phone) values ('$lf_id', '$select_lf', '$base_name', '$base_email', '$response_name', '$response_email','$response_original_phone_0', '$response_original_phone_1', '$response_given_phone')";

$response_result=mysqli_query($conn,$response_query);

}
?>

<!-- solved -->

<?php

    if(isset($_POST["lost_solved"])){
        $l_id=$_POST['id'];
        //$lost_checked=$_POST['lost'];
    }

    if(isset($l_id)){
        $lost_solved_query= "UPDATE `lf_responses` SET `solved` = '1' WHERE `id` =$l_id;";
        $lost_solved_result=mysqli_query($conn,$lost_solved_query);
        
        //echo "solved";
        
    }

?>

<?php

    if(isset($_POST["found_solved"])){
        $f_id=$_POST['f_id'];
        //$found_checked=$_POST['found'];
    }

    if(isset($f_id)){
        $found_solved_query= "UPDATE `lf_responses` SET `solved` = '1' WHERE `id` =$f_id;";
        $found_solved_result=mysqli_query($conn,$found_solved_query);
         //echo "solved";
    }

?>

<!-- solved -->



<!DOCTYPE html>
<html lang="en">
    

<head>
        
        <!-- Title -->
        <title>Lost & Found - MY ITEMS</title>
        
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Onlinesggs lost and found portal" />
        <meta name="keywords" content="lost and found portal, lost, found, sggs, SGGSIE&T, lost and found, portal,Shri Guru Gobind Singhji Institute of Engineering and Technology, nanded, vishnupuri, onlinesggs" />
        <meta name="author" content="Ankur Narkhede" />
        
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href="assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">

            
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <!-- custom -->
        
        <link href="assets/css/style0.css" rel="stylesheet" type="text/css"/>
        <script src='assets/js/js0.js' type="text/javascript"></script>
        
       
    </head>
    <body>
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
                <div class="spinner-layer spinner-teal lighten-1">
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
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s8 m4">      
                            <span class="chapter-title">LOST & FOUND</span>
                        </div>
                        
                        <?php if (!isset($_SESSION['email'])){ ?>
                       <!-- <div class="col m1 float_r">
                            <a  href="sign_in.php" class="waves-effect waves-light btn">Login</a>
                            
                        </div>  -->
                        <?php } ?>
                        

                       
                        
                       
                    </div>
                </nav>
            </header>
             
            
            <aside style="width: 240px;" id="slide-out" class="side_nav_width side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                           <!-- <img src="assets/images/profile-image.png" class="circle" alt=""> -->
                        </div>
                        <div class="sidebar-profile-info">
                            <?php if (isset($_SESSION['logged_in'])){ ?>
                            
                                <p><?php echo $user_row['name']; ?></p>
                                
                                <span><?php echo $user_row['email']; ?>
                                </span>
                                <?php } ?>
                          
                        </div>
                    </div>
                    
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <li class="no-padding"><a class="waves-effect waves-grey " href="index.php"><i class="material-icons">settings_input_svideo</i>Home</a></li>
                    <li class="no-padding active">
                        <a href="myitems.php" class=" waves-effect waves-grey active"><i class="material-icons">apps</i>My Items</a>
                        
                    </li>
                    
                 
                    <?php if (isset($_SESSION['logged_in'])){ ?>
                    <li class="no-padding">
                                <a href="logout.php" class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Log Out</a>
                    </li>
                    <?php
                    }
                    ?>
                    
                </ul>
                
                </div>
            </aside>
            <main class="mn-inner inner-active-sidebar">
                <div class="middle-content" style="width:100% !important;">
            
            <!-- form start -->



<?php 
if (isset($_SESSION['logged_in'])) {
//echo $email;
?>
    

                    

<?php
    }
    else
    {
?>
                    <div class="row no-m-t no-m-b">
                        <div class="col s12 m12">
                          <div class="card darken-1">
                            <div class="card-content white-text">
                              <a href="sign_in.php"><span class="">Please Login!</span></a>
                             
                            </div>
                          </div>
                        </div>
                    </div>
<?php
    }
?>
<!-- form end/ -->

 <!-- display msg -->
<?php
if($del_msg!='')
{
?>

<div class="card invoices-card">
    <div class="card-content">
      
        <p class="text_wrap" style="margin-top: 5px; color:green;  "><?php echo $del_msg; ?></p>

    </div>
</div>
<?php
}
?>

 
 <!-- display msg -->
<div class="card invoices-card">
    <div class="card-content">
      
        <h4 class="text_wrap" style="margin-top: 5px; color:green;  ">MY ITEMS</h4>

    </div>
</div>

<!-- displaying lf -->
         <div class="row no-m-t no-m-b">
                        <div class="col s12 m12 l12">
                            <ul class="tabs">
                                <li class="tab col s6"><a  class ='active' href="#lost">LOST</a></li>
                                <li class="tab col s6"><a href="#found">FOUND</a></li>
                            </ul>
                        </div>

 <!-- display lost stsrt -->


<div id="lost" class="col s12">

<?php
    include 'connect0.php';
    $lost_query= "SELECT * FROM `lf_responses` WHERE `email` LIKE '$email' AND `select_lf` LIKE 'lost' order by id DESC";
    $lost_result=mysqli_query($conn,$lost_query);
    while($lost_row=mysqli_fetch_array($conn,$lost_result)){
    $l_solved=$lost_row['solved'];
    $l_email=$lost_row['email'];

    

?>
                            <div class="card invoices-card">
                                <div class="card-content"   style="background-color:<?php if($l_solved!=true){ echo "#ffcdd2"; } else { echo "#C5E1A5"; }  ?>" >
                                    <div class="card-options"  > 
                                    
                                    
                                        <?php 
                                        if (isset($_SESSION['logged_in'])){
                                        if($l_email==$email)
                                        {
                                        ?>
                                        <form method="POST" action="index.php" enctype="">
                                        <input style="display: none;" type="text" name="id" value="<?php echo $lost_row['id']; ?>">
                                          
                                          button class="btn-floating btn-large waves-effect waves-light red" type="submit" name="lf_delete"><i type="submit" class="material-icons">delete</i>
                                        </button
                                           
                                        </form>
                        <?php
                        }
                    }
                        ?>
                    
                        
                        <?php if($l_solved==true) { ?>
                        <div>
                        <i style="font-size: 4em;" class="material-icons">done</i>
                        </div>
                        <?php } ?>
                                    </div>
                                    <h4 class="card-title" style="font-size: 17px; margin-top: 5px;" ><?php echo $lost_row['lf_name']; ?></h4>
                                    <h6 class="text_wrap" style="font-weight: bold; margin-top: 5px;"><?php echo $lost_row['title']; ?></h6>
                                    <p class="text_wrap" style="margin-top: 5px;">Date: <?php echo $lost_row['date']; ?></p>
                                    <p class="text_wrap" style="margin-top: 5px;">Details: <?php echo $lost_row['description']; ?></p>

                                    <div class="row" style="margin-top: 5px;">
<?php
    if ($lost_row['image1']!='') {
?>
                                        <div class="col s6 m6 l6">
                                            <img class="responsive-img" style="max-height: 15em; " src="assets/images/lf_images/<?php echo $lost_row['image1']; ?>">
                                        </div>
<?php
    }
?>

<?php
    if ($lost_row['image2']!='') {
?>

                                        <div class="col s6 m6 l6">
                                            <img class="responsive-img" style="max-height: 15em; "  src="assets/images/lf_images/<?php echo $lost_row['image2']; ?>">
                                        </div>
<?php
    }
?>
                                    </div>
                    

 <!-- found by card -->
<h4 class="card-title" style="font-size: 17px;" >Responses:</h4>
<?php 
$curr_id=$lost_row['id'];
     $found_by_query= "SELECT * FROM `post_responses` WHERE (lf_id=$curr_id) order by id ASC";
     $found_by_result=mysqli_query($conn,$found_by_query);
     while ($found_by_row=mysqli_fetch_array($found_by_result)) {

?>


                                <div class="row"  style="margin-bottom: 0px;" >
                                    <div class="col s12 m12">
                                      <div class="card darken-1">
                                        <div class="card-content " style="padding:7px;">
                                          <span class="card-title" style="margin-bottom: 5px;">Name: <?php echo $found_by_row['response_name']; ?> </span>
                                          <p>Contact no: <?php echo $found_by_row['response_given_phone']; ?></p>
                                        </div>
                                       
                                      </div>
                                    </div>
                               </div>
<?php 
}
?>


<form action="myitems.php" method="POST">
      <p>
      <input style="display: none;" type="text" name="id" value="<?php echo $lost_row['id']; ?>">
      <!-- <input name="lost" type="checkbox" class="filled-in" id="filled-in-box"  />
      <label for="filled-in-box">Solved</label> -->
    
     <button class="btn waves-effect waves-light" type="submit" name="lost_solved">Solved
    <i style="font-size:;" class="material-icons">done</i>
  </button>
  </p>
</form>





<!-- found by card -->



                        

                                </div>



                            </div>
<?php
    }
?>

                        </div>

                        <!-- display lost end -->
                        
                        <!-- dosplay found stsrt -->
                        

                        <div id="found" class="col s12">
<?php
    include 'connect0.php';
    $found_query= "SELECT * FROM `lf_responses` WHERE `email` LIKE '$email' AND `select_lf` LIKE 'found' order by id DESC";
    $found_result=mysqli_query($conn,$found_query);
    while ($found_row=mysqli_fetch_array($found_result)) {
    $f_solved=$found_row['solved'];
    $f_email=$found_row['email'];
?>

                            <div class="card invoices-card">
                                <div class="card-content" style="background-color:<?php if($f_solved!=true){ echo "#ffcdd2"; } else { echo "#C5E1A5"; }  ?>" >
                                     <div class="card-options"   > 
                                    <?php 
                                    if($f_email==$_SESSION['email'])
                                    {
                                    ?>
                                    <form method="POST" action="index.php" enctype="">
                                    <input style="display: none;" type="text" name="id" value="<?php echo $found_row['id']; ?>">
                                      
                                      <button class="btn-floating btn-large waves-effect waves-light red" type="submit" name="lf_delete"><i type="submit" class="material-icons">delete</i>
                                    </button>
                                       
                                    </form>
                    <?php
                    }
                    ?>
                    
                    <?php if($f_solved==true) { ?>
                    <div>
                    <i style="font-size: 4em;" class="material-icons">done</i>
                    </div>
                    <?php } ?>
                    
                                    </div>
                                   <h4 class="card-title" style="font-size: 17px; margin-top: 5px;" ><?php echo $found_row['lf_name']; ?></h4>
                                    <h6 class="text_wrap" style="font-weight: bold; margin-top: 5px;"><?php echo $found_row['title']; ?></h6>
                                    <p class="text_wrap" style="margin-top: 5px;">Date: <?php echo $found_row['date']; ?></p>
                                    <p class="text_wrap" style="margin-top: 5px;">Details: <?php echo $found_row['description']; ?></p>

                                    <div class="row" style="margin-top: 5px;">
<?php
    if ($found_row['image1']!='') {
?>
                                        <div class="col s6 m6 l6">
                                            <img class="responsive-img" style="max-height: 15em; " src="assets/images/lf_images/<?php echo $found_row['image1']; ?>">
                                        </div>
<?php
    }
?>

<?php
    if ($found_row['image2']!='') {
?>

                                        <div class="col s6 m6 l6">
                                            <img class="responsive-img" style="max-height: 15em; "  src="assets/images/lf_images/<?php echo $found_row['image2']; ?>">
                                        </div>
<?php
    }
?>
                                    </div>
                      

                                <!-- found card -->
                                
<h5 class="card-title" style="font-size: 17px;" >Responses:</h5>
<?php 
$curr_id= $found_row['id'];
$lost_by_query= "SELECT * FROM `post_responses` WHERE (lf_id=$curr_id) order by id ASC";
    $lost_by_result=mysqli_query($conn,$lost_by_query);
    while ($lost_by_row=mysqli_fetch_array($lost_by_result)) {

?>
                                 <div class="row" style="margin-bottom: 0px;" >
                                    <div class="col s12 m12">
                                      <div class="card darken-1">
                                        <div class="card-content "  style="padding:7px;">
                                          <span class="card-title" style="margin-bottom: 5px;" >Name: <?php echo $lost_by_row['response_name']; ?> </span>
                                          <p>Contact no: <?php echo $lost_by_row['response_given_phone']; ?></p>
                                        </div>
                                       
                                      </div>
                                    </div>
                                  </div>
<?php 
}
?>

<form action="myitems.php" method="POST">
      <p>
      <input style="display: none;" type="text" name="id" value="<?php echo $found_row['id']; ?>">
      <!-- <input name="lost" type="checkbox"   />
      <label for="filled-in-box">Solved</label> -->
    
     <button class="btn waves-effect waves-light" type="submit" name="found_solved">Submit
    <i style="font-size:;" class="material-icons">done</i>
  </button>
  </p>
</form>




<!-- found card    class="filled-in" id="filled-in-box" -->

                     
                                </div>


                            </div>
<?php
    }
?>
                        </div>


                        <!-- display found end -->


           </div>


<!-- display lf end -->
</div>
                

            </main>
             <div class="page-footer">
                <div class="row footer-grid container">
                	<div class="col s6 offset-s3" style="text-align: center;">
                        
<span style="text-align:center;">Developed by <a href="https://www.facebook.com/adi.chaudhari1997">Aditya Chaudhari</a> & <a href="https://www.facebook.com/smartankur4u">Ankur Narkhede</a></span>                    </div>
    		<div class="row">
                    <div class="col s10 m6 offset-m3 offset-s1">
			<span style="float: left;">SGGS IE&amp;T © 2016 </span>
			<span style="float: right;">  <a href="https://onlinesggs.org/forum/">Forum</a> </span>
                    </div>
                </div>
    		</div>
            </div>
            
        </div>
        <div class="left-sidebar-hover"></div>
        
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/plugins/chart.js/chart.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/dashboard.js"></script>
        
    </body>


</html>