
<?php 
if(isset($_POST['form_login']))
{
	try{
		
		if(empty($_POST['username']))
		{
			throw new Exception('username cannot be empty');
		} 
		
		if(empty($_POST['password']))
		{
			throw new Exception(' password cannot be empty');
		}
		$password=$_POST['password'];//admin
		$password=md5($password);
		include('../config.php');
		$num=0;
	 
		$statement=$db->prepare("select * from tbl_login where username=? and password=?");
		$statement->execute(array($_POST['username'],$password));
		$num=$statement->rowCount();
		if($num>0)
		{
			session_start();
			$_SESSION['name']="admin";
			header('location:index.php');
		}
		else{
			throw new Exception('invalid username and/or password'); 
	}
	}	
	catch(Exception $e)
	{
		$error_message=$e->getMessage();
	}
}
?>

<!doctype html>
<html>
<head>
<title>login sample block with php</title>
<link rel="stylesheet" type="text/css" href="../styles_admin.css"/>
</head>
<body>
<div id="wrapper-login">
<h1>Admin Login</h1>
<?php 

if(isset($error_message)){
	echo "<span style='color:red'>".$error_message."</span>";
}
?>
<form action="" method="post">
 <table>
 <tr>
 	<td>username:</td>
	<td><input type="text" name="username" /></td>
 </tr>
  <tr>
 	<td>password:</td>
	<td><input type="password" name="password" /></td>
 </tr>
   <tr>
 	<td></td>
	<td><input type="submit" name="form_login" value="Login" /></td>
 </tr>
 </table>
</form>
</div>
</body>
</html>