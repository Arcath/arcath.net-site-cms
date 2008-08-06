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
<div class="top"><img src="images/banner.gif" /><?php echo(topbox()); ?></div>
<div class="nav">
<?php echo($nav->draw(0)); ?>
<div class="navpad"></div>
</div>
<div class="content">
	<div class="cont_head"><?php echo($page); ?></div>
	<div class="cont">CONTENT</div>
	<div class="cont_foot">&copy; Arcath.net</div>
</div>
</body>
</html>
