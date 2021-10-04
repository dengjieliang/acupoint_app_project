function check(name) {
    $.ajax({
        url: 'http://120.126.151.210/acupoint-1.1/disinsql.php',
        type: 'POST',
        dataType: 'json',
        data: {
            nickname: document.getElementById('query' + name).value,
        },
        success: function (msg) {
            document.getElementById("moddal").style.display = "";
            $(".modal-title").html('請選擇替代症狀');
            var dis = "<select class=\"form-control\" id=\"disfromphp\" name=\"" + 'query' + name + "\">";
            $.each(msg, function (i, item) {
                dis += "<option>" + msg[i] + "</option>";
            })
            dis += "</select>";
            $(".modal-body").html(dis);
            $(".btn.btn-secondary").html('關閉');
            $(".btn.btn-primary").html('選擇');
            $("#exampleModalCenter").modal();
        },
        error: function (msg) {
            if (msg['responseText'] == 'success') {
                document.getElementById('query' + name).disabled = true;
                $('#btn' + name).attr('disabled', "true");
            }
            else if (msg['responseText'] == 'no') {
                $(".modal-title").html('無相似症狀');
                $(".modal-body").html('');
                $(".btn.btn-secondary").html('關閉');
                document.getElementById("moddal").style.display = "none";
                $("#exampleModalCenter").modal();
            }
        },
    })
}
function clean(name) {
    document.getElementById('query' + name).value = "";
    document.getElementById('query' + name).innerHTML = "";
    document.getElementById('query' + name).disabled = false;
    document.getElementById('btn' + name).disabled = false;
}
function dischose() {
    var chose = document.getElementById('disfromphp').value;
    var nickname = document.getElementById('disfromphp').name;
    document.getElementById(nickname).value = chose;
    document.getElementById(nickname).innerHTML = chose;
    document.getElementById(nickname).disabled = true;
    if(nickname.length == 6)
        document.getElementById('btn' + nickname[5]).disabled = true;
    else if(nickname.length == 7)
        document.getElementById('btn' + nickname[5] + nickname[6]).disabled = true;
    else if(nickname.length == 8)
        document.getElementById('btn' + nickname[5] + nickname[6] + nickname[7]).disabled = true;
    $("#exampleModalCenter").modal('hide');
}
function addnewsearch() {
    for(i = 1; i <= 200; i++){
        if(document.getElementById("search" + i.toString()).style.display == "none"){
            document.getElementById("search" + i.toString()).style.display = "";
            break;
        }
    }
}