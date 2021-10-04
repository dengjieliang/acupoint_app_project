<?php
	require('config.php');
	$acu = $_POST['acu'];
	$acu = str_replace(" ","",$acu);
	$con = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
	$con->query("SET NAMES UTF8");
	$result = $con->query("SELECT * FROM main_table WHERE acupoint = '$acu'");
	$i=0;
	$send[$i] = "";
	$row = $result->fetchAll();
	if(count($row)!=0){
		foreach($row as $row0){
			foreach($row0 as $key => $value){
				if ($key=="acupoint" && $key!="0"){
					$send[$i] = "<div style='font-weight:bold;font-size:36px'>$value</div>";
					$i+=1;
				}
				else if ($key=="nickname" && $key!="0"){
					if($value!=" "){
						$send[$i] = "<nobr style = 'font-size:22px'>別名：$value</nobr>";
						$i+=1;
					}
				}
				else if ($key == "meridian" && $key!="0"){
					if ($value == "1"){
						$send[$i] = "<br><nobr style = 'font-size:22px' href = '#' onclick = \"getdata3('meridian', '手太陰肺經')\">所屬經絡：手太陰肺經</nobr>";
						$i+=1;
					}
					else if ($value == "2"){
						$send[$i] = "<br><nobr style = 'font-size:22px' href = '#' onclick = \"getdata3('meridian', '手陽明大腸經')\">所屬經絡：手陽明大腸經</nobr>";
						$i+=1;
					}
					else if ($value == "3"){
						$send[$i] = "<br><nobr style = 'font-size:22px' href = '#' onclick = \"getdata3('meridian', '足陽明胃經')\">所屬經絡：足陽明胃經</nobr>";
						$i+=1;
					}
					else if ($value == "4"){
						$send[$i] = "<br><nobr style = 'font-size:22px' href = '#' onclick = \"getdata3('meridian', '足太陰脾經')\">所屬經絡：足太陰脾經</nobr>";
						$i+=1;
					}
					else if ($value == "5"){
						$send[$i] = "<br><nobr style = 'font-size:22px' href = '#' onclick = \"getdata3('meridian', '手少陰心經')\">所屬經絡：手少陰心經</nobr>";
						$i+=1;
					}
					else if ($value == "6"){
						$send[$i] = "<br><nobr style = 'font-size:22px' href = '#' onclick = \"getdata3('meridian', '手太陽小腸經')\">所屬經絡：手太陽小腸經</nobr>";
						$i+=1;
					}
					else if ($value == "7"){
						$send[$i] = "<br><nobr style = 'font-size:22px' href = '#' onclick = \"getdata3('meridian', '足太陽膀胱經')\">所屬經絡：足太陽膀胱經</nobr>";
						$i+=1;
					}
					else if ($value == "8"){
						$send[$i] = "<br><nobr style = 'font-size:22px' href = '#' onclick = \"getdata3('meridian', '足少陰腎經')\">所屬經絡：足少陰腎經</nobr>";
						$i+=1;
					}
					else if ($value == "9"){
						$send[$i] = "<br><nobr style = 'font-size:22px' href = '#' onclick = \"getdata3('meridian', '手厥陰心包經')\">所屬經絡：手厥陰心包經</nobr>";
						$i+=1;
					}
					else if ($value == "10"){
						$send[$i] = "<br><nobr style = 'font-size:22px' href = '#' onclick = \"getdata3('meridian', '手少陽三焦經')\">所屬經絡：手少陽三焦經</nobr>";
						$i+=1;
					}
					else if ($value == "11"){
						$send[$i] = "<br><nobr style = 'font-size:22px' href = '#' onclick = \"getdata3('meridian', '足少陽膽經')\">所屬經絡：足少陽膽經</nobr>";
						$i+=1;
					}
					else if ($value == "12"){
						$send[$i] = "<br><nobr style = 'font-size:22px' href = '#' onclick = \"getdata3('meridian', '足厥陰肝經')\">所屬經絡：足厥陰肝經</nobr>";
						$i+=1;
					}
					else if ($value == "13"){
						$send[$i] = "<br><nobr style = 'font-size:22px' href = '#' onclick = \"getdata3('meridian', '督脈')\">所屬經絡：督脈</nobr>";
						$i+=1;
					}
					else if ($value == "14"){
						$send[$i] = "<br><nobr style = 'font-size:22px' href = '#' onclick = \"getdata3('meridian', '任脈')\">所屬經絡：任脈</nobr>";
						$i+=1;
					}
					else{
						$send[$i] = "<nobr style = 'font-size:22px'>所屬經絡：經外奇穴</nobr>";
						$i+=1;
					}
				}
				else if ($key=="place" && $key!="0"){
					$picplace = $i;
					if($value==" "){
						$send[$i] = "";
					}
					else{
						$send[$i] = "<li><span class='opener'>取穴方法</span><ul class='method'>$value";
					}
					$i+=1;
					$send[$i] = "";
				}
				else if ($key=="massage" && $key!="0"){
					if($value!=" "){
						$send[$i] = $send[$i]."按摩方式:".$value."<br>";
					}
				}
				else if ($key=="massage_no" && $key!="0"){
					if($value!=" "){
						$send[$i] = $send[$i]."按摩注意事項:".$value."<br>";
					}
				}
				else if ($key=="moxibustion" && $key!="0"){
					if($value!=" "){
						$send[$i] = $send[$i]."艾炙方式:".$value."<br>";
					}
				}
				else if ($key=="moxibustion_no" && $key!="0"){
					if($value!=" "){
						$send[$i] = $send[$i]."艾炙注意事項:".$value."<br>";
					}
				}
				else if ($key=="cupping" && $key!="0"){
					if($value!=" "){
						$send[$i] = $send[$i]."拔罐方式:".$value."<br>";
					}
				}
				else if ($key=="cupping_no" && $key!="0"){
					if($value!=" "){
						$send[$i] = $send[$i]."拔罐注意事項:".$value."<br>";
					}
				}
				else if ($key=="puncture" && $key!="0"){
					if($value!=" "){
						$send[$i] = $send[$i]."刺血方式:".$value."<br>";
					}
				}
				else if ($key=="puncture_no" && $key!="0"){
					if($value!=" "){
						$send[$i] = $send[$i]."刺血注意事項:".$value."<br>";
					}
				}
				else if ($key=="scratch" && $key!="0"){
					if($value!=" "){
						$send[$i] = $send[$i]."刮痧方式:".$value."<br>";
					}
				}
				else if ($key=="scratch_no" && $key!="0"){
					if($value!=" "){
						$send[$i] = $send[$i]."刮痧注意事項:".$value."<br>";
					}
				}
			}
		}
		$send[$i] = rtrim($send[$i],"<br>");
		if($send[$i]!=""){
			$send[$i] = "<li><span class='opener'>按摩方法及注意事項</span><ul class='method2'>".$send[$i]."</ul></li>";
		}
		$con2 = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
		$con2->query("SET NAMES UTF8");
		$result2 = $con2->query("SELECT `symptom` FROM `match_table` WHERE acupoint = '$acu'");
		$row2 = $result2->fetchAll();
		$i+=1;
		$send[$i]="";
		foreach($row2 as $row2_new){
			foreach($row2_new as $key => $value){
				if ($key=="symptom" && $key!="0"){
					if ($key!='0' && $send[$i]!=""){
						$send[$i] = $send[$i]."<li><a href = '#' onclick = \"redirect2page8('$value')\">".$value."</a></li>";
					}
					else if ($key!='0'){
						$send[$i] = "<li><span class='opener'>可改善的症狀</span><ul class='relativedis'><li><a href = '#' onclick = \"redirect2page8('$value')\">".$value."</a></li>";
					}
				}
			}
		}
		if ($send[$i]!=""){
			$send[$i] = $send[$i]."</ul></li>";
		}
		$i+=1;
		$con = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
		$con->query("SET NAMES UTF8");
		$result = $con->query("SELECT * FROM `main_table` WHERE acupoint = '$acu'");
		$row = $result->fetchAll();
		foreach($row as $row1){
			foreach($row1 as $key => $value){
				if($key=="matchpoint"){
					if($value=="" && $key!='0'){
						$send[$i] = "";
					}
					else if ($key!='0'){
						$send[$i] = "";
						$send[$i] = "<li><span class='opener'>建議配穴</span><ul class='relativeacu'>";
						$temp = explode("。",$value);
						foreach($temp as $tmp){
							if (strpos($tmp,")")){
								$temp2 = explode(")",$tmp);
								if (strpos($temp2[1],"、")){
									$send[$i] = $send[$i].$temp2[0].")";
									$temp3 = explode("、",$temp2[1]);
									foreach($temp3 as $tmp3){
										if (strpos($tmp3,"穴") == false){
											$tmp3acu = $tmp3."穴";
										}
										else{
											$tmp3acu = $tmp3;
										}
										$send[$i] = $send[$i]."<nobr onclick = \"redirect2page5('$tmp3acu')\">$tmp3</nobr>"."、";
									}
									$send[$i] = rtrim($send[$i],"、");
								}
								else{
									$send[$i] = $send[$i].$temp2[0].")";
									$temp2acu = $temp2[1]."穴";
									if (strpos($temp2[1],"穴") == false){
											$temp2acu = $temp2[1]."穴";
										}
									else{
										$temp2acu = $temp2[1];
									}
									$send[$i] = $send[$i]."<nobr onclick = \"redirect2page5('$temp2acu')\">$temp2[1]</nobr>";
								}
								$send[$i] = $send[$i]."。";
							}
							else if(strpos($tmp,"：")){
								$temp2 = explode("：",$tmp);
								if (strpos($temp2[1],"、")){
									$send[$i] = $send[$i].$temp2[0]."：";
									$temp3 = explode("、",$temp2[1]);
									foreach($temp3 as $tmp3){
										if (strpos($tmp3,"穴") == false){
											$tmp3acu = $tmp3."穴";
										}
										else{
											$tmp3acu = $tmp3;
										}
										$send[$i] = $send[$i]."<nobr onclick = \"redirect2page5('$tmp3acu')\">$tmp3</nobr>"."、";
									}
									$send[$i] = rtrim($send[$i],"、");
								}
								else{
									$send[$i] = $send[$i].$temp2[0]."：";
									if (strpos($temp2[1],"穴") == false){
										$temp2acu = $temp2[1]."穴";
									}
									else{
										$temp2acu = $temp2[1];
									}
									$send[$i] = $send[$i]."<nobr onclick = \"redirect2page5('$temp2acu')\">$temp2[1]</nobr>";
								}
								$send[$i] = $send[$i]."。";
							}
						}
						$send[$i] = $send[$i]."</li>";
						$i+=1;
					}
				}
				else if ($key=="picture"){
					if($value==" "&&$key!='0'){
						$send[$picplace] = $send[$picplace]."</ul></li>";
					}
					else if($key!='0'){
						$send[$picplace] = $send[$picplace]."<img src ='$value' width='90%'></img></ul></li>";
					}
				}
			}
		}
	}
	
	else{
		$con = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
		$con->query("SET NAMES UTF8");
		$result = $con->query("SELECT * FROM dong WHERE acupoint = '$acu'");
		$row = $result->fetchAll();
		foreach($row as $row0){
			foreach($row0 as $key => $value){
				if ($key=="acupoint" && $key!="0"){
					$send[$i] = "<div style='font-weight:bold;font-size:36px'>$value</div>";
					$send[$i] = $send[$i]."<br>所屬經絡：手太陰肺經";
					$i+=1;
				}
				else if ($key=="place" && $key!="0"){
					$picplaces = $i;
					$send[$i] = "<li><span class='opener'>取穴方法</span><ul class='method'>$value";
				}
			}
		}
		$i+=1;
		$send[$i] = "";
		$con2 = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
		$con2->query("SET NAMES UTF8");
		$result2 = $con2->query("SELECT match_table.`symptom` FROM `match_table` WHERE acupoint = '$acu'");
		$row2 = $result2->fetchAll();
		foreach($row2 as $row2_new){
			foreach($row2_new as $key => $value){
				if ($key=="symptom" && $key!="0"){
					if ($key!='0' && $send[$i]!=""){
						$send[$i] = $send[$i]."<li><a href = '#' onclick = \"redirect2page8('$value')\">".$value."</a></li>";
					}
					else if ($key!='0'){
						$send[$i] = "<li><span class='opener'>可改善的症狀</span><ul class='relativedis'><li><a href = '#' onclick = \"redirect2page8('$value')\">".$value."</a></li>";
					}
				}
			}
		}
		if ($send[$i]!=""){
			$send[$i] = $send[$i]."</ul></li>";
		}
		$i+=1;
		$send[$i] = "";
		$con = new PDO('mysql:host=localhost;dbname=project;charset=utf8', $db_user, $db_pass);
		$con->query("SET NAMES UTF8");
		$result = $con->query("SELECT * FROM dong WHERE acupoint = '$acu'");
		$row = $result->fetchAll();
		foreach($row as $row1){
			foreach($row1 as $key => $value){
				if ($key=="picture"){
					if($key!='0' && $value == ""){
						$send[$picplaces] = $send[$picplaces]."</ul></li>";
					}
					else if($key!='0'){
						$send[$picplaces] = $send[$picplaces]."<img src ='$value' width='90%'></img></ul></li>";
					}
				}
			}
		}
	}

	$i+=1;
	$send[$i]="";
	for ($j=0;$j<count($send)-1;$j+=1){
		$send[$i] = $send[$i].$send[$j];
	}
	echo $send[$i];
?>