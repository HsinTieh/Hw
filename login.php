<?php
	session_start();
	date_default_timezone_set('Asia/Taipei');
	include("mysql.inc.php");
	
		
	$userid = isset($_POST["user_id"]) ? $_POST["user_id"] : $_GET["user_id"]; 
	$password = isset($_POST["user_password"]) ? $_POST["user_password"] : $_GET["user_password"]; 

	$sql="SELECT id,password,login FROM account_management WHERE id = '$userid' ";
	$stmt=mysqli_prepare($connect_login,$sql);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt,$o_id,$o_password,$o_login);
	mysqli_stmt_fetch($stmt);
	mysqli_stmt_close($stmt);
			
	if($userid==$o_id && $password==$o_password)
	{

		$o_login+=1;
		
		$sql="UPDATE account_management SET login='$o_login' WHERE id = '$o_id' ";
		mysqli_query($connect_login,$sql);

		setcookie("login",'USER', time()+3600);
		//header("Location: googlemap.php"); //將網址改為登入成功後要導向的頁面

		echo 'success';

	}
	else if($userid==$o_id)
	{
		 echo 'notpassword';
	}
	else
	{
		echo 'nodata';
	}
	
	
?>