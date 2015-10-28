
<!doctype html>
<html>
<head>
<title>Dasboard-sample blog with php</title>
<link rel="stylesheet" type="text/css" href="../styles_admin.css"/>
<script type='text/javascript'>
function confirmDelete()
{
	return confirm("Do you want to delete this data?");
}

</script>
<!-- Fancybox jquery -->
	<script type="text/javascript" src="../fancybox/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="../fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript" src="../fancybox/main.js"></script>
	<link rel="stylesheet" type="text/css" href="../fancybox/jquery.fancybox.css" />
	<!-- //Fancybox jquery -->
	<!--CKEditor Start-->
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
	<!--CKEditor Start-->
</head>
<body> 
<div id="wrapper">
<div id="header">
<h1>Admin Panel-Dasboard</h1>
</div>
<div id="container">
<div id="sidebar">
<h2>page options</h2>
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="change-footer-text.php">change footer text</a></li>
<li><a href="change-password.php">change Password</a></li>
<li><a href="logout.php">logout</a></li>
</ul>
<h2>Blog option</h2>
<ul>
<li><a href="post-add.php">Add post</a></li>
<li><a href="post-view.php">view post</a></li>
<li><a href="manage-catagory.php">manage catagory</a></li>
<li><a href="manage-tag.php">manage tags</a></li>
</ul>

<h2>Comment Section</h2>
<ul>
<li><a href="comment-approve.php">view Comments</a></li>
</ul>

</div>
<div id="content"> 