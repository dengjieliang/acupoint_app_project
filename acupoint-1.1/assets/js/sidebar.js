$(document).ready(function () {
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/手太陰肺經.txt",
        dataType: "text",
        success: function (data) {
            let id1 = data.split('穴');
            let inp = "";
            id1.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id1").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/手太陽小腸經.txt",
        dataType: "text",
        success: function (data) {
            let id2 = data.split('穴');
            let inp = "";
            id2.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id2").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/手少陰心經.txt",
        dataType: "text",
        success: function (data) {
            let id3 = data.split('穴');
            let inp = "";
            id3.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id3").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/手少陽三焦經.txt",
        dataType: "text",
        success: function (data) {
            let id1 = data.split('穴');
            let inp = "";
            id1.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id4").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/手厥陰心包經.txt",
        dataType: "text",
        success: function (data) {
            let id1 = data.split('穴');
            let inp = "";
            id1.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id5").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/手陽明大腸經.txt",
        dataType: "text",
        success: function (data) {
            let id1 = data.split('穴');
            let inp = "";
            id1.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id6").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/任脈.txt",
        dataType: "text",
        success: function (data) {
            let id1 = data.split('穴');
            let inp = "";
            id1.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id7").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/足太陰脾經.txt",
        dataType: "text",
        success: function (data) {
            let id1 = data.split('穴');
            let inp = "";
            id1.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id8").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/足太陽膀胱經.txt",
        dataType: "text",
        success: function (data) {
            let id1 = data.split('穴');
            let inp = "";
            id1.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id9").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/足少陰腎經.txt",
        dataType: "text",
        success: function (data) {
            let id1 = data.split('穴');
            let inp = "";
            id1.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id10").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/足少陽膽經.txt",
        dataType: "text",
        success: function (data) {
            let id1 = data.split('穴');
            let inp = "";
            id1.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id11").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/足厥陰肝經.txt",
        dataType: "text",
        success: function (data) {
            let id1 = data.split('穴');
            let inp = "";
            id1.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id12").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/足陽明胃經.txt",
        dataType: "text",
        success: function (data) {
            let id1 = data.split('穴');
            let inp = "";
            id1.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id13").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/督脈.txt",
        dataType: "text",
        success: function (data) {
            let id1 = data.split('穴');
            let inp = "";
            id1.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id14").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/經外奇穴.txt",
        dataType: "text",
        success: function (data) {
            let id1 = data.split('穴');
            let inp = "";
            id1.forEach(function (value) {
                value.replace('/[\u000A]', '');
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value + '穴' + '\');"><a href="#">' + value + '穴' + '</a></li>';
            });
            $(".id15").html(inp);
        }
    });
    $.ajax({
        url: "http://120.126.151.210/acupoint-1.1/txt/董氏奇穴.txt",
        dataType: "text",
        success: function (data) {
            let id1 = data.split('\n');
            let inp = "";
            id1.forEach(function (value) {
                if (value.length)
                    inp += '<li onclick="acupoint(\'' + value.substr(0, value.length - 1) + '\');"><a href="#">' + value.substr(0, value.length - 1) + '</a></li>';
            });
            $(".id16").html(inp);
        }
    });
});
function acupoint(name) {
    var db1 = window.sqlitePlugin.openDatabase({
        name: "穴道.db",
        location: 'default',
        androidDatabaseProvider: 'system'
    });
    db1.transaction(
        function (tx) {
            tx.executeSql('CREATE TABLE IF NOT EXISTS Acupoint (id integer primary key, acupoint text)');
            tx.executeSql("select count(id) as cnt from Acupoint;", [], function (tx, res) {
                $('#addacupoint').html('加入最愛');
                $('#addacupoint').attr("onclick", "addacupoint('" + name + "');");
                var strMsg = res.rows.item(0).cnt;
                if (strMsg != "0") {
                    tx.executeSql("select * from Acupoint;", [], function (tx, res) {
                        for (var i = 0; i < res.rows.length; i++) {
                            if (res.rows.item(i)["acupoint"] == name) {
                                $('#addacupoint').html('移出最愛');
                                $('#addacupoint').attr("onclick", "delacupoint('" + name + "');");
                                break;
                            }
                        }
                    });
                }
            });
        }
    );
    if (window.sessionStorage.key(0) === null) {
        window.sessionStorage.setItem("1", $("#main").html());
    }
    else {
        window.sessionStorage.setItem((window.sessionStorage.length + 1).toString(), $("#main").html());
    }
    $.ajax({
        url: "page5.html",
        dataType: "html",
        success: function (res) {
            $("#main").html(res);
            $("#main").find("script").each(function () {
                eval($(this).text());
            });
        },
        error: function (err) { console.log(err) },
    });
    $(document).ready(function () {
        $.ajax({
            url: "http://120.126.151.210/acupoint-1.1/acushow.php",
            dataType: "html",
            type: "post",
            data: {
                acu: name,
            },
            success: function (data) {
                $('.acupoint').append(data);
                menu_open();
            },
            error: function () {
                console.log("失敗");
            },
        });
    });
}
function favor() {
    var db1 = window.sqlitePlugin.openDatabase({
        name: "穴道.db",
        location: 'default',
        androidDatabaseProvider: 'system'
    });
    db1.transaction(
        function (tx) {
            tx.executeSql('CREATE TABLE IF NOT EXISTS Acupoint (id integer primary key, acupoint text)');
            tx.executeSql("select count(id) as cnt from Acupoint;", [], function (tx, res) {
                var strMsg = res.rows.item(0).cnt;
                if (strMsg == "0") {
                    $('#favoriteacupoint').html('<center><font color="black" size="5">尚未加入任何穴道</font></center>')
                }
                else {
                    tx.executeSql("select * from Acupoint;", [], function (tx, res) {
                        var strMsg = "";
                        for (var i = 0; i < res.rows.length; i++) {
                            strMsg += "<li" + " onclick='redirect2page5(\"" + res.rows.item(i)["acupoint"] + "\")'><a>" + res.rows.item(i)["acupoint"] + "</a></li>\n";
                        }
                        $('#favoriteacupoint').html(strMsg);
                    });
                }
            });
        }
    );
    var db2 = window.sqlitePlugin.openDatabase({
        name: "症狀.db",
        location: 'default',
        androidDatabaseProvider: 'system'
    });
    db2.transaction(
        function (tx) {
            tx.executeSql('CREATE TABLE IF NOT EXISTS Sympton (id integer primary key, sympton text)');
            tx.executeSql("select count(id) as cnt from Sympton;", [], function (tx, res) {
                var strMsg = res.rows.item(0).cnt;
                if (strMsg == "0") {
                    $('#favoritesympton').html('<center><font color="black" size="5">尚未加入任何症狀</font></center>')
                }
                else {
                    tx.executeSql("select * from Sympton;", [], function (tx, res) {
                        var strMsg = "";
                        for (var i = 0; i < res.rows.length; i++) {
                            strMsg += "<li" + " onclick='redirect2page8(\"" + res.rows.item(i)["sympton"] + "\")'><a>" + res.rows.item(i)["sympton"] + "</a></li>\n";
                        }
                        $('#favoritesympton').html(strMsg);
                    });
                }
            });
        }
    );
}