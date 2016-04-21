$(document).ready(function() {
	$(".installation table").attr({
		border: "0", 
		cellspacing: "0", 
		cellpadding: "0"
	});
});


$(document).ready(function() {
	var tr1 = $("#h_tr1").width(), tr2 = $("#h_tr2").width(), tr3 = $("#h_tr3").width(), tr4 = $("#h_tr4").width(), tr5 = $("#h_tr5").width(), tr6 = $("#h_tr6").width(), tr7 = $("#h_tr7").width(), tr8 = $("#h_tr8").width(), tr9 = $("#h_tr9").width();
	$(window).scroll(function() {
		var value = $(".hb").height();
		if ($(window).scrollTop() > value) {
			$("#h_tr").addClass("hbf");
			$("#h_tr1").css('width',tr1);
			$("#h_tr2").css('width',tr2);
			$("#h_tr3").css('width',tr3);
			$("#h_tr4").css('width',tr4);
			$("#h_tr5").css('width',tr5);
			$("#h_tr6").css('width',tr6);
			$("#h_tr7").css('width',tr7);
			$("#h_tr8").css('width',tr8);
			$("#h_tr9").css('width',tr9);
			$("#h_td1").css('width',tr1);
			$("#h_td2").css('width',tr2);
			$("#h_td3").css('width',tr3);
			$("#h_td4").css('width',tr4);
			$("#h_td5").css('width',tr5);
			$("#h_td6").css('width',tr6);
			$("#h_td7").css('width',tr7);
			$("#h_td8").css('width',tr8);
			$("#h_td9").css('width',tr9);
		} else if ($(window).scrollTop() < value) {
			$("#h_tr").removeClass("hbf");
		}
		
	});
});

$(document).ready(function() {
	var url = '/pages/pages.php';
	$('.company').click(function(e) {		
		$.post (
			url,
			{index: 1},
			function(result) {
				$('#content').html(result);
			}
		);
	});
});
$(document).ready(function() {
	var url = '/pages/pages.php';
	$('.news').click(function() {
		$.post (
			url,
			{index: 2},
			function(result) {
				$('#content').html(result);
			}
		);
	});
});
$(document).ready(function() {
	var url = '/pages/pages.php';
	$('#icon_3').click(function() {
		$.post (
			url,
			{index: 5},
			function(result) {
				$('.body_content').html(result);
			}
		);
	});
});

/*$(document).ready(function() {
	$('#contacts').click(function() {
		$('#content').load('../pages/contacts.php .body_content');
	});
}); */
$(document).ready(function() {
	var url = '/pages/pages.php';
	$('#article').click(function() {
		$.post (
			url,
			{index: 4},
			function(result) {
				$('#content').html(result);
			}
		);
	});
});

$(document).ready(function() {
	$("#height_tyre").attr('disabled', true);
	$("#diameter_tyre").attr('disabled', true);
	$("#width_tyre").change(function() {
		var width_tyre = $(this).val(), url = '../tyres/tyres.php';
	if (width_tyre == '') {
			$("#height_tyre").html('<option>-Выберите ширину-</option>');
			$("#height_tyre").attr('disabled', true);
			return false;
		}
		$("#height_tyre").attr('desabled', true);
		$("#height_tyre").html('<option>Загрузка...</option>');
		$.post(
			url,
			{width: width_tyre},
			function(result) {
				if (result.type == 'error') {
					alert('Error');
					return(false);
				} else {
					var options = '';
					options += '<option value="">Выберите...</option>';
					$(result.heigth).each(function() {
						options += '<option value="' + $(this).attr('t_h') + '">' + $(this).attr('t_h') + '</option>';
					});
					$("#height_tyre").html(options);
					$("#height_tyre").attr('disabled', false);
				}
			},
			"json"
		);
	});
	$("#height_tyre").change(function() {
		var height_tyre = $(this).val(), width_tyre = $("#width_tyre").val() ,url = '/catalog/tyres/tyres.php';
	if (width_tyre == '') {
			$("#diameter_tyre").html('<option>-Выберите высоту-</option>');
			$("#diameter_tyre").attr('disabled', true);
			return false;
		}
		$("#diameter_tyre").attr('desabled', true);
		$("#diameter_tyre").html('<option>Загрузка...</option>');
		$.post(
			url,
			{heigth: height_tyre,
			 width_d: width_tyre},
			function(result) {
				if (result.type == 'error') {
					alert('Error');
					return(false);
				} else {
					var options = '';
					options += '<option value="">Выберите...</option>';
					$(result.diameter).each(function() {
						options += '<option value="' + $(this).attr('t_d') + '">' + $(this).attr('t_d') + '</option>';
					});
					$("#diameter_tyre").html(options);
					$("#diameter_tyre").attr('disabled', false);
				}
			},
			"json"
		);
	});
});


$(document).ready(function() {
	$("#search_tyre").click(function(){
		var width = $("#width_tyre").val(), height = $("#height_tyre").val(), diam = $("#diameter_tyre").val(), applicability = $("#os_tyre").val() ,brend = $("#brend_tyre").val(), season = $("#season").val(), url = '/catalog/tyres/temp.php';
	if (width == "" && height == "" && diam == "" && applicability == "" && brend == "" && season == "") {
		
	} else {
		$("tr").empty();
	params = {
		w:width,
		h:height,
		d:diam,
		a:applicability,
		b:brend,
		s:season
	};
	$.ajax({
		type: "POST",
		url: url,
		data: params,
		success: function(data) {
			if (data == 0) {
				$("table").empty();
				$(".mainContent").html("Извините, ничего не найдено");
			} else {
				$(".mainContent").html(data);
			}
		}
	});
	}
	});
});

$(document).ready(function() {
	$("#search_tyre_index").click(function(){
		var width = $("#standard_size").val(), applicability = $("#os_tyre").val() ,brend = $("#brend_tyre").val(), season = $("#season").val(), url = '/catalog/tyres/temp_index.php';
	if (width == "" && applicability == "" && brend == "" && season == "") {
			
		} else {
		$("tr").empty();
		params = {
		w:width,
		a:applicability,
		b:brend,
		s:season
	};
	$.ajax({
		type: "POST",
		url: url,
		data: params,
		success: function(data) {
			if (data == 0) {
				$("table").empty();
				$(".mainContent").html("Извините, ничего не найдено");
			} else {
				$(".mainContent").html(data);
			}
		}
	});
		}
	});
});

$(document).ready(function() {
	$("#search_disks").click(function(){
		var width = $("#width_disks").val(), diam = $("#diameter_disks").val(), pcd = $("#pcd").val(), et = $("#departure").val() ,brend = $("#brand_disks").val(), url = '/catalog/disks/temp.php';
		if (width == "" && diam == "" && pcd == "" && et == "" && brend == "") {
			
		} else {
		$("tr").empty();
	params = {
		w:width,
		p:pcd,
		d:diam,
		e:et,
		b:brend
	};
	$.ajax({
		type: "POST",
		url: url,
		data: params,
		success: function(data) {
			if (data == 0) {
				$("table").empty();
				$(".mainContent").html("Извините, ничего не найдено");
			} else {
				$(".mainContent").html(data);
			}
		}
	});
		}
	});
});

$(document).ready(function() {
	$("#reset").click(function(){
		location.reload();
	});
});

$(document).ready(function() {
	$("#width_disks").change(function() {
		var width_disks = $(this).val(), url = '/catalog/disks/disks.php';
		$("#diameter_disks").attr('desabled', true);
		$("#diameter_disks").html('<option>Загрузка...</option>');
		$.post(
			url,
			{width: width_disks},
			function(result) {
				if (result.type == 'error') {
					alert('Error');
					return(false);
				} else {
					var options = '';
					options += '<option value="">Выберите...</option>';
					$(result.diameter).each(function() {
						options += '<option value="' + $(this).attr('d_d') + '">' + $(this).attr('d_d') + '</option>';
					});
					$("#diameter_disks").html(options);
					$("#diameter_disks").attr('disabled', false);
				}
			},
			"json"
		);
	});
	$("#diameter_disks").change(function() {
		var diameter_disks = $(this).val(), width_disks = $("#width_disks").val() ,url = '/catalog/disks/disks.php';
		$("#pcd").attr('desabled', true);
		$("#pcd").html('<option>Загрузка...</option>');
		$.post(
			url,
			{diameter_d: diameter_disks,
			 width_dk: width_disks},
			function(result) {
				if (result.type == 'error') {
					alert('Error');
					return(false);
				} else {
					var options = '';
					options += '<option value="">Выберите...</option>';
					$(result.pcd).each(function() {
						options += '<option value="' + $(this).attr('d_pcd') + '">' + $(this).attr('d_pcd') + '</option>';
					});
					$("#pcd").html(options);
					$("#pcd").attr('disabled', false);
				}
			},
			"json"
		);
	});
	$("#pcd").change(function() {
		var pcd = $(this).val(), diameter_disks = $("#diameter_disks").val(), width_disks = $("#width_disks").val(), url = '/catalog/disks/disks.php';
		$("#departure").attr('desabled', true);
		$("#departure").html('<option>Загрузка...</option>');
		$.post(
			url,
			{diameter_d: diameter_disks,
			 width_dk: width_disks,
			 pcd_d: pcd},
			function(result) {
				if (result.type == 'error') {
					alert('Error');
					return(false);
				} else {
					var options = '';
					options += '<option value="">Выберите...</option>';
					$(result.et).each(function() {
						et_replace = $(this).attr('d_et');
						et_replace = et_replace.replace(/77777/g,"-");
						options += '<option value="' + $(this).attr('d_et') + '">' + et_replace + '</option>';
					});
					$("#departure").html(options);
					$("#departure").attr('disabled', false);
				}
			},
			"json"
		);
	});
	$("#departure").change(function() {
		var departure = $(this).val(), diameter_disks = $("#diameter_disks").val(), width_disks = $("#width_disks").val(), pcd = $('#pcd').val(), url = '/catalog/disks/disks.php';
		$("#brand_disks").attr('desabled', true);
		$("#brand_disks").html('<option>Загрузка...</option>');
		$.post(
			url,
			{diameter_d: diameter_disks,
			 width_dk: width_disks,
			 pcd_d: pcd,
			 departure_d: departure},
			function(result) {
				if (result.type == 'error') {
					alert('Error');
					return(false);
				} else {
					var options = '';
					options += '<option value="">Выберите...</option>';
					$(result.br).each(function() {
						options += '<option value="' + $(this).attr('d_br') + '">' + $(this).attr('d_br') + '</option>';
					});
					$("#brand_disks").html(options);
					$("#brand_disks").attr('disabled', false);
				}
			},
			"json"
		);
	});
});
$(document).ready(function() {
    $(".tr").click(function(e) {
        var brend, model, arr = new Array(), key;
		$('.tr').each(function(i) {
            arr.push($(this));
			if (this == e.target) {
				key = i;	
			}
        });
		brend = $(arr[key]).attr("br");
		model = $(arr[key]).attr("mod");
		console.log(brend, model);
//		alert(brend);
    });
});
