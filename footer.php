</div>
		<div id="sidebar">
		    <div id="search">
				<input type="text" value="Search"> <a href="#"><img src="images/go.gif" alt="" width="26" height="26" /></a>																																																																																																																																																																																																																																																						<div class="inner_copy"><a href="http://www.bestfreetemplates.info/flash.php">free flash templates</a><a href="http://www.beautifullife.info/web-design/15-best-free-website-builders/">best free web builders</a></div>
			</div>
			<div class="list">
				<img src="images/title1.gif" alt="" width="186" height="36" />
				<ul>
				
					<?php 
				include('config.php');
				$statement=$db->prepare("SELECT * FROM tbl_category ORDER BY cat_name ASC");
				$statement->execute();
				$result=$statement->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row){
								?>
								<li><a href="category.php?id=<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></a></li>
									<?php
									}
			 
					?>
						
					
				</ul>
				<img src="images/title2.gif" alt="" width="180" height="34" />
				
					<?php 
					$j=0; 
				include('config.php');
				$statement=$db->prepare("SELECT distinct(post_date) FROM tbl_post ORDER BY post_date  DESC");
				$statement->execute();
				$result=$statement->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row){
							
								
								
								$ym=substr($row['post_date'],0,7);
								$arr_date[$j]=$ym;
								$j++;
								
									}
									
									$result=array_unique($arr_date);   
									$final_val=implode(",",$result);
									$final_arr_date=explode(",",$final_val);
									$final_arr_date_count=count(explode(",",$final_val)) ;
									
					?>
				<ul>
				<?php 
				
				for($j=0;$j<$final_arr_date_count;$j++)
									{
										
										//echo $final_arr_date[$j]."<br>";
													$month=substr($final_arr_date[$j],5,2);
													$year=substr($final_arr_date[$j],0,4);
													if($month=='01'){$month_full="January";}
													if($month=='02'){$month_full="February";}
													if($month=='03'){$month_full="March";}
													if($month=='04'){$month_full="April";}
													if($month=='05'){$month_full="May";}
													if($month=='06'){$month_full="Jun";}
													if($month=='07'){$month_full="July";}
													if($month=='08'){$month_full="August";}
													if($month=='09'){$month_full="September";}
													if($month=='10'){$month_full="October";}
													if($month=='11'){$month_full="November";}
													if($month=='12'){$month_full="December";}
													
													?>
													
													<li>
												<a href="archives.php?date=<?php echo $final_arr_date[$j];?>"><?php echo $month_full.'  '.$year."<br>";?></a>
												
													</li>
													<?php 
														}
									
									
											?>
				
					
				</ul>
			</div>
		</div>
	</div>
	<div id="footer">
		<p> 
		 <?php 
			include('config.php');
			$statement=$db->prepare("SELECT * FROM tbl_footer WHERE id=1");
			$statement->execute();
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row){
								echo $row['description'];
								
								}
		 
		 ?>
		</p>																																																																		<div class="inner_copy"><a href="http://www.greatdirectories.org/offer.html">buy links with high pr</a><a href="http://www.bestfreetemplates.org/">free templates</a></div>
	</div>
</body>
</html>
