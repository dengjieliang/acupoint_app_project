<?php
	require('config.php');
	$dis = $_POST['dis'];
	$i=0;
	$send[$i] = "<div style='font-weight:bold;font-size:36px'>$dis</span>";
	$i+=1;
	$send[$i] = "";
	$con = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
	$con->query("SET NAMES UTF8");
	$result = $con->query("SELECT * FROM `match_table` WHERE symptom = '$dis'");
	$row = $result->fetchAll();
	foreach($row as $row0){
		foreach($row0 as $key => $value){
			if ($key=="acupoint" && $key!="0"){
				if($send[$i]!=""){
					$send[$i] = $send[$i]."<li><a href = '#' onclick = \"redirect2page5('$value');\">".$value."</a></li>";
				}
				else{
					$send[$i] = "<li><span class = 'opener'>按摩穴</span><ul class='dis_show2'><li><a href = '#' onclick = \"redirect2page5('$value')\">".$value."</a></li>";
				}
			}
		}
	}
	$send[$i] = $send[$i]."</ul></li>";
	$i+=1;
	$send[$i] = "";
	$con = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
	$con->query("SET NAMES UTF8");
	$result = $con->query("SELECT * FROM `recipes_mix_final` WHERE `symptom` = '$dis'");
	$row = $result->fetchAll();
	foreach($row as $row0){
		foreach($row0 as $key => $value){
			if ($key=="name" && $key!="0"){
				if($send[$i]!="" && $value!=""){
					$send[$i] = $send[$i].'<br>'.$value.':'."<br>";
				}
				else if ($value!=""){
					$send[$i] = "<li><span class = 'opener'>食譜</span><ul class='dis_show4'>$value:"."<br>";
				}
			}
			else if ($key=="recipe" && $key!="0"){
				if($send[$i]!="" and $value!=""){
					$send[$i] = $send[$i].$value;
				}
				else if ($value!=""){
					$send[$i] = "<li><span class = 'opener'>食譜</span><ul class='dis_show4'>$value:";
				}
			}
		}
	}
	$send[$i] = $send[$i]."</ul></li>";
	$i+=1;
	$send[$i] = "";
	$con = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
	$con->query("SET NAMES UTF8");
	$result = $con->query("SELECT `habbit` FROM `disease_id` WHERE `symptom` = '$dis'");
	$row = $result->fetchAll();
	foreach($row as $row0){
		foreach($row0 as $key => $value){
			if ($key=="habbit" && $key!="0"){
				$temp = explode("。",$value);
				$temp = str_replace("：",":<br>",$temp);
				if($send[$i]!=""){
					foreach($temp as $inreplace){
						$send[$i] = $send[$i].'<br>'.$inreplace."。";
					}
				}
				else{
					$send[$i] =  "<li><span class = 'opener'>可注意的日常生活習慣</span><ul class='dis_show3'>$temp[0]";
					foreach($temp as $inreplace){
						if ($inreplace!=$temp[0]){
							$send[$i] = $send[$i].'<br>'.$inreplace."。";
						}
					}
				}
			}
		}
	}
	$send[$i] = rtrim($send[$i],"。");
	if ($send[$i]!=""){
		$send[$i] = $send[$i]."</ul></li>";
	}
	echo json_encode($send, JSON_UNESCAPED_UNICODE);
?>