<?php 
	if(isset($_COOKIE["login"])){
		    header("Location: googlemap.php"); //�N���}�אּ�n�ɤJ���n�J����
    }
    else{ 
		header("Location: login.html");
	}
?>
