<?php
	require('config.php');
	$dis[0] = "";
	$j=0;
	$acu_num = 0;
	$acu_order = [];
	$acu_order[$acu_num] = "";
	for ($i=0;$i<count($_POST['dis']);$i+=1){
		if (in_array($_POST['dis'][$i],$dis) == false){
			$dis[$j] = $_POST['dis'][$i];
			$acu_order[$acu_num] = $acu_order[$acu_num]."<a href = '#' onclick = \"redirect2page8('$dis[$j]')\">$dis[$j]</a>";
			$j+=1;
		}
	}
	$con = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
	$con->query("SET NAMES UTF8");
	for($now_dis=0;$now_dis<count($dis);$now_dis+=1){
		$sql = "SELECT match_table.acupoint,meridian FROM `match_table` WHERE match_table.symptom = \"$dis[$now_dis]\"";
		$result = $con->query($sql);
		$row = $result->fetchAll(PDO::FETCH_ASSOC);
		$i = 0;
		foreach ($row as $acu){
			foreach ($acu as $key => $value){
				if ($key == 'acupoint'){
					$acu_count[$now_dis][$i][0] = $value;
				}
				if ($key == 'meridian'){
					$acu_count[$now_dis][$i][1] = 0;
					if (strpos($dis[$now_dis],"肺") !== false || strpos($dis[$now_dis],"呼吸") !== false || strpos($dis[$now_dis],"氣管") !== false || strpos($dis[$now_dis],"鼻炎") !== false || strpos($dis[$now_dis],"扁桃體") !== false || strpos($dis[$now_dis],"咳") !== false || strpos($dis[$now_dis],"喘") !== false|| (strpos($dis[$now_dis],"鼻") !==false && strpos($dis[$now_dis],"血") !== false)){
						if ($value == "1"){
							$acu_count[$now_dis][$i][1] = 1.5;
						}
						else if($acu_count[$now_dis][$i][1] != 1.5){
							$acu_count[$now_dis][$i][1] = 1;
						}
					}
					if (strpos($dis[$now_dis],"感冒") !== false || strpos($dis[$now_dis],"發燒") !== false || strpos($dis[$now_dis],"氣管") !== false || strpos($dis[$now_dis],"頭痛") !== false ||  strpos($dis[$now_dis],"耳鳴") !== false || strpos($dis[$now_dis],"耳聾") !== false || strpos($dis[$now_dis],"咳嗽") !== false){
						if ($value == "2"){
							$acu_count[$now_dis][$i][1] = 1.5;
						}
						else if($acu_count[$now_dis][$i][1] != 1.5){
							$acu_count[$now_dis][$i][1] = 1;
						}
					}
					if (strpos($dis[$now_dis],"腹瀉") !== false || strpos($dis[$now_dis],"胃") !== false || strpos($dis[$now_dis],"腸") !== false || strpos($dis[$now_dis],"頭痛") !== false || (strpos($dis[$now_dis],"眼") !== false && strpos($dis[$now_dis],"痛") !== false) || (strpos($dis[$now_dis],"牙") !== false && strpos($dis[$now_dis],"痛") !== false) !== false || (strpos($dis[$now_dis],"面") !== false && strpos($dis[$now_dis],"麻痺") !== false)){
						if ($value == "3"){
							$acu_count[$now_dis][$i][1] = 1.5;
						}
						else if($acu_count[$now_dis][$i][1] != 1.5){
							$acu_count[$now_dis][$i][1] = 1;
						}
					}
					if (strpos($dis[$now_dis],"消化") !== false || strpos($dis[$now_dis],"便祕") !== false || strpos($dis[$now_dis],"痢") !== false || strpos($dis[$now_dis],"頭痛") !== false || strpos($dis[$now_dis],"月經") !== false || strpos($dis[$now_dis],"痛經") !== false || strpos($dis[$now_dis],"經閉") !== false){
						if ($value == "4"){
							$acu_count[$now_dis][$i][1] = 1.5;
						}
						else if($acu_count[$now_dis][$i][1] != 1.5){
							$acu_count[$now_dis][$i][1] = 1;
						}
					}
					if (strpos($dis[$now_dis],"胸") !== false || strpos($dis[$now_dis],"心") !== false || strpos($dis[$now_dis],"渴") !== false || strpos($dis[$now_dis],"手心") !== false || (strpos($dis[$now_dis],"手") !== false && strpos($dis[$now_dis],"麻") !== false) || (strpos($dis[$now_dis],"手") && strpos($dis[$now_dis],"痛")) !== false){
						if ($value == "5"){
							$acu_count[$now_dis][$i][1] = 1.5;
						}
						else if($acu_count[$now_dis][$i][1] != 1.5){
							$acu_count[$now_dis][$i][1] = 1;
						}
					}
					if ((strpos($dis[$now_dis],"肩") !== false && strpos($dis[$now_dis],"痛") !== false) || (strpos($dis[$now_dis],"背")  !== false && strpos($dis[$now_dis],"痛") !== false) || (strpos($dis[$now_dis],"頸") !== false && strpos($dis[$now_dis],"痛") !== false) || (strpos($dis[$now_dis],"關節") !== false && strpos($dis[$now_dis],"痛") !== false) || strpos($dis[$now_dis],"臉")  !== false || strpos($dis[$now_dis],"耳") !== false){
						if ($value == "6"){
							$acu_count[$now_dis][$i][1] = 1.5;
						}
						else if($acu_count[$now_dis][$i][1] != 1.5){
							$acu_count[$now_dis][$i][1] = 1;
						}
					}
					if (strpos($dis[$now_dis],"感冒") !== false || strpos($dis[$now_dis],"發燒") !== false || strpos($dis[$now_dis],"喘") !== false || strpos($dis[$now_dis],"肺炎") !== false || strpos($dis[$now_dis],"消化") !== false || strpos($dis[$now_dis],"痢") !== false || strpos($dis[$now_dis],"胃下垂") !== false || strpos($dis[$now_dis],"肝炎") !== false){
						if ($value == "7"){
							$acu_count[$now_dis][$i][1] = 1.5;
						}
						else if($acu_count[$now_dis][$i][1] != 1.5){
							$acu_count[$now_dis][$i][1] = 1;
						}
					}
					if (strpos($dis[$now_dis],"骨") !== false || strpos($dis[$now_dis],"牙") !== false || strpos($dis[$now_dis],"耳") !== false || strpos($dis[$now_dis],"腰") !== false || strpos($dis[$now_dis],"泌尿") !== false || strpos($dis[$now_dis],"陽痿") !== false || strpos($dis[$now_dis],"遺精") !== false || strpos($dis[$now_dis],"痛經") !== false || strpos($dis[$now_dis],"頭痛") !== false){
						if ($value == "8"){
							$acu_count[$now_dis][$i][1] = 1.5;
						}
						else if($acu_count[$now_dis][$i][1] != 1.5){
							$acu_count[$now_dis][$i][1] = 1;
						}
					}
					if ((strpos($dis[$now_dis],"心") !== false && strpos($dis[$now_dis],"不整") !== false) || strpos($dis[$now_dis],"心悸") !== false || (strpos($dis[$now_dis],"心") !== false && strpos($dis[$now_dis],"失常") !== false)){
						if ($value == "9"){
							$acu_count[$now_dis][$i][1] = 1.5;
						}
						else if($acu_count[$now_dis][$i][1] != 1.5){
							$acu_count[$now_dis][$i][1] = 1;
						}
					}
					if (strpos($dis[$now_dis],"內分泌") !== false || strpos($dis[$now_dis],"鬱") !== false || strpos($dis[$now_dis],"更年期") !== false || strpos($dis[$now_dis],"耳痛") !== false ||(strpos($dis[$now_dis],"偏") !== false && strpos($dis[$now_dis],"頭痛") !== false) || strpos($dis[$now_dis],"耳鳴") != false|| strpos($dis[$now_dis],"耳聾") !== false){
						if ($value == "10"){
							$acu_count[$now_dis][$i][1] = 1.5;
						}
						else if($acu_count[$now_dis][$i][1] != 1.5){
							$acu_count[$now_dis][$i][1] = 1;
						}
					}
					if ((strpos($dis[$now_dis],"膽囊") !== false && strpos($dis[$now_dis],"炎") !== false) || (strpos($dis[$now_dis],"偏") !== false && strpos($dis[$now_dis],"炎") !== false) || (strpos($dis[$now_dis],"頭痛") !== false && strpos($dis[$now_dis],"炎") !== false) || strpos($dis[$now_dis],"頭昏") !== false || strpos($dis[$now_dis],"近視") !== false){
						if ($value == "11"){
							$acu_count[$now_dis][$i][1] = 1.5;
						}
						else if($acu_count[$now_dis][$i][1] != 1.5){
							$acu_count[$now_dis][$i][1] = 1;
						}
					}
					if (strpos($dis[$now_dis],"精") !== false || strpos($dis[$now_dis],"肝") !== false || strpos($dis[$now_dis],"月經") !== false || strpos($dis[$now_dis],"痛經") !== false || strpos($dis[$now_dis],"經閉") !== false){
						if ($value == "12"){
							$acu_count[$now_dis][$i][1] = 1.5;
						}
						else if($acu_count[$now_dis][$i][1] != 1.5){
							$acu_count[$now_dis][$i][1] = 1;
						}
					}
					if (strpos($dis[$now_dis],"遺尿") !== false || strpos($dis[$now_dis],"遺精") !== false || (strpos($dis[$now_dis],"胃") !== false && strpos($dis[$now_dis],"脹") !== false) || (strpos($dis[$now_dis],"胃") !== false && strpos($dis[$now_dis],"痛") !== false) || (strpos($dis[$now_dis],"腹") !== false && strpos($dis[$now_dis],"脹") !== false) || (strpos($dis[$now_dis],"腸") !== false && strpos($dis[$now_dis],"脹") !== false) || strpos($dis[$now_dis],"疝氣") !== false || strpos($dis[$now_dis],"呃逆") !== false){
						if ($value == "13"){
							$acu_count[$now_dis][$i][1] = 1.5;
						}
						else if($acu_count[$now_dis][$i][1] != 1.5){
							$acu_count[$now_dis][$i][1] = 1;
						}
					}
					if (strpos($dis[$now_dis],"遺精") !== false || strpos($dis[$now_dis],"白帶") !== false || (strpos($dis[$now_dis],"氣") !== false && strpos($dis[$now_dis],"喘") !== false) || strpos($dis[$now_dis],"癲癇") !== false || (strpos($dis[$now_dis],"腰") !== false && strpos($dis[$now_dis],"痛") !== false) || strpos($dis[$now_dis],"啞") !== false || strpos($dis[$now_dis],"耳聾") !== false || strpos($dis[$now_dis],"頭痛") !== false){
						if ($value == "14"){
							$acu_count[$now_dis][$i][1] = 1.5;
						}
						else if($acu_count[$now_dis][$i][1] != 1.5){
							$acu_count[$now_dis][$i][1] = 1;
						}
					}
					if($acu_count[$now_dis][$i][1] == 0){
						$acu_count[$now_dis][$i][1] = 1;
					}
				}
			}
			$i+=1;
		}
	}
	$order_acu = [];
	$acu_point = [];
	$plus = [];
	for ($i = 0;$i < count($dis);$i+=1){
		for($j = 0;$j < count($acu_count[$i]);$j+=1){
			$match = 0;
			for ($k = 0;$k < count($order_acu);$k+=1){
				if($order_acu[$k] == $acu_count[$i][$j][0]){
					$acu_point[$k] += $acu_count[$i][$j][1];
					if($acu_count[$i][$j][1] == 1.5){
						$plus[$k] = 1;
					}
					$match = 1;
					break;
				}
				
			}
			if ($match == 0){
					array_push($order_acu,$acu_count[$i][$j][0]);
					array_push($acu_point,$acu_count[$i][$j][1]);
					if($acu_count[$i][$j][1] == 1.5){
						
						array_push($plus,1);
					}
					else{
						array_push($plus,0);
					}
			}
		}
	}
	$point = count($dis) * 1.5;
	$control = 1;
	$acu_result = [];
	while($point > 0.5){
		for($pt = 0;$pt <count($acu_point);$pt+=1){
			if ($acu_point[$pt] == $point && $plus[$pt] == 1 && $control == 0){
				array_push($acu_result, $order_acu[$pt]);
			}
			else if($acu_point[$pt] == $point && $plus[$pt] == 0 && $control == 1){
				array_push($acu_result, $order_acu[$pt]);
			}
		}
		if($control == 1){
			$control = 0;
		}
		else{
			$control = 1;
			$point -= 0.5;
		}
	}
	$acu_num+=1;
	$acu_order[$acu_num] = "";
	foreach ($acu_result as $acu){
		if ($acu_order[$acu_num]==""){
			$acu_order[$acu_num] = "<li><a href = '#' onclick = \"redirect2page5('$acu')\">".$acu."</a></li>";
		}
		else{
			$acu_order[$acu_num] = $acu_order[$acu_num]."<li><a href = '#' onclick = \"redirect2page5('$acu')\">".$acu."</a></li>";
		}
	}
	$acu_num+=1;
	$acu_order[$acu_num] = "";
	$con = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
	$con->query("SET NAMES UTF8");
	for($now_dis=0;$now_dis<count($dis);$now_dis+=1){
		$result = $con->query("SELECT `liketo` FROM `distancelike` WHERE symptom = '$dis[$now_dis]'");
		$row = $result->fetchColumn();
		if ($row!=false){
			if ($acu_order[$acu_num] == ""){
				$acu_order[$acu_num] = "<li><span class='opener'>除了$dis[$now_dis]你可能也想知道</span><ul>";
			}
			else{
				$acu_order[$acu_num] = $acu_order[$acu_num]."<li><span class='opener'>除了$dis[$now_dis]你可能也想知道</span><ul>";
			}
			$new_row = explode("，",$row);
			foreach($new_row as $near_dis){
				if ($acu_order[$acu_num] == ""){
					$acu_order[$acu_num] = "<li><a href = '#' onclick = \"redirect2page8('$near_dis')\">".$near_dis."</a></li>";
				}
				else{
					$acu_order[$acu_num] = $acu_order[$acu_num]."<li><a href = '#' onclick = \"redirect2page8('$near_dis')\">".$near_dis."</a></li>";
				}
			}
		}
		if ($acu_order[$acu_num]!=""){
			$acu_order[$acu_num] = $acu_order[$acu_num]."</ul></li>";
		}
	}
	echo json_encode($acu_order, JSON_UNESCAPED_UNICODE);
?>