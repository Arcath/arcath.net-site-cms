<?php
//Arcath.net DB CONNECTOR
Class db{
	function connect($host,$user,$pass,$base){
		mysql_connect($host,$user,$pass);
		mysql_select_db($base);
		return true;
	}

	function query($q){
		global $global;
		$query=str_replace('{PREFIX}',$global['db']['pref'],$q);
		$result=mysql_query($query);
		if(!$result){
			$result="MYSQL Error: ".mysql_error();
		}
		return $result;
	}
	function has($value,$field,$table){
		global $db;
		if(mysql_num_rows($db->query("SELECT * FROM `{PREFIX}$table` WHERE `$field` = '$value'"))==0){
			$out=false;
		}else{
			$out=true;
		}
		return $out;
	}
	function getvalue($field,$table,$idfield,$idvalue){
		global $db;
		$out=false;
		$result=$db->query("SELECT * FROM `{PREFIX}$table` WHERE `$idfield` = '$idvalue' LIMIT 1");
		while($row=mysql_fetch_array($result)){
			$out=$row[$field];
		}
		return $out;;
	}	
}
$db=new db;
$db->connect('localhost','cms','arcath','cms');
?>
