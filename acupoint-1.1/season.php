<?php
	require('config.php');
	$month = date("n");
	$day = date("j");
	$month = (int)$month;
	$day = (int)$day;
	if ($month == 2){
		if($day <=3){
			$name = "大寒";
		}
		else if($day >= 4 && $day<=19){
			$name = "立春";
		}
		else{
			$name = "雨水";
		}
	}
	else if($month == 3){
		if($day <=4){
			$name = "雨水";
		}
		else if($day >= 5 && $day<=20){
			$name = "驚蟄";
		}
		else{
			$name = "春分";
		}
	}
	else if($month == 4){
		if($day <=4){
			$name = "春分";
		}
		else if($day >= 5 && $day<=19){
			$name = "清明";
		}
		else{
			$name = "穀雨";
		}
	}
	else if($month == 5){
		if($day <=4){
			$name = "穀雨";
		}
		else if($day >= 5 && $day<=20){
			$name = "立夏";
		}
		else{
			$name = "小滿";
		}
	}
	else if($month == 6){
		if($day <=5){
			$name = "小滿";
		}
		else if($day >= 5 && $day<=20){
			$name = "芒種";
		}
		else{
			$name = "夏至";
		}
	}
	else if($month == 7){
		if($day <=6){
			$name = "夏至";
		}
		else if($day >= 7 && $day<=22){
			$name = "小暑";
		}
		else{
			$name = "大暑";
		}
	}
	else if($month == 8){
		if($day <=6){
			$name = "大暑";
		}
		else if($day >= 7 && $day<=22){
			$name = "立秋";
		}
		else{
			$name = "處暑";
		}
	}
	else if($month == 9){
		if($day <=7){
			$name = "處暑";
		}
		else if($day >= 8 && $day<=22){
			$name = "白露";
		}
		else{
			$name = "秋分";
		}
	}
	else if($month == 10){
		if($day <=7){
			$name = "秋分";
		}
		else if($day >= 8 && $day<=22){
			$name = "寒露";
		}
		else{
			$name = "霜降";
		}
	}
	else if($month == 11){
		if($day <=6){
			$name = "霜降";
		}
		else if($day >= 7 && $day<=21){
			$name = "立冬";
		}
		else{
			$name = "小雪";
		}
	}
	else if($month == 12){
		if($day <=6){
			$name = "小雪";
		}
		else if($day >= 7 && $day<=21){
			$name = "大雪";
		}
		else{
			$name = "冬至";
		}
	}
	else if($month == 1){
		if($day <=4){
			$name = "冬至";
		}
		else if($day >= 5 && $day<=19){
			$name = "小寒";
		}
		else{
			$name = "大寒";
		}
	}
	$i = 0;
	$season_in[$i] = "";
	$con = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
	$con->query("SET NAMES UTF8");
	$result = $con->query("SELECT * FROM `season` WHERE season_name = '$name'");
	$row = $result->fetchAll();
	foreach($row as $row0){
		foreach($row0 as $key => $value){
			if ($key=="season_name" && $key!="0"){
				$season_in[$i] = $value;
				$i+=1;
			}
			else if ($key=="season_time" && $key!="0"){
				$season_in[$i] = $value;
				$i+=1;
			}
			else if ($key=="introduction" && $key!="0"){
				$season_in[$i] = $value;
				$i+=1;
			}
			else if ($key=="acupoint" && $key!="0"){
				$season_in[$i] = "";
				$temp = explode("、",$value);
				foreach($temp as $tmp){
					$tmp = str_replace("\n","",$tmp);
					if ($season_in[$i] == ""){
						$season_in[$i] = "<li><a href = '#' onclick = \"redirect2page5('$tmp')\">".$tmp."</a></li>";
					}
					else{
						$season_in[$i] = $season_in[$i]."<li><a href = '#' onclick = \"redirect2page5('$tmp')\">".$tmp."</a></li>";
					}
				}
			}
		}
	}
	echo json_encode($season_in, JSON_UNESCAPED_UNICODE);
	
?>