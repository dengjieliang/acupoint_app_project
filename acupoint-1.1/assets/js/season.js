$(document).ready(function(){
	$.ajax({
		url:"http://120.126.151.210/acupoint-1.1/season.php",
		dataType:"json",
		type : "post",
		success:function(data){
			console.log(data); 
			$(".season1").append(data[0]);
			$(".date").append(data[1]);
			$(".info").append(data[2]);
			$(".acupoint").append(data[3]);
			menu_open();
		},
	})
 })