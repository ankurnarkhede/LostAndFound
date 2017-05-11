<?php
	include 'connect0.php';
	session_start();
	session_destroy();
	header('Location: index.php');
?>