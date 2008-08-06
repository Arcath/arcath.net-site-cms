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
?>
