function specialsearch() {
    document.getElementById("moddal").style.display = "";
    $(".modal-title").html('請選擇進階搜尋方法');
    var dis = "<select class=\"form-control\" id=\"searchtype\">";
    dis += "<option>" + "文字搜尋" + "</option>";
    if(document.getElementById('topicc').innerText == '搜尋結果'){
        dis += "<option>" + "圖片搜尋" + "</option>";
    }
    dis += "</select>";
    $(".modal-body").html(dis);
    $(".btn.btn-secondary").html('關閉');
    $(".btn.btn-primary").html('選擇');
    $("#exampleModalCenter").modal();
}
function searchchose(){
    var datapre = document.getElementById('datasave').innerText;
    $("#exampleModalCenter").modal('hide');
    $('.modal-backdrop').remove();
    var elem = document.getElementById('import');
    elem.classList.remove('modal-open');
    document.getElementById('exampleModalCenter').style.display="none";
    if (window.sessionStorage.key(0) === null) {
		window.sessionStorage.setItem("1", $("#main").html());
	}
	else {
		window.sessionStorage.setItem((window.sessionStorage.length + 1).toString(), $("#main").html());
	}
    var chose = document.getElementById("searchtype").value;
    if(chose == "文字搜尋"){
        $.ajax({
            url:"search.html",
            dataType:"html",
            success:function(res){
                $('#main').html(res);
                $('.center').html('進階搜尋 – 文字');
                $('#sendbar').attr('onclick', 'secondsend();');
                $('#datasave').html(datapre);
            }
        })
    }
    else if(chose == "圖片搜尋"){
        $.ajax({
            url:"touch.html",
            dataType:"html",
            success:function(res){
                $('#main').html(res);
                $('.center').html('進階搜尋 – 圖片');
                $('#datasave').html(datapre);
            }
        })
    }
}