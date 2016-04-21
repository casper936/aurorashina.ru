/* Block sidebar */
$(function() {
	var li = $(".sidebar_cont > ul > li ul > li > a > span").click(function() {
		li.removeClass('selected');
		$(this).addClass('selected');

	});
});
/* End Block sidebar */

$(document).ready(function() {
	$("#load_price").click(function() {
		$("#content").load('php/price.php');
		$("#section").html("Раздел для загрузки прайса");
	});
});

$(document).ready(function() {
	$("#edit_price").click(function() {
		$("#content").load('php/categories.php');
	});
});

$(document).ready(function() {
	$("#tyres").click(function() {
		$("#content").load('php/table_tyre.php');
		$("#section").html("Раздел 'Редактирование Шин'");
	});
});
$(document).ready(function() {
	$("#models").click(function() {
		$("#content").load('php/models.php');
	});
});

$(document).ready(function() {
	$("#disks").click(function() {
		$("#content").load('php/categories.php');
	});
});

$(document).ready(function() {
	$("#edit_users").click(function() {
		$("#content").load('php/users.php');
		$("#section").html("Раздел 'Пользователи'");
	});
});

$(document).ready(function() {
	$("#content").children("#content_body").html("sdss");
});


$(document).ready(function() {
    var url = 'php/section.php'
    $(".section").click(function(e) {
        var k = new Array(), key_k, page;
        $(".section").each(function(i) {
            k.push($(this));
            if (this == e.target) {
                key_k = i;
            }
        })
        page = $(k[key_k]).attr("id");
      $.post (
            url,
            {pages: page},
            function(result) {
                $('#content').html(result);
            }
        );
    })
});

/*$(document).ready(function() {
	var url = '/tyres/tyres.php';
	$("#icont").click(function() {
		$.post (
			url,
			{data: data},
			function(result) {
				
			}
		);
	});
});*/

/*$(document).ready(function() {
	$(".photo").hover(function(event) {
		$(this).addClass("Photo_hover");
	},
	function() {
		$(this).removeClass("Photo_hover");
	});
	$(".photo").click(function(e) {
		var a = new Array(), key, name;
		$(".photo").each(function(i) {
			a.push($(this));
			if (this == e.target) {
				key = i;
			}
		})
		name = $(a[key]).attr("id");
	})
});*/