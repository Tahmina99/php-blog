 <?php 
ob_start();
session_start();
if($_SESSION['name']!='admin'){
	header('location:login.php');
}
include("../config.php");
?>
 <?php 
	if(isset($_POST['form1']))
	{
		try{
			if(empty($_POST['cat_name']))
			{
				throw new Exception("Category name can not be empty");
			}
			
			$statement=$db->prepare("SELECT * FROM tbl_category WHERE cat_name=?");
			$statement->execute(array($_POST['cat_name']));
			$total=$statement->rowCount();
			if($total>0)
			{
				 throw new Exception("Category name already exist");
			}
			$statement=$db->prepare("INSERT INTO tbl_category (cat_name) VALUES(?)");
			$statement->execute(array($_POST['cat_name']));
			$success_message="category name has been inserted successfully";
		}
		catch(Exception $e)
		{
			$error_message=$e->getMessage();
		}
	}
	if(isset($_POST['form2']))
	{
		try{
			if(empty($_POST['cat_name']))
			{
				throw new Exception("Category name can not be empty");
			}
			$statement=$db->prepare("UPDATE tbl_category SET cat_name=? WHERE cat_id=?");
			$statement->execute(array($_POST['cat_name'],$_POST['hdn']));
			$success_message1="Category name has been updated successfully";
		}
		catch(Exception $e)
		{
		$error_message1=$e->getMessage();	
		}
		
	}
	if(isset($_REQUEST['id']))
	{
		$id=$_REQUEST['id'];
		$statement=$db->prepare("DELETE FROM tbl_category WHERE cat_id=?");
		$statement->execute(array($id));
		$success_message2="Category name has been deleted successfully";
	}
 ?>
 <?php include("header.php");?>
<h2>Add New Category</h2>
<p>&nbsp;</p>
<?php 

if(isset($error_message)){echo "<span style='color:red'>".$error_message."</span>";}
if(isset($success_message)){echo "<span style='color:green'>".$success_message."</span>";}
?>
<form action="" method="post">
<table class="tbl1">
<tr>
<td>Category Name</td>
</tr>
<tr>
<td><input class="medium" type="text" name="cat_name"></td> 
</tr>
<tr>
<td><input type="submit" value="SAVE" name="form1"></td> 
</tr>
</table>
</form>
<h2>View All Category</h2>
<?php 

if(isset($error_message1)){echo "<span style='color:red'>".$error_message1."</span>";}
if(isset($success_message1)){echo "<span style='color:green'>".$success_message1."</span>";}
if(isset($success_message2)){echo "<span style='color:green'>".$success_message2."</span>";}
?>
<table class="tbl2" width="70%">
<tr>
	<th width="3%">Serial</th>
	<th width="70%">Category Name</th>
	<th width="70%">Action</th>
</tr>
<?php 
$i=0;
$statement=$db->prepare("SELECT * FROM tbl_category ORDER BY cat_name ASC");
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
{
	$i++;
?>
	<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $row['cat_name'];?></td>
	<td><a class="fancybox" href="#inline<?php echo $i;?>" >Edit</a>
	<div id="inline<?php echo $i;?>" style="width:400px;display: none;">
		<h3>Edit data</h3>
		<p>
			<form action="" method="post">
			<input type="hidden" name="hdn" value="<?php echo $row['cat_id']?>">
			<table>
			<tr>
				<td>Category Name</td>
			</tr>
			<tr>
				<td><input type="text" name="cat_name" value="<?php echo $row['cat_name']?>"></td>
			</tr>
			<tr>
				<td><input type="submit" value="UPDATE" name="form2"></td>
			</tr>
			</table>
			</form>
		</p>
	</div>
	&nbsp;/&nbsp;
	<a onclick='return confirmDelete();' href="manage-catagory.php?id=<?php echo $row['cat_id'];?>">Delete</a></td>
</tr>
<?php 	
}
?>
</table>

<?php include("footer.php");?>
