<?php
//Page file
class page{
	function show($show){
		global $page, $db;
		$file=$db->getvalue('file','pages','sname',$show);
		if($file!=""){
			include('pages/'.$file);
			$out=output();
		}else{
			$out=$db->getvalue('content','pages','sname',$show);
		}
		return $out;
	}
	function title($show){
		global $db;
		$out=$db->getvalue('title','pages','sname',$show);
		if($out==""){
			$out="Error 404";
		}
		return $out;
	}
}
$content=new page;
?>
