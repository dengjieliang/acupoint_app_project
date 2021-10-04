function previouspage() {
    var value = window.sessionStorage.getItem((window.sessionStorage.length).toString());
    if (value != null) {
        $("#main").html(value);
        $("#main").find("script").each(function () {
            eval($(this).text());
        });
        window.sessionStorage.removeItem((window.sessionStorage.length).toString());
        if((value.indexOf('文字症狀搜尋') == -1 && value.indexOf('search200') == -1 && value.indexOf('我的最愛') == -1 && value.indexOf('教學') == -1 && value.indexOf('搜尋結果') == -1)){
            menu_open();
        }
    }
}