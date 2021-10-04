function send() {
    var arr = [];
    for (i = 1; i <= 200; i++) {
        arr.push(document.getElementById("query" + i.toString()).disabled);
    }
    var someyes = false;
    for (i = 0; i < arr.length; i++) {
        someyes = (someyes | arr[i]);
    }
    if (someyes) {
        if (window.sessionStorage.key(0) === null) {
            $.ajax({
                url: "search.html",
                dataType: "html",
                success: function (res) {
                    window.sessionStorage.setItem("1", res);
                },
                error: function (err) { console.log(err) },
            });
        }
        else {
            $.ajax({
                url: "search.html",
                dataType: "html",
                success: function (res) {
                    window.sessionStorage.setItem((window.sessionStorage.length + 1).toString(), res);
                },
                error: function (err) { console.log(err) },
            });
        }
        $.ajax({
            url: "page4.html",
            dataType: "html",
            success: function (res) {
                $("#main").html(res);
                $("#main").find("script").each(function () {
                    eval($(this).text());
                });
            },
            error: function (err) { console.log(err) },
        });
        var dis = [];
        for (i = 1; i <= 200; i++) {
            if (document.getElementById("query" + i.toString()).disabled)
                dis.push(document.getElementById("query" + i.toString()).value);
        }
        $(document).ready(function () {
            $.ajax({
                url: "http://120.126.151.210/acupoint-1.1/search.php",
                dataType: "json",
                type: "post",
                data: {
                    dis: dis,
                },
                success: function (data) {
                    $('.disease').append(data[0]);
                    $('.acupoint').append(data[1]);
                    $('.represent').append(data[2]);
                    $('#datasave').html(JSON.stringify(dis));
                    menu_open();
                },
                error: function () {
                    console.log("失敗");
                },
            })
        });
    }
    else {
        $(".modal-title").html('請輸入症狀');
        $(".modal-body").html('');
        $(".btn.btn-secondary").html('關閉');
        document.getElementById("moddal").style.display = "none";
        $("#exampleModalCenter").modal();
    }

}
function secondsend() {
    var arr = [];
    var old = document.getElementById('datasave').innerText;
    var before = 0;
    if (old.search(/[0-9]/g) != -1) {
        before = 1;
    }
    for (i = 1; i <= 200; i++) {
        arr.push(document.getElementById("query" + i.toString()).disabled);
    }
    var someyes = false;
    for (i = 0; i < arr.length; i++) {
        someyes = (someyes | arr[i]);
    }
    if (someyes) {
        if (window.sessionStorage.key(0) === null) {
            window.sessionStorage.setItem("1", $("#main").html());
        }
        else {
            window.sessionStorage.setItem((window.sessionStorage.length + 1).toString(), $("#main").html());
        }
        if(before == 0){
            $.ajax({
                url: "page4.html",
                dataType: "html",
                success: function (res) {
                    $("#main").html(res);
                    $("#main").find("script").each(function () {
                        eval($(this).text());
                    });
                    document.getElementById('secondsearch').style.display = "none";
                    $('.topicc').html('進階搜尋結果');
                },
                error: function (err) { console.log(err) },
            });
        }
        var dis = [];
        for (i = 1; i <= 200; i++) {
            if (document.getElementById("query" + i.toString()).disabled)
                dis.push(document.getElementById("query" + i.toString()).value);
        }

        $(document).ready(function () {
            $.ajax({
                url: "http://120.126.151.210/acupoint-1.1/advancetotext.php",
                dataType: "json",
                type: "post",
                data: {
                    dis: dis,
                    before: before,
                    olddata: JSON.parse(old)
                },
                success: function (data) {
                    if (before == 0) {
                        $('.disease').append(data[0]);
                        $('.acupoint').append(data[1]);
                        $('.represent').append(data[2]);
                    }
                    else {
                        var input = "<br><div id=\"topicc\" class=\"center\">進階搜尋結果</div><div class=\"inner\"><nav id=\"menu\"><ul>";
                        for(i = 0; i < data.length; i++){
                            if(data[i].length == 1){
                                input += "<li><span class='opener'>" + data[i][0] + "</span>";
                                input += "<ul><center><font color=\"black\" size=\"5\">此症狀無任何推薦穴道於點擊部位</font></center></ul></li>"
                            }
                            else{
                                input += "<li><span class='opener'>" + data[i][0] + "</span><ul>";
                                for(j = 1; j < data[i].length; j++){
                                    input += "<li" + " onclick='redirect2page5(\"" + data[i][j] + "\")'><a>" + data[i][j] + "</a></li>\n";
                                }
                                input += "</ul><div class=\"footer\"><img src=\"images/home.png\" width=10% style=\"background-color: transparent\" onclick=\"getdata2('page2');\">  </div>";
                            }
                        }
                        input += "</ul></nav></div>";
                        $('#main').html(input);
                        menu_open();
                    }
                },
                error: function () {
                    console.log("失敗");
                },
            })
        });
    }
    else {
        $(".modal-title").html('請輸入症狀');
        $(".modal-body").html('');
        $(".btn.btn-secondary").html('關閉');
        document.getElementById("moddal").style.display = "none";
        $("#exampleModalCenter").modal();
    }

}
function onLoad() {
    document.addEventListener("backbutton", previouspage, false);
}