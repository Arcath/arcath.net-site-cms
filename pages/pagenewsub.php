<?php
function output(){
	global $db;
	$title=$_POST['title'];
	$sname=$_POST['sname'];
	$file=$_POST['file'];
	$content=$_POST['content'];
	$db->query("INSERT INTO `{PREFIX}pages` (`title`,`file`,`content`,`sname`) VALUES ('$title','$file','$content','$sname');");
	$guest=$_POST[0];
	$pageid=$db->getvalue('id','pages','sname',$sname);
	$db->query("INSERT INTO `{PREFIX}page_permissions` (`page`,`group`,`cansee`) VALUES ('$pageid','0','$guest');");
	$result=$db->query("SELECT * FROM `{PREFIX}groups`");
	while($row=mysql_fetch_array($result)){
		$id=$row['id'];
		$val=$_POST[$id];
		$db->query("INSERT INTO `{PREFIX}page_permissions` (`page`,`group`,`cansee`) VALUES ('$pageid','$id','$val');");
	}
	$out="Page Added";
	return $out;
}
?>
