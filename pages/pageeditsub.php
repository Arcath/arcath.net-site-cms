<?php
function output(){
	global $db;
	$osname=$_POST['osname'];
	$title=$_POST['title'];
	$sname=$_POST['sname'];
	$file=$_POST['file'];
	$content=$_POST['content'];
	$db->query("UPDATE `{PREFIX}pages` SET `title` = '$title', `sname` = '$sname', `file` = '$file', `content` = '$content' WHERE `sname` = '$osname'");
	$guest=$_POST[0];
	$pageid=$db->getvalue('id','pages','sname',$osname);
	$db->query("UPDATE `{PREFIX}page_permissions` SET `cansee` = '$guest' WHERE `page` = '$pageid' AND `group` = '0'");
	$result=$db->query("SELECT * FROM `{PREFIX}groups`");
	while($row=mysql_fetch_array($result)){
		$val=$_POST[$row['id']];
		$id=$row['id'];
		$db->query("UPDATE `{PREFIX}page_permissions` SET `cansee` = '$val' WHERE `page` = '$pageid' AND `group` = '$id'");
	}
	$out="Page Updated!";
	return $out;	
}
?>
