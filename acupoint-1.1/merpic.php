<?php
	require('config.php');
	$con = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
	$con->query("SET NAMES UTF8");
	$result = $con->query("SELECT * FROM `meridian` WHERE 1");
	$row = $result->fetchAll();
	if(count($row)!=0){
		$j=0;
		foreach($row as $row0){
			$i=0;
			foreach($row0 as $key => $value){
				if ($key=="name" && $key!="0"){
					$send[$j][$i] = "$value";
					$i+=1;
				}
				else if ($key=="path" && $key!="0"){
					$send[$j][$i] = "$value";
					$i+=1;
				}
				else if ($key=="symptom" && $key!="0"){
					$send[$j][$i] = "$value";
					$i+=1;
				}
				else if ($key=="picture" && $key!="0"){
					$send[$j][$i] = "$value";
				}
			}
			$j+=1;
		}
	}
	echo json_encode($send, JSON_UNESCAPED_UNICODE);
	
?>