<?php
if($_GET['var']){
	$page=$_GET['var'];
}else{
	$page='home';
}
include('system/load.php');
?>
<html>
<head>
<title><?php echo($global['title']); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="top"><img src="images/banner.gif" />Username: ....<br />
Password:...</div>
<div class="nav">
<ul><li><a href="?mod=1">Home</a></li><li><a href="?mod=12">Community</a><ul><li><a href="?mod=12">Forums</a><li><a href="?mod=61">Staff List</a></ul></li></li></li></li></li></li></li><li><a href="?mod=5">Login</a></li><li><a href="?mod=2">Register</a></li><li><a href="?mod=68">Help Desk</a></li></ul>
<div class="navpad"></div>
</div>
<div class="content">
	<div class="cont_head"><?php echo($page); ?></div>
	<div class="cont">CONTENT</div>
	<div class="cont_foot">&copy; Arcath.net</div>
</div>
</body>
</html>
