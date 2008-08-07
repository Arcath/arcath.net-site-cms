<?php
if($page=="logout"){
	$hash=$_COOKIE[$global['cookie']];
	setcookie($global['cookie'],0,time()-3600);
	$db->query("DELETE FROM `{PREFIX}sessions` WHERE `hash` = '$hash'");
}
?>
