<?php
function output(){
	global $db, $global;
	$code=$_SESSION['code'];
	$uname=$_POST['uname'];
	$pass1=$_POST['pass1'];
	$pass2=$_POST['pass2'];
	$email1=$_POST['email1'];
	$email2=$_POST['email2'];
	$subcode=$_POST['code'];
	$errors="";
	if($db->has($uname,'name','users')){
		$errors.="That Username has already been taken<br />\n";
	}
	if($email1!=$email2){
		$errors.="The Email addresses you entered did not match<br />\n";
	}else{
		$email=$email1;
	}
	if($pass1!=$pass2){
		$errors.="The passwords you entered did not match<br />\n";
	}else{
		$pass=md5($pass1);
	}
	if($subcode!=$code){
		$errors.="The code you entered did not match the one displayed (you entered $subcode and i wanted $code)<br />\n";
	}
	if($errors==""){
		//Add to DB
		$db->query("INSERT INTO `{PREFIX}users` (`name`,`pass`,`email`,`group`) VALUES ('$uname','$pass','$email',".$global['reg2'].");");
		$out="Thank You for Registering! you may now login!";
	}else{
		//Print Errors
		$out="There was some problems with your registration:<br />\n$errors Please go back and try again";
	}
	return $out;
}
?>
