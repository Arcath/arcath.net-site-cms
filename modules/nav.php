<?php
class nav{
	function draw($menu){
		global $db, $nav;
		$out="<ul>\n";
		$result=$db->query("SELECT * FROM `{PREFIX}nav` WHERE `start` = 1 AND `menu` = $menu LIMIT 1");
		while($row=mysql_fetch_array($result)){
			$next=$row['id'];
		}		
		while($next!=0){
			$out.=$nav->linkgen($next);
			$next=$db->getvalue('next','nav','id',$next);
		}
		$out.="</ul>\n";
		return $out;
	}
	function linkgen($link){
		global $db, $nav;
		$out='<li><a href="index.php?var='.$db->getvalue('target','nav','id',$link).'">'.$db->getvalue('text','nav','id',$link).'</a>';
		if($db->has($link,'menu','nav')){
			$out.=$nav->draw($link);
		}
		$out.="</li>\n";
		return $out;
	}
}
$nav=new nav;
?>
