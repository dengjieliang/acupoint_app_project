<?php
	require('config.php');
	function rgb($x,$y, $img){
		try {
			$im = ImageCreateFromPng($img);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		$rgb = ImageColorAt($im, $x, $y);
		$r = ($rgb >> 16) & 0xFF;
		$g = ($rgb >> 8) & 0xFF;
		$b = $rgb & 0xFF;
		return array($r,$g,$b);
	}

	$realx = $_POST['ImgWidth'];
	$realy = $_POST['ImgHeight'];
	$touchx = $_POST['Touchx'];
	$touchy = $_POST['Touchy'];
	
	$side = $_POST['Side'];

	$scale_x = 612/$realx;
	$scale_y = 1274/$realy;

	$x = (int)$touchx * $scale_x;
	$y = (int)$touchy * $scale_y;
	

	if($side == "正"){
		$side_search = "front";
		if($x<309){
			$x = 309 + (309-$x);
		}
		$img = "C:\\xampp\\htdocs\\acupoint-1.1\\images\\front.png";
		$rgb_result = rgb($x, $y, $img);
		if($rgb_result[0] == 239 && $rgb_result[1] == 0 && $rgb_result[2] == 0){
			$merid = "14";//任脈
		}
		else if($rgb_result[0] == 240 && $rgb_result[1] == 158 && $rgb_result[2] == 75){
			$merid = "2";//手陽明大腸經
		}
		else if($rgb_result[0] == 0 && $rgb_result[1] == 129 && $rgb_result[2] == 209){
			$merid = "1";//手太陰肺經
		}
		else if($rgb_result[0] == 247 && $rgb_result[1] == 75 && $rgb_result[2] == 227){
			$merid = "9";//手厥陰心包經
		}
		else if($rgb_result[0] == 0 && $rgb_result[1] == 232 && $rgb_result[2] == 196){
			$merid = "5";//手少陰心經
		}
		else if($rgb_result[0] == 0 && $rgb_result[1] == 233 && $rgb_result[2] == 97){
			$merid = "11";//足少陽膽經
		}
		else if($rgb_result[0] == 246 && $rgb_result[1] == 78 && $rgb_result[2] == 85){
			$merid = "3";//足陽明胃經
		}
		else if($rgb_result[0] == 229 && $rgb_result[1] == 227 && $rgb_result[2] == 91){
			$merid = "4";//足太陰脾經
		}
		else if($rgb_result[0] == 228 && $rgb_result[1] == 227 && $rgb_result[2] == 55){
			$merid = "12";//足厥陰肝經
		}
		else if($rgb_result[0] == 138 && $rgb_result[1] == 85 && $rgb_result[2] == 237){
			$merid = "8";//足少陰腎經
		}
		else if($rgb_result[0] == 255 && $rgb_result[1] == 255 && $rgb_result[2] == 255){
			$merid = -1;
		}
		else{
			$k = 3;
			while($k < 9){
				$around = [];
				for($i = 1;$i < (k * k + 1);$i+=1){
					if($k == 3){
						if(($i%3) == 1){
							$rgb_result1 = rgb(($x - 1), ($y - 2 + ($i/3) + 1), $img);
						}
						else if(($i%3) == 2){
							if($i != 5){
								$rgb_result1 = rgb(($x), ($y - 2 + ($i/3) + 1), $img);
							}
						}
						else if(($i%3) == 0){
							$rgb_result1 = rgb(($x + 1), ($y - 2 + ($i/3)), $img);
						}
					}
					else if($k == 5){
						if(($i%5) == 1){
							$rgb_result1 = rgb(($x - 2), ($y - 3 + ($i/5) + 1), $img);
						}
						else if(($i%5) == 2){
							$rgb_result1 = rgb(($x - 1), ($y - 3 + ($i/5) + 1), $img);
						}
						else if(($i%5) == 3){
							if($i != 13){
								$rgb_result1 = rgb($x, ($y - 3 + ($i/5) + 1), $img);
							}
						}
						else if(($i%5) == 4){
							$rgb_result1 = rgb(($x + 1), ($y - 3 + ($i/5) + 1), $img);
						}
						else if(($i%5) == 0){
							$rgb_result1 = rgb(($x + 2), ($y - 3 + ($i/5)), $img);
						}
					}
					else if($k == 7){
						if(($i%7) == 1){
							$rgb_result1 = rgb(($x - 3), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 2){
							$rgb_result1 = rgb(($x - 2), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 3){
							$rgb_result1 = rgb(($x - 1), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 4){
							if($i != 18){
								$rgb_result1 = rgb($x, ($y - 4 + ($i/7) + 1), $img);
							}
						}
						else if(($i%7) == 5){
							$rgb_result1 = rgb(($x + 1), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 6){
							$rgb_result1 = rgb(($x + 2), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 0){
							$rgb_result1 = rgb(($x + 3), ($y - 4 + ($i/7)), $img);
						}
					}
					if($rgb_result1[0] == 239 && $rgb_result1[1] == 0 && $rgb_result1[2] == 0){
						$merid = "14";//任脈
					}
					else if($rgb_result1[0] == 240 && $rgb_result1[1] == 158 && $rgb_result1[2] == 75){
						$merid = "2";//手陽明大腸經
					}
					else if($rgb_result1[0] == 0 && $rgb_result1[1] == 129 && $rgb_result1[2] == 209){
						$merid = "1";//手太陰肺經
					}
					else if($rgb_result1[0] == 247 && $rgb_result1[1] == 75 && $rgb_result1[2] == 227){
						$merid = "9";//手厥陰心包經
					}
					else if($rgb_result1[0] == 0 && $rgb_result1[1] == 232 && $rgb_result1[2] == 196){
						$merid = "5";//手少陰心經
					}
					else if($rgb_result1[0] == 0 && $rgb_result1[1] == 233 && $rgb_result1[2] == 97){
						$merid = "11";//足少陽膽經
					}
					else if($rgb_result1[0] == 246 && $rgb_result1[1] == 78 && $rgb_result1[2] == 85){
						$merid = "3";//足陽明胃經
					}
					else if($rgb_result1[0] == 229 && $rgb_result1[1] == 227 && $rgb_result1[2] == 91){
						$merid = "4";//足太陰脾經
					}
					else if($rgb_result1[0] == 228 && $rgb_result1[1] == 227 && $rgb_result1[2] == 55){
						$merid = "12";//足厥陰肝經
					}
					else if($rgb_result1[0] == 138 && $rgb_result1[1] == 85 && $rgb_result1[2] == 237){
						$merid = "8";//足少陰腎經
					}
					else if($rgb_result1[0] == 255 && $rgb_result1[1] == 255 && $rgb_result1[2] == 255){
						$merid = -1;
					}
					else{
						$merid = -2;
					}
					if($i<((($k * $k)+1)/2)){
						$around[$i] = $merid;
					}
					else if($i>((($k * $k)+1)/2)){
						$around[$i - 1] = $merid;
					}
				}
				$array = array_count_values($around);
				arsort($array);
				$merid = key($array);
				if($merid == -2 && $k < 7){
					$k+=2;
				}
				else if($merid != -2){
					break;
				}
			}
		}
	}
	else if($side == "側"){
		$side_search = "side";
		$img = "C:\\xampp\\htdocs\\acupoint-1.1\\images\\side.png";
		$rgb_result = rgb($x, $y, $img);
		if($rgb_result[0] == 239 && $rgb_result[1] == 0 && $rgb_result[2] == 0){
			$merid = "14";//任脈
		}
		else if($rgb_result[0] == 89 && $rgb_result[1] == 186 && $rgb_result[2] == 69){
			$merid = "8";//足少陰腎經
		}
		else if($rgb_result[0] == 246 && $rgb_result[1] == 78 && $rgb_result[2] == 85){
			$merid = "3";//足陽明胃經
		}
		else if($rgb_result[0] == 228 && $rgb_result[1] == 227 && $rgb_result[2] == 55){
			$merid = "4";//足太陰脾經
		}
		else if($rgb_result[0] == 163 && $rgb_result[1] == 49 && $rgb_result[2] == 131){
			$merid = "6";//手太陽小腸經
		}
		else if($rgb_result[0] == 163 && $rgb_result[1] == 50 && $rgb_result[2] == 55){
			$merid = "10";//手少陽三焦經
		}
		else if($rgb_result[0] == 157 && $rgb_result[1] == 109 && $rgb_result[2] == 47){
			$merid = "2";//手陽明大腸經
		}
		else if($rgb_result[0] == 0 && $rgb_result[1] == 233 && $rgb_result[2] == 97){
			$merid = "11";//足少陽膽經
		}
		else if($rgb_result[0] == 65 && $rgb_result[1] == 56 && $rgb_result[2] == 156){
			$merid = -3;//足太陽膀胱經
		}
		else if($rgb_result[0] == 255 && $rgb_result[1] == 255 && $rgb_result[2] == 255){
			$merid = -1;
		}
		else{
			$k = 3;
			while($k < 9){
				$around = [];
				for($i = 1;$i < ($k * $k + 1);$i+=1){
					if($k == 3){
						if(($i%3) == 1){
							$rgb_result1 = rgb(($x - 1), ($y - 2 + ($i/3) + 1), $img);
						}
						else if(($i%3) == 2){
							if($i != 5){
								$rgb_result1 = rgb(($x), ($y - 2 + ($i/3) + 1), $img);
							}
						}
						else if(($i%3) == 0){
							$rgb_result1 = rgb(($x + 1), ($y - 2 + ($i/3)), $img);
						}
					}
					if($k == 5){
						if(($i%5) == 1){
							$rgb_result1 = rgb(($x - 2), ($y - 3 + ($i/5) + 1), $img);
						}
						else if(($i%5) == 2){
							$rgb_result1 = rgb(($x - 1), ($y - 3 + ($i/5) + 1), $img);
						}
						else if(($i%5) == 3){
							if($i != 13){
								$rgb_result1 = rgb($x, ($y - 3 + ($i/5) + 1), $img);
							}
						}
						else if(($i%5) == 4){
							$rgb_result1 = rgb(($x + 1), ($y - 3 + ($i/5) + 1), $img);
						}
						else if(($i%5) == 0){
							$rgb_result1 = rgb(($x + 2), ($y - 3 + ($i/5)), $img);
						}
					}
					if($k == 7){
						if(($i%7) == 1){
							$rgb_result1 = rgb(($x - 3), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 2){
							$rgb_result1 = rgb(($x - 2), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 3){
							$rgb_result1 = rgb(($x - 1), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 4){
							if($i != 18){
								$rgb_result1 = rgb($x, ($y - 4 + ($i/7) + 1), $img);
							}
						}
						else if(($i%7) == 5){
							$rgb_result1 = rgb(($x + 1), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 6){
							$rgb_result1 = rgb(($x + 2), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 0){
							$rgb_result1 = rgb(($x + 3), ($y - 4 + ($i/7)), $img);
						}
					}
					if($rgb_result1[0] == 239 && $rgb_result1[1] == 0 && $rgb_result1[2] == 0){
						$merid = "14";//任脈
					}
					else if($rgb_result1[0] == 89 && $rgb_result1[1] == 186 && $rgb_result1[2] == 69){
						$merid = "8";//足少陰腎經
					}
					else if($rgb_result1[0] == 246 && $rgb_result1[1] == 78 && $rgb_result1[2] == 85){
						$merid = "3";//足陽明胃經
					}
					else if($rgb_result1[0] == 228 && $rgb_result1[1] == 227 && $rgb_result1[2] == 55){
						$merid = "4";//足太陰脾經
					}
					else if($rgb_result1[0] == 163 && $rgb_result1[1] == 49 && $rgb_result1[2] == 131){
						$merid = "6";//手太陽小腸經
					}
					else if($rgb_result1[0] == 163 && $rgb_result1[1] == 50 && $rgb_result1[2] == 55){
						$merid = "10";//手少陽三焦經
					}
					else if($rgb_result1[0] == 157 && $rgb_result1[1] == 109 && $rgb_result1[2] == 47){
						$merid = "2";//手陽明大腸經
					}
					else if($rgb_result1[0] == 0 && $rgb_result1[1] == 233 && $rgb_result1[2] == 97){
						$merid = "11";//足少陽膽經
					}
					else if($rgb_result1[0] == 65 && $rgb_result1[1] == 56 && $rgb_result1[2] == 156){
						$merid = -3;//足太陽膀胱經
					}
					else if($rgb_result1[0] == 255 && $rgb_result1[1] == 255 && $rgb_result1[2] == 255){
						$merid = -1;
					}
					else{
						$merid = -2;
					}
					if($i<((($k * $k)+1)/2)){
						$around[$i] = $merid;
					}
					else if($i>((($k * $k)+1)/2)){
						$around[$i - 1] = $merid;
					}
				}
				$array = array_count_values($around);
				arsort($array);
				$merid = key($array);
				if($merid == -2 && $k < 7){
					$k+=2;
				}
				else if($merid != -2){
					break;
				}
			}
		}
	}
	else if($side == "反"){
		$side_search = "back";
		if($x<310){
			$x = 310 + (310 - $x);
		}
		$img = "C:\\xampp\\htdocs\\acupoint-1.1\\images\\back.png";
		$rgb_result = rgb($x, $y, $img);
		if($rgb_result[0] == 0 && $rgb_result[1] == 152 && $rgb_result[2] == 152){
			$merid = "13";//督脈
		}
		else if($rgb_result[0] == 157 && $rgb_result[1] == 109 && $rgb_result[2] == 47){
			$merid = "2";//手陽明大腸經
		}
		else if($rgb_result[0] == 163 && $rgb_result[1] == 50 && $rgb_result[2] == 55){
			$merid = "10";//手少陽三焦經
		}
		else if($rgb_result[0] == 163 && $rgb_result[1] == 49 && $rgb_result[2] == 131){
			$merid = "6";//手太陽小腸經
		}
		else if($rgb_result[0] == 91 && $rgb_result[1] == 229 && $rgb_result[2] == 114){
			$merid = "11";//足少陽膽經
		}
		else if($rgb_result[0] == 65 && $rgb_result[1] == 56 && $rgb_result[2] == 156){
			$merid = "7";//足太陽膀胱經
		}
		else if($rgb_result[0] == 255 && $rgb_result[1] == 255 && $rgb_result[2] == 255){
			$merid = -1;
		}
		else{
			$k = 3;
			while($k < 9){
				$around = [];
				for($i = 1;$i < 9;$i+=1){
					if($k == 3){
						if(($i%3) == 1){
							$rgb_result1 = rgb(($x - 1), ($y - 2 + ($i/3) + 1), $img);
						}
						else if(($i%3) == 2){
							if($i != 5){
								$rgb_result1 = rgb(($x), ($y - 2 + ($i/3) + 1), $img);
							}
						}
						else if(($i%3) == 0){
							$rgb_result1 = rgb(($x + 1), ($y - 2 + ($i/3)), $img);
						}
					}
					if($k == 5){
						if(($i%5) == 1){
							$rgb_result1 = rgb(($x - 2), ($y - 3 + ($i/5) + 1), $img);
						}
						else if(($i%5) == 2){
							$rgb_result1 = rgb(($x - 1), ($y - 3 + ($i/5) + 1), $img);
						}
						else if(($i%5) == 3){
							if($i != 13){
								$rgb_result1 = rgb($x, ($y - 3 + ($i/5) + 1), $img);
							}
						}
						else if(($i%5) == 4){
							$rgb_result1 = rgb(($x + 1), ($y - 3 + ($i/5) + 1), $img);
						}
						else if(($i%5) == 0){
							$rgb_result1 = rgb(($x + 2), ($y - 3 + ($i/5)), $img);
						}
					}
					if($k == 7){
						if(($i%7) == 1){
							$rgb_result1 = rgb(($x - 3), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 2){
							$rgb_result1 = rgb(($x - 2), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 3){
							$rgb_result1 = rgb(($x - 1), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 4){
							if($i != 18){
								$rgb_result1 = rgb($x, ($y - 4 + ($i/7) + 1), $img);
							}
						}
						else if(($i%7) == 5){
							$rgb_result1 = rgb(($x + 1), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 6){
							$rgb_result1 = rgb(($x + 2), ($y - 4 + ($i/7) + 1), $img);
						}
						else if(($i%7) == 0){
							$rgb_result1 = rgb(($x + 3), ($y - 4 + ($i/7)), $img);
						}
					}
					if($rgb_result1[0] == 0 && $rgb_result1[1] == 152 && $rgb_result1[2] == 152){
						$merid = "13";//督脈
					}
					else if($rgb_result1[0] == 157 && $rgb_result1[1] == 109 && $rgb_result1[2] == 47){
						$merid = "2";//手陽明大腸經
					}
					else if($rgb_result1[0] == 163 && $rgb_result1[1] == 50 && $rgb_result1[2] == 55){
						$merid = "10";//手少陽三焦經
					}
					else if($rgb_result1[0] == 163 && $rgb_result1[1] == 49 && $rgb_result1[2] == 131){
						$merid = "6";//手太陽小腸經
					}
					else if($rgb_result1[0] == 91 && $rgb_result1[1] == 229 && $rgb_result1[2] == 114){
						$merid = "11";//足少陽膽經
					}
					else if($rgb_result1[0] == 65 && $rgb_result1[1] == 56 && $rgb_result1[2] == 156){
						$merid = "7";//足太陽膀胱經
					}
					else if($rgb_result1[0] == 255 && $rgb_result1[1] == 255 && $rgb_result1[2] == 255){
						$merid = -1;
					}
					else{
						$merid = -2;
					}
					if($i<((($k * $k)+1)/2)){
						$around[$i] = $merid;
					}
					else if($i>((($k * $k)+1)/2)){
						$around[$i - 1] = $merid;
					}
				}
				$array = array_count_values($around);
				arsort($array);
				$merid = key($array);
				if($merid == -2 && $k < 7){
					$k+=2;
				}
				else if($merid != -2){
					break;
				}
			}
		}
	}
	if ($merid == -1 || $merid == -2 || $merid == -3){
		if($merid == -1){
			echo "白色";
		}
		else if($merid == -2){
			echo "請重新點選";
		}
		else if($merid == -3){
			echo "此穴道請從後面圖點選";
		}
	}
	else{
		$index = -1;
		$con = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
		$con->query("SET NAMES UTF8");
		$result = $con->query("SELECT * FROM `$side_search` WHERE meridian = '$merid'");
		$row = $result->fetchAll();
		foreach($row as $row0){
			$index+=1;
			foreach($row0 as $key => $value){
				if ($key=="acupoint" && $key!="0"){
					$acu[$index][0] = $value;
				}
				if ($key=="x" && $key!="0"){
					$acu[$index][1] = (int)$value;
				}
				if ($key=="y" && $key!="0"){
					$acu[$index][2] = (int)$value;
				}
			}
		}
		for($i = 0;$i<count($acu)-1;$i+=1){
			for($j = $i;$j<count($acu);$j+=1){
				if($i != $j){
					$dis_i = sqrt((pow(($acu[$i][1] - $x), 2)) + (pow(($acu[$i][2] - $y), 2)));
					$dis_j = sqrt((pow(($acu[$j][1] - $x), 2)) + (pow(($acu[$j][2] - $y), 2)));
					if ($dis_i > $dis_j){
						$temp = $acu[$i];
						$acu[$i] = $acu[$j];
						$acu[$j] = $temp;
					}
				}
			}
		}
		$index = 0;
		$acu_result[$index] = $acu[0][0];
		$con->query("SET NAMES UTF8");
		$result = $con->query("SELECT `main_table`.`acupoint` FROM `main_table` WHERE meridian = '$merid'");
		$row = $result->fetchAll();
		foreach($row as $row0){
			$index+=1;
			foreach($row0 as $key => $value){
				if ($key=="acupoint" && $key!="0"){
					$acu_result[$index] = $value;
				}
			}
		}
		echo json_encode($acu_result, JSON_UNESCAPED_UNICODE);
	}

?>