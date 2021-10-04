function redirect3(name){
	console.log(name);
	$.ajax({
        url : "page5.html",
        dataType : "html",
        type : "post",
        success:function(res){
			$("#main").html(res);
			$("#main").find("script").each(function(){
				eval($(this).text());
			});
		},
		error:function(){
	        alert("失敗");
	    },
      });
	  
	  
	$(document).ready(function(){
	  $.ajax({
		url : "http://120.126.151.210/acupoint/acushow.php",
		dataType : "html",
		type : "post",
		data:{
			acu:name,
		},
		success : function(data) {			
          	console.log("成功");
			$('.acupoint').append(data);
			menu_open();
          },
		
		error:function(){
			console.log("失敗");
	    },
	  })
	});
}