<?php
//------------------------------
// Arcath.net CMS
// load.php
//------------------------------
//Database Connection
include('system/db.php');
//GlobalVars
$global['db']['pref']='cms_';
//Load from DB
$result=$db->query("SELECT * FROM {PREFIX}system");
while($row=mysql_fetch_array($result)){
	$global[$row['name']]=$row['value'];
}
//UMS and Pages
include('system/ums.php');
include('system/pages.php');
//Load Modules
$files=opendir("modules");
while($file=readdir($files)){
	if($file!="." && $file!=".."){
		include('modules/'.$file);
	}
}
?>
