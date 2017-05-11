<?php



$conn = mysqli_connect("localhost","root","","lf");



if (!$conn) {
	die("Connection Failes : ".mysqli_connect_error());
	echo "db connection error <br>";
}




?>