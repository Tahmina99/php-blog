 <?php 
ob_start();
session_start();
if($_SESSION['name']!='admin'){
	header('location:login.php');
}
include("../config.php");
?>
 <?php 
 include("header.php");?>
<h2>Welcome to Admin Panel</h2>
<div id="dashbord">
Welcome to dashbord of <br>
Sample blog with PHP
</div>
<?php 
 include("footer.php");?>
