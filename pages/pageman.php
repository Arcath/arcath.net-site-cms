<?php
function output(){
	global $db;
	$out="<a href=\"?var=pagenew\">Add a Page</a><br />\n<br />\n";
	$out.="All Pages:<br />
<br />";
	$result=$db->query("SELECT * FROM `{PREFIX}pages` ORDER BY `title` ASC");
	while($row=mysql_fetch_array($result)){
		$out.="<a href=\"?var=pageedit&page=".$row['sname']."\">".$row['title']."</a><br />";
	}
	return $out;	
}
?>
