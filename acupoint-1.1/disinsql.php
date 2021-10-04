<?php
	require('config.php');
	$give_dis = $_POST['nickname'];
	$con = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
	$con->query("SET NAMES UTF8");
	$result0 = $con->query("SELECT `symptom` FROM `disease_id` WHERE symptom = '$give_dis'");
	$row0 = $result0->fetchColumn();
	if ($row0 == false){
		$in_list = 0;
		$false_all = 0;
		$pre_commend[$in_list] = "";
		for($i=0;$i<mb_strlen($give_dis, "utf-8");$i+=1){
			$temp = mb_substr($give_dis,$i,1,"utf-8");
			$temp = "%".$temp."%";
			$con = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
			$con->query("SET NAMES UTF8");
			$result = $con->query("SELECT `symptom` FROM `disease_id` WHERE symptom LIKE '$temp'");
			$row = $result->fetchAll();
			if($row!=false){
				foreach ($row as $dis){
					foreach ($dis as $key => $value){
						if ($key == 'symptom' && $key!='0' && $i==0){
							$pre_commend[$in_list] = $value;
							$number[$in_list] = 1;
							$in_list += 1;
						}
						else if($key == 'symptom' && $key!='0'){
							$no_have = 0;
							for ($have = 0;$have<count($pre_commend);$have+=1){
								if ($pre_commend[$have] == $value){
									$no_have = 1;
									break;
								}
							}
							if ($no_have == 0){
								$pre_commend[$in_list] = $value;
								$number[$in_list] = 1;
								$in_list += 1;
							}
							else{
								$number[$have] += 1;
							}
						}
					}
				}
			}
			else{
				$false_all += 1;
			}
		}
		if($false_all != mb_strlen($give_dis, "utf-8")){
			for ($j = 0;$j<count($pre_commend);$j+=1){
				$str_value[$j] = $number[$j] / (mb_strlen($pre_commend[$j]) + mb_strlen($give_dis) - $number[$j]);
			}
			for($i = 0;$i<count($pre_commend) - 1;$i+=1){
				for($j = 0;$j < count($pre_commend) - 1 - $i;$j+=1){
					if($str_value[$j] < $str_value[$j+1]){
						$temp = $pre_commend[$j];
						$pre_commend[$j] = $pre_commend[$j+1];
						$pre_commend[$j+1] = $temp;
						$temp2 = $str_value[$j];
						$str_value[$j] = $str_value[$j+1];
						$str_value[$j+1] = $temp2;
					}
				}
			}
			if ($pre_commend[0]!=""){
			echo json_encode($pre_commend, JSON_UNESCAPED_UNICODE);
			}
			else{
				echo "no";
			}
		}
		else{
			echo "no";
		}
		
	}
	else{
		echo "success";
	}
?>