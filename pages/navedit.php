<?php
function output(){
	global $db;
	$link=$_GET['link'];
	$out="<form action=\"?var=naveditsub\" method=\"POST\">
<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
<tr>
<td>Text</td>
<td><input type=\"text\" name=\"text\" width=\"20\" maxchars=\"255\" value=\"".$db->getvalue('text','nav','id',$link)."\" /></td>
</tr>
<tr>
<td>Target</td>
<td><select name=\"target\">\n";
	$result=$db->query("SELECT * FROM `{PREFIX}pages` ORDER BY `title` ASC");
	while($row=mysql_fetch_array($result)){
		if($row['sname']==$db->getvalue('target','nav','id',$link)){
			$sel="SELECTED";
		}else{
			$sel="";
		}
		$out.="<option value=\"".$row['sname']."\" $sel>".$row['title']."</option>\n";
	}
	$out.="</select></td>
</tr>
<tr>
<td>Menu</td>
<td><select name=\"menu\">\n";
	if($db->getvalue('menu','nav','id',$link)==0){
		$sel="SELECTED";
	}else{
		$sel="";
	}
	$out.="<option value=\"0\" $sel>Root Menu</option>\n";
	$result=$db->query("SELECT * FROM `{PREFIX}nav` WHERE `menu` = 0 ORDER BY `text` ASC");
	while($row=mysql_fetch_array($result)){
		if($row['id']==$db->getvalue('menu','nav','id',$link)){
			$sel="SELECTED";
		}else{
			$sel="";
		}
		$out.="<option value=\"".$row['id']."\" $sel>".$row['text']."</option>\n";
	}
	$out.="</select></td>
</tr>
<tr>
<td>Position:</td>
<td><select name=\"next\">
<option value=\"START\">Start of the list</option>\n";
	$menu=$db->getvalue('menu','nav','id',$link);
	$result=$db->query("SELECT * FROM `{PREFIX}nav` WHERE `menu` = $menu AND `start` = 1 LIMIT 1");
	while($row=mysql_fetch_array($result)){
		$out.=startat($row['id'],$link);
	}
	$out.="</select></td>
</tr>
<tr>
<td></td>
<td><input type=\"submit\" value=\"Save\" /></td>
</tr>
</table>";
	return $out;
}

function startat($id,$want){
	global $db;
	if($id==0){
		$out="<option value=\"END\">Last Link</option>\n";
	}else{
		$text=$db->getvalue('text','nav','id',$id);
		if($id==$want){
			$sel="SELECTED";
		}
		$out="<option value=\"$id\" $sel>Before \"$text\"</option>\n";
		$next=$db->getvalue('next','nav','id',$id);
		$out.=startat($next,$want);
	}
	return $out;
}
?>
