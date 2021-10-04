/*
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function ($) {

	var $window = $(window),
		$head = $('head'),
		$body = $('body');

	// Breakpoints.
	breakpoints({
		xlarge: ['1281px', '1680px'],
		large: ['981px', '1280px'],
		medium: ['737px', '980px'],
		small: ['481px', '736px'],
		xsmall: ['361px', '480px'],
		xxsmall: [null, '360px'],
		'xlarge-to-max': '(min-width: 1681px)',
		'small-to-xlarge': '(min-width: 481px) and (max-width: 1680px)'
	});

	// Stops animations/transitions until the page has ...

	// ... loaded.
	$window.on('load', function () {
		window.setTimeout(function () {
			$body.removeClass('is-preload');
		}, 100);
	});

	// ... stopped resizing.
	var resizeTimeout;

	$window.on('resize', function () {

		// Mark as resizing.
		$body.addClass('is-resizing');

		// Unmark after delay.
		clearTimeout(resizeTimeout);

		resizeTimeout = setTimeout(function () {
			$body.removeClass('is-resizing');
		}, 100);

	});

	// Fixes.

	// Object fit images.
	if (!browser.canUse('object-fit')
		|| browser.name == 'safari')
		$('.image.object').each(function () {

			var $this = $(this),
				$img = $this.children('img');

			// Hide original image.
			$img.css('opacity', '0');

			// Set background.
			$this
				.css('background-image', 'url("' + $img.attr('src') + '")')
				.css('background-size', $img.css('object-fit') ? $img.css('object-fit') : 'cover')
				.css('background-position', $img.css('object-position') ? $img.css('object-position') : 'center');

		});

	// Sidebar.
	var $sidebar = $('#sidebar'),
		$sidebar_inner = $sidebar.children('.inner');

	// Inactive by default on <= large.
	breakpoints.on('<=large', function () {
		$sidebar.addClass('inactive');
	});

	breakpoints.on('>large', function () {
		$sidebar.removeClass('inactive');
	});

	// Hack: Workaround for Chrome/Android scrollbar position bug.
	if (browser.os == 'android'
		&& browser.name == 'chrome')
		$('<style>#sidebar .inner::-webkit-scrollbar { display: none; }</style>')
			.appendTo($head);

	// Toggle.
	$('<a href="#sidebar" class="toggle">Toggle</a>')
		.appendTo($sidebar)
		.on('click', function (event) {

			// Prevent default.
			event.preventDefault();
			event.stopPropagation();

			// Toggle.
			$sidebar.toggleClass('inactive');

		});

	// Events.

	// Link clicks.
	$sidebar.on('click', 'a', function (event) {

		// >large? Bail.
		if (breakpoints.active('>large'))
			return;

		// Vars.
		var $a = $(this),
			href = $a.attr('href'),
			target = $a.attr('target');

		// Prevent default.
		event.preventDefault();
		event.stopPropagation();

		// Check URL.
		if (!href || href == '#' || href == '')
			return;

		// Hide sidebar.
		$sidebar.addClass('inactive');

		// Redirect to href.
		setTimeout(function () {

			if (target == '_blank')
				window.open(href);
			else
				window.location.href = href;

		}, 500);

	});

	// Prevent certain events inside the panel from bubbling.
	$sidebar.on('click touchend touchstart touchmove', function (event) {

		// >large? Bail.
		if (breakpoints.active('>large'))
			return;

		// Prevent propagation.
		event.stopPropagation();

	});

	// Hide panel on body click/tap.
	$body.on('click touchend', function (event) {

		// >large? Bail.
		if (breakpoints.active('>large'))
			return;

		// Deactivate.
		$sidebar.addClass('inactive');

	});

	// Scroll lock.
	// Note: If you do anything to change the height of the sidebar's content, be sure to
	// trigger 'resize.sidebar-lock' on $window so stuff doesn't get out of sync.

	$window.on('load.sidebar-lock', function () {

		var sh, wh, st;

		// Reset scroll position to 0 if it's 1.
		if ($window.scrollTop() == 1)
			$window.scrollTop(0);

		$window
			.on('scroll.sidebar-lock', function () {

				var x, y;

				// <=large? Bail.
				if (breakpoints.active('<=large')) {

					$sidebar_inner
						.data('locked', 0)
						.css('position', '')
						.css('top', '');

					return;

				}

				// Calculate positions.
				x = Math.max(sh - wh, 0);
				y = Math.max(0, $window.scrollTop() - x);

				// Lock/unlock.
				if ($sidebar_inner.data('locked') == 1) {

					if (y <= 0)
						$sidebar_inner
							.data('locked', 0)
							.css('position', '')
							.css('top', '');
					else
						$sidebar_inner
							.css('top', -1 * x);

				}
				else {

					if (y > 0)
						$sidebar_inner
							.data('locked', 1)
							.css('position', 'fixed')
							.css('top', -1 * x);

				}

			})
			.on('resize.sidebar-lock', function () {

				// Calculate heights.
				wh = $window.height();
				sh = $sidebar_inner.outerHeight() + 30;

				// Trigger scroll.
				$window.trigger('scroll.sidebar-lock');

			})
			.trigger('resize.sidebar-lock');

	});

})(jQuery);
function indexopen() {
	var $menu = $('#menu'),
		$menu_openers = $menu.children('ul').find('.opener');

	// Openers.
	$menu_openers.each(function () {

		var $this = $(this);

		$this.on('click', function (event) {

			// Prevent default.
			event.preventDefault();

			// Toggle.
			$menu_openers.not($this).removeClass('active');
			$this.toggleClass('active');

			// Trigger resize (sidebar lock).


		});

	});
}

function menu_open() {
	// Menu.
	var $menu = $('#menu'),
		$menu_openers = $menu.children('ul').find('.opener');

	// Openers.
	$menu_openers.each(function () {

		var $this = $(this);

		$this.on('click', function (event) {

			// Prevent default.
			event.preventDefault();

			// Toggle.
			$menu_openers.not($this).removeClass('active');
			$this.toggleClass('active');
			$window.triggerHandler('resize.sidebar-lock');
		});

	});
};
function redirect2page5(name) {
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
		type: "post",
		success: function (res) {
			$("#main").html(res);
			$("#main").find("script").each(function () {
				eval($(this).text());
			});
		},
		error: function () {
			alert("失敗");
		},
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
};
function redirect2page8(name) {
	var db1 = window.sqlitePlugin.openDatabase({
		name: "症狀.db",
		location: 'default',
		androidDatabaseProvider: 'system'
	});
	db1.transaction(
		function (tx) {
			tx.executeSql('CREATE TABLE IF NOT EXISTS Sympton (id integer primary key, sympton text)');
			tx.executeSql("select count(id) as cnt from Sympton;", [], function (tx, res) {
				$('#addsympton').html('加入最愛');
				$('#addsympton').attr("onclick", "addsympton('" + name + "');");
				var strMsg = res.rows.item(0).cnt;
				if (strMsg != "0") {
					tx.executeSql("select * from Sympton;", [], function (tx, res) {
						for (var i = 0; i < res.rows.length; i++) {
							if (res.rows.item(i)["sympton"] == name) {
								$('#addsympton').html('移出最愛');
								$('#addsympton').attr("onclick", "delsympton('" + name + "');");
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
		url: "page8.html",
		dataType: "html",
		type: "post",
		success: function (res) {
			$("#main").html(res);
			$("#main").find("script").each(function () {
				eval($(this).text());
			});
		},
		error: function () {
			alert("失敗");
		},
	})
	$(document).ready(function () {
		$.ajax({
			url: "http://120.126.151.210/acupoint-1.1/disshow.php",
			dataType: "json",
			type: "post",
			data: {
				dis: name,
			},
			success: function (data) {
				$('.acupoint1').append(data);
				menu_open();
			},
			error: function () {
				console.log("失敗");
			}
		});
	});
}

