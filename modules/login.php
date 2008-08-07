<?php
if($page=="loginsub"){
	$user=$_POST['uname'];
	$pass=md5($_POST['pass']);
	if($db->has($user,'name','users')){
		if($pass==$db->getvalue('pass','users','name',$user)){
			$msg="Welcome Back $user!";
			$hash=md5(microtime());
			$time=time();
			$ip=$_SERVER['REMOTE_ADDR'];
			$userid=$db->getvalue('id','users','name',$user);
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
