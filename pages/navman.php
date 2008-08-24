<?php
function output(){
	global $db, $nav;
	$out=menu(0);
	return $out;
}

function menu($menu){
	global $db;
	$out="<ul>\n";
	$result=$db->query("SELECT * FROM `{PREFIX}nav` WHERE `menu` = $menu AND `start` = 1");
	while($row=mysql_fetch_array($result)){
		$next=$row['id'];
	}
	while($next!=0){
		$out.="<li><a href=\"?var=navedit&link=$next\">".$db->getvalue('text','nav','id',$next)."</a></li>\n";
		if($db->has($next,'menu','nav')){
			$out.=menu($next);
		}
		$next=$db->getvalue('next','nav','id',$next);
	}
	$out.="</ul>\n";
	return $out;
}

?>
