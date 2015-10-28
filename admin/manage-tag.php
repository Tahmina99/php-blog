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
			if(empty($_POST['tag_name']))
			{
				throw new Exception("Tag name can not be empty");
			}
			
			$statement=$db->prepare("SELECT * FROM tbl_tag WHERE tag_name=?");
			$statement->execute(array($_POST['tag_name']));
			$total=$statement->rowCount();
			if($total>0)
			{
				 throw new Exception("Tag name already exist");
			}
			$statement=$db->prepare("INSERT INTO tbl_tag(tag_name) VALUES(?)");
			$statement->execute(array($_POST['tag_name']));
			$success_message="Tag name has been inserted successfully";
		}
		catch(Exception $e)
		{
			$error_message=$e->getMessage();
		}
	}
	if(isset($_POST['form2']))
	{
		try{
			if(empty($_POST['tag_name']))
			{
				throw new Exception("Tag name can not be empty");
			}
			$statement=$db->prepare("UPDATE tbl_tag SET tag_name=? WHERE tag_id=?");
			$statement->execute(array($_POST['tag_name'],$_POST['hdn']));
			$success_message1="Tag name has been updated successfully";
		}
		catch(Exception $e)
		{
		$error_message1=$e->getMessage();	
		}
		
	}
	if(isset($_REQUEST['id']))
	{
		$id=$_REQUEST['id'];
		$statement=$db->prepare("DELETE FROM tbl_tag WHERE tag_id=?");
		$statement->execute(array($id));
		$success_message2="Tag name has been deleted successfully";
	}
 ?>
 <?php include("header.php");?>
<h2>Add New Tag</h2>
<p>&nbsp;</p>
<?php 

if(isset($error_message)){echo "<span style='color:red'>".$error_message."</span>";}
if(isset($success_message)){echo "<span style='color:green'>".$success_message."</span>";}
?>
<form action="" method="post">
<table class="tbl1">
<tr>
<td>Tag Name</td>
</tr>
<tr>
<td><input class="medium" type="text" name="tag_name"></td> 
</tr>
<tr>
<td><input type="submit" value="SAVE" name="form1"></td> 
</tr>
</table>
</form>
<h2>View All Tag</h2>
<?php 

if(isset($error_message1)){echo "<span style='color:red'>".$error_message1."</span>";}
if(isset($success_message1)){echo "<span style='color:green'>".$success_message1."</span>";}
if(isset($success_message2)){echo "<span style='color:green'>".$success_message2."</span>";}
?>
<table class="tbl2" width="70%">
<tr>
	<th width="3%">Serial</th>
	<th width="70%"> Tag Name</th>
	<th width="70%">Action</th>
</tr>
<?php 
$i=0;
$statement=$db->prepare("SELECT * FROM tbl_tag ORDER BY tag_name ASC");
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
{
	$i++;
?>
	<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $row['tag_name'];?></td>
	<td><a class="fancybox" href="#inline<?php echo $i;?>" >Edit</a>
	<div id="inline<?php echo $i;?>" style="width:400px;display: none;">
		<h3>Edit data</h3>
		<p>
			<form action="" method="post">
			<input type="hidden" name="hdn" value="<?php echo $row['tag_id']?>">
			<table>
			<tr>
				<td>Tag Name</td>
			</tr>
			<tr>
				<td><input type="text" name="tag_name" value="<?php echo $row['tag_name']?>"></td>
			</tr>
			<tr>
				<td><input type="submit" value="UPDATE" name="form2"></td>
			</tr>
			</table>
			</form>
		</p> 
	</div>
	&nbsp;/&nbsp;
	<a onclick='return confirmDelete();' href="manage-tag.php?id=<?php echo $row['tag_id'];?>">Delete</a></td>
</tr>
<?php 	
}
?>
</table>

<?php include("footer.php");?>
