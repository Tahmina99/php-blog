 
 <?php 
ob_start();
session_start();
if($_SESSION['name']!='admin'){
	header('location:login.php');
}
include("../config.php");
?>
		<?php 
		
		if(isset($_REQUEST['id']))
		{
			try{
				
				$statement = $db->prepare("UPDATE tbl_comment SET active=1 WHERE c_id=?");
				$statement->execute(array($_REQUEST['id']));
				
				$success_message = "comment is approved successfully.";
						
			}
			catch(Exception $e)
			{
				$error_message=$e->getMessage();
			}
		}
		?>

		
				<?php
					$statement=$db->prepare("SELECT * FROM tbl_footer WHERE id=1");
					$statement->execute();
					$result=$statement->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $row){
								
								$description=$row['description'];
								}
?>
<?php include("header.php");?>

<h2>All Unapproved Comments</h2>
					<?php 

						if(isset($error_message)){echo "<span style='color:red'>".$error_message."</span>";}
						if(isset($success_message)){echo "<span style='color:green'>".$success_message."</span>";}

						?>
<table class="tbl2" width="70%">
<tr>
	<th width="">Serial</th>
	<th width="">Name</th>
	<th width="">Email</th>
	<th width="">URL</th>
	<th width="">Message</th>
	<th width="">Post ID</th>
	<th width="">Action</th>
</tr>

	<?php 
		$i=0;
		$statement=$db->prepare("SELECT * FROM tbl_comment WHERE active=0 ORDER BY c_id DESC");
		$statement->execute();
		$result=$statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		{
			$i++;
			?>
			
			
			<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $row['c_name'];?></td>
	<td><?php echo $row['c_email'];?></td>
	<td><?php echo $row['c_url'];?></td>
	<td><?php echo $row['c_message'];?></td>
	<td>
	<a class="fancybox" href="#inline<?php echo $i;?>" ><?php echo $row['post_id'];?></a>
	
	<div id="inline<?php echo $i;?>" style="width:700px;display: none;">
		<h3 style="border-bottom:2px solid grey;margin-bottom:10px">view post details</h3>
		<p>
		<?php 
		
		$statement1=$db->prepare("SELECT * FROM tbl_post WHERE post_id=?");
		$statement1->execute(array($row['post_id']));
		$result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
		foreach($result1 as $row1)
		{
			?>
			<table>
			<tr>
				<td><b>Title</b></td>
			</tr>
			<tr>
				<td><?php echo $row1['post_title'];?></td>
			</tr>
			<tr>
				<td><b>Description</b></td>
			</tr>
			<tr>
				<td><?php echo $row1['post_description'];?></td>
			</tr>
			<tr><td><b>Featured Image</b></td></tr>
			<tr><td><img src="../uploads/<?php echo $row1['post_image'];?>" alt=""></td></tr>
			<tr>
				<td><b>Category</b></td>
			</tr>
			<tr>
				<td>
				<?php 
				
					$statement2=$db->prepare("SELECT * FROM tbl_category WHERE cat_id=?");
					$statement2->execute(array($row1['cat_id']));
					$result2=$statement2->fetchAll(PDO::FETCH_ASSOC);
					foreach($result2 as $row2){
					echo $row2['cat_name'];	
					}
				?>
				</td>
			</tr>
			<tr>
				<td><b>Tag</b></td>
			</tr>
			<tr>
				<td> 
				<?php 
				$arr=explode(",",$row1['tag_id']);
				$count_arr=count(explode(",",$row1['tag_id']));
				$k=0;
				for($j=0;$j<$count_arr;$j++)
				{
					$statement2=$db->prepare("SELECT * FROM tbl_tag WHERE tag_id=?");
					$statement2->execute(array($arr[$j]));
					$result2=$statement2->fetchAll(PDO::FETCH_ASSOC);
					foreach($result2 as $row2){
					
					$arr1[$k]=$row2['tag_name'];
					}
					$k++;
				}
				$tag_names=implode(",",$arr1);
				echo $tag_names;
				?>
				</td>
			</tr>
			
			</table>
			
			<?php
		}
		
		?>
			
		</p>
	</div>
	
	</td>
	<td><a href="comment-approve.php?id=<?php echo $row['c_id']; ?>">Approve</a></td>	
	</tr>
	<?php
		}
		?>
	</table>
 
<h2>All Approved Comments</h2>
<table class="tbl2" width="70%">
<tr>
	<th width="">Serial</th>
	<th width="">Name</th>
	<th width="">Email</th>
	<th width="">URL</th>
	<th width="">Message</th>
	<th width="">Post ID</th>
	
	
</tr>

	<?php 
		$i=0;
		$statement=$db->prepare("SELECT * FROM tbl_comment WHERE active=1 ORDER BY c_id DESC");
		$statement->execute();
		$result=$statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		{
			$i++;
			?>
			
			
			<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $row['c_name'];?></td>
	<td><?php echo $row['c_email'];?></td>
	<td><?php echo $row['c_url'];?></td>
	<!-- <td><?php echo $row['c_message'];?></td> -->
	
	<td>
	<a class="fancybox" href="#inline<?php echo $i.$i; ?>">Show</a>
	<div id="inline<?php echo $i.$i; ?>" style="width:700px;display: none;">
	<h3 style="border-bottom:2px solid #808080;margin-bottom:10px;">View Message Details</h3>
	
	<p>
					<?php
					$statement0 = $db->prepare("SELECT c_message FROM tbl_comment WHERE post_id=?");
					$statement0->execute(array($row['post_id']));
					$result0 = $statement0->fetchAll(PDO::FETCH_ASSOC);
					foreach($result0 as $row0)
					{
						
						?>
						
						
						<table>
						<tr>
							<td><b>Message</b></td>
						</tr>
						<tr>
							<td><?php echo $row0['c_message']; ?></td>
						</tr>
						</table>
						<?php
					}
					?>
					</p>
					</div>
	
	</td>
	

	<td><a id="inline" class="fancybox" href="#inline<?php echo $i;?>"><?php echo $row['post_id'];?></a>
	
	<div id="inline<?php echo $i;?>" style="width:550px; display:none;overflow:auto;">
				<h3 style="background-color:#3d9ccd;color:#fff;">View Data</h3>
				<p>
				
				<?php
				$statement1=$db->prepare("select * from tbl_post where post_id=?");
				$statement1->execute(array($row['post_id']));
				$result=$statement1->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row1)
				{
					?>
				 <table style="border:1px solid #3d9ccd;">
				    <tr><td><b>Post Title</b></td></tr>
					<tr>
						<td><?php echo $row1['post_title'];?></td>
					</tr>
					<tr>
						<td><b>Description</b></td>
					</tr>
					<tr>
						<td>
						<?php echo $row1['post_description'];?>
							<br>
						</td>
					</tr>
					<tr>
						<td><b>Featured Image</b></td>
					</tr>
					<tr>
							<td><img src="../uploads/<?php echo $row1['post_image'];?>" alt="" width="200px" height="180px"></td>
					</tr>
					<tr>
						<td><b>Category</b></td>
					</tr>
					<tr>
						<td>
						<?php
						$statement2=$db->prepare("select * from tbl_category where cat_id=?");
						$statement2->execute(array($row1['cat_id']));
						$result1=$statement2->fetchAll(PDO::FETCH_ASSOC);
						foreach($result1 as $row2)
						{
							echo $row2['cat_name'];
						}
						
						?>
						</td>
					</tr>
					<tr>
						<td><b>Tag</b></td>
					</tr>
					<tr>
						<td>
                             <?php
								//when retrive data (using explode)
								$arr=explode(',',$row1['tag_id']);
								$arr_count=count(explode(',',$row1['tag_id']));
								$k=0;
								for($j=0;$j<$arr_count;$j++)
								{
									 $statement2=$db->prepare("select * from tbl_tag where tag_id=?");
									 $statement2->execute(array($arr[$j]));
									 $result1=$statement2->fetchAll(PDO::FETCH_ASSOC);
									 foreach($result1 as $row2)
									 {
										$arr1[$k]=$row2['tag_name'];  
									 }
								   $k++;
                                }
								$tag_names=implode(",",$arr1);
								echo $tag_names;
                              ?>							 
						</td>
					</tr>
				 </table>

					
					<?php
				}
				?>
				
	
				 </p>
			</div>
	
	
	
	
	</td>
	</tr>
	
	<?php
		}
		?>
	</table>
<?php include("footer.php");?>
