<?php
if($page=="loginsub"){
	$uname=$_POST['uname'];
	$pass=md5($_POST['pass']);
	if($db->has($uname,'name','users')){
		if($pass==$db->getvalue('pass','users','name',$uname)){
			$msg="Welcome Back $uname!";
			$hash=md5(microtime());
			$time=time();
			$ip=$_SERVER['REMOTE_ADDR'];
			$userid=$db->getvalue('id','users','name',$uname);
			setcookie($global['cookie'],$hash,$time+86400);
			$db->query("INSERT INTO `{PREFIX}sessions` (`hash`,`user`,`time`,`ip`) VALUES ('$hash',$userid,$time,'$ip');");
		}else{
			$msg="The Password you entered was incorrect";
		}
	}else{
		$msg="That user does not exist";
	}
}
?>
