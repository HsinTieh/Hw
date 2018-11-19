<?php
	include("mysql.inc.php");

    //執行query語法
/*	for($i=0;$i<30;$i++)
	{
		$light=rand(0,100);
		$humi=rand(0,100);
		$temp=rand(0,100);
		$status=rand(0,1);
		$sql = "INSERT INTO lights(light,humi,temp,status) VALUES($light,$humi,$temp,$status)";

		$result = mysqli_query($con,$sql);
	}*/
	//$status=rand(0,100);
	//	$sql = "INSERT INTO school(value, address) VALUES($status, '中山大學')";

	//	$result = mysqli_query($con,$sql);
	//$status=rand(0,100);
	//	$sql = "INSERT INTO school(value,address) VALUES($status, '中正大學')";

	//	$result = mysqli_query($con,$sql);
	$tableName="school";
    //資料庫Sql query語法
    $sql = "SELECT * FROM $tableName"; //WHERE address = $address";

    //執行query語法
    $result = mysqli_query($con,$sql);

    //取出資料
    $data=array();
    while ($row = mysqli_fetch_array($result)){
      array_push($data, $row);
    }

    //輸出並且轉成json格式
    echo json_encode($data);
?>
