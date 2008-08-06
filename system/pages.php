<?php
//Page file
class page{
	function show($show){
		global $page, $db;
		$file=$db->getvalue('file','pages','sname',$show);
		if(isset($file)){
			include('pages/'.$file);
			$out=output();
		}else{
			$out=$db->getvalue('content','pages','sname',$show);
		}
		return $out;
	}
}
$content=new page;
?>
