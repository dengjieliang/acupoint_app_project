function getdata1(id) {
	$.ajax({
		url: id + ".html",
		dataType: "html",
		success: function (res) {
			$("#main").html(res);
			$("#main").find("script").each(function () {
				eval($(this).text());
			});
			indexopen();
			onLoad();
		},
		error: function (err) { console.log(err) },
	});
};
function getdata2(id) {
	if (window.sessionStorage.key(0) === null && $("#main").html().indexOf('exampleModalCenter') == -1) {
		window.sessionStorage.setItem("1", $("#main").html());
	}
	else if ($("#main").html().indexOf('exampleModalCenter') == -1) {
		window.sessionStorage.setItem((window.sessionStorage.length + 1).toString(), $("#main").html());
	}
	else if (window.sessionStorage.key(0) === null) {
		$.ajax({
			url: "page2.html",
			dataType: "html",
			success: function (res) {
				window.sessionStorage.setItem("1", res);
			},
			error: function (err) { console.log(err) },
		});
	}
	else {
		$.ajax({
			url: "page2.html",
			dataType: "html",
			success: function (res) {
				window.sessionStorage.setItem((window.sessionStorage.length + 1).toString(), res);
			},
			error: function (err) { console.log(err) },
		});
	}
	$(document).ready(function () {
		$.ajax({
			url: id + ".html",
			dataType: "html",
			success: function (res) {
				$("#main").html(res);
				eval($(this).text());
				favor();
			},
			error: function (err) { console.log(err) },
		});
	})
};
function getdata3(id, name) {
	if (window.sessionStorage.key(0) === null && $("#main").html().indexOf('exampleModalCenter') == -1) {
		window.sessionStorage.setItem("1", $("#main").html());
	}
	else if ($("#main").html().indexOf('exampleModalCenter') == -1) {
		window.sessionStorage.setItem((window.sessionStorage.length + 1).toString(), $("#main").html());
	}
	else if (window.sessionStorage.key(0) === null) {
		$.ajax({
			url: "page2.html",
			dataType: "html",
			success: function (res) {
				window.sessionStorage.setItem("1", res);
			},
			error: function (err) { console.log(err) },
		});
	}
	else {
		$.ajax({
			url: "page2.html",
			dataType: "html",
			success: function (res) {
				window.sessionStorage.setItem((window.sessionStorage.length + 1).toString(), res);
			},
			error: function (err) { console.log(err) },
		});
	}
	$(document).ready(function () {
		$.ajax({
			url: id + ".html",
			dataType: "html",
			success: function (res) {
				$("#main").html(res);
				$('#topicc').html(name);
				eval($(this).text());
			},
			error: function (err) { console.log(err) },
		});
	})

};