<?php session_start(); ?>
<?php
include 'connect0.php';

    if (isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        echo "<script>location='./index.php'</script>";
    }
    // else{
    // 	$username='';
    // 	header("location: sign_in_up.php");
    // }
?>