<div id="content" class="col-sm-12" data-cate="<?php echo $id_genre; ?>">
	<div class="col-sm-12 selectdiv">
		<select id="sort_sp">
			<option value="1">
				Name (A-Z)
			</option>
			<option value="2">
				Name (Z-A)
			</option>
			<option value="3">
				Price (Low-Hight)
			</option>
			<option value="4">
				Price (Hight-Low)
			</option>
		</select>
	</div>
</div>
<script type="text/javascript">
	$(".js-range-slider").ionRangeSlider({
		skin: "sharp",
		type: "double",
		grid: true,
		min: 0,
		max: 500000,
		from: 2000,
		to: 250000,
		prefix: "đ"
	});
	var dataproduct = $.parseJSON($.ajax({
		url: '../getProduct',
		type: 'POST',
		async: false,
		data: {
			id_genre: $('#content').attr('data-cate')
		}
	}).responseText);
	console.log(dataproduct);
	var mang;
	var test = 8;
	if (dataproduct.length > test) {
		var num = test;
	} else {
		var num = dataproduct.length;
	}
	for (var i = 0; i < num; i++) {
		showProduct(dataproduct, i);
	}
	var pagnition = $('<div>').attr({
		class: 'col-sm-12 text-right'
	}).insertAfter($('#content'));
	var nav = $('<nav>').attr({
		'aria-label': 'Page navigation example'
	}).appendTo($(pagnition));
	var ul = $('<ul>').attr({
		class: 'pagination'
	}).appendTo($(nav));
	if (dataproduct.length % test == 0) {
		var lap = dataproduct.length / test;
	} else {
		var lap = parseInt(dataproduct.length / test) + 1;
	}
	for (var i = 0; i < lap; i++) {
		var li = $('<li>').addClass('page-item').appendTo($(ul));
		var a = $('<a>').addClass('page-link').attr({
			onclick: 'pagni($(this))',
			'data-currentpage': i
		}).text(i + 1).appendTo($(li));
	}
	var input = $('<input>').val(dataproduct).attr({
		id: 'chuadata'
	}).css({
		display: 'none'
	}).appendTo($(nav));
	mang = dataproduct;
	$('#sort_sp').on('change', function() {
		if (this.value == 1) {
			dataproduct.sort(function(a, b) {
				return compareStrings(a.name, b.name);
			});
			$('#content').contents(':not(.selectdiv)').remove();
			$('#content').next().remove();
			for (var i = 0; i < num; i++) {
				showProduct(dataproduct, i);
			}
			var pagnition = $('<div>').attr({
				class: 'col-sm-12 text-right'
			}).insertAfter($('#content'));
			var nav = $('<nav>').attr({
				'aria-label': 'Page navigation example'
			}).appendTo($(pagnition));
			var ul = $('<ul>').attr({
				class: 'pagination'
			}).appendTo($(nav));
			if (dataproduct.length % test == 0) {
				var lap = dataproduct.length / test;
			} else {
				var lap = parseInt(dataproduct.length / test) + 1;
			}
			for (var i = 0; i < lap; i++) {
				var li = $('<li>').addClass('page-item').appendTo($(ul));
				var a = $('<a>').addClass('page-link').attr({
					onclick: 'pagni($(this))',
					'data-currentpage': i
				}).text(i + 1).appendTo($(li));
			}
			var input = $('<input>').val(dataproduct).attr({
				id: 'chuadata'
			}).css({
				display: 'none'
			}).appendTo($(nav));
			mang = dataproduct;
		} else if (this.value == 2) {
			dataproduct.sort(function(a, b) {
				return compareStringsL(a.name, b.name);
			});
			$('#content').contents(':not(.selectdiv)').remove();
			$('#content').next().remove();
			for (var i = 0; i < num; i++) {
				showProduct(dataproduct, i);
			}
			var pagnition = $('<div>').attr({
				class: 'col-sm-12 text-right'
			}).insertAfter($('#content'));
			var nav = $('<nav>').attr({
				'aria-label': 'Page navigation example'
			}).appendTo($(pagnition));
			var ul = $('<ul>').attr({
				class: 'pagination'
			}).appendTo($(nav));
			if (dataproduct.length % test == 0) {
				var lap = dataproduct.length / test;
			} else {
				var lap = parseInt(dataproduct.length / test) + 1;
			}
			for (var i = 0; i < lap; i++) {
				var li = $('<li>').addClass('page-item').appendTo($(ul));
				var a = $('<a>').addClass('page-link').attr({
					onclick: 'pagni($(this))',
					'data-currentpage': i
				}).text(i + 1).appendTo($(li));
			}
			var input = $('<input>').val(dataproduct).attr({
				id: 'chuadata'
			}).css({
				display: 'none'
			}).appendTo($(nav));
			mang = dataproduct;
		} else if (this.value == 3) {
			dataproduct.sort(function(a, b) {
				return parseFloat(a.price) - parseFloat(b.price);
			});
			$('#content').contents(':not(.selectdiv)').remove();
			$('#content').next().remove();
			for (var i = 0; i < num; i++) {
				showProduct(dataproduct, i);
			}
			var pagnition = $('<div>').attr({
				class: 'col-sm-12 text-right'
			}).insertAfter($('#content'));
			var nav = $('<nav>').attr({
				'aria-label': 'Page navigation example'
			}).appendTo($(pagnition));
			var ul = $('<ul>').attr({
				class: 'pagination'
			}).appendTo($(nav));
			if (dataproduct.length % test == 0) {
				var lap = dataproduct.length / test;
			} else {
				var lap = parseInt(dataproduct.length / test) + 1;
			}
			for (var i = 0; i < lap; i++) {
				var li = $('<li>').addClass('page-item').appendTo($(ul));
				var a = $('<a>').addClass('page-link').attr({
					onclick: 'pagni($(this))',
					'data-currentpage': i
				}).text(i + 1).appendTo($(li));
			}
			var input = $('<input>').val(dataproduct).attr({
				id: 'chuadata'
			}).css({
				display: 'none'
			}).appendTo($(nav));
			mang = dataproduct;
		} else {
			dataproduct.sort(function(a, b) {
				return parseFloat(b.price) - parseFloat(a.price);
			});
			$('#content').contents(':not(.selectdiv)').remove();
			$('#content').next().remove();
			for (var i = 0; i < num; i++) {
				showProduct(dataproduct, i);
			}
			var pagnition = $('<div>').attr({
				class: 'col-sm-12 text-right'
			}).insertAfter($('#content'));
			var nav = $('<nav>').attr({
				'aria-label': 'Page navigation example'
			}).appendTo($(pagnition));
			var ul = $('<ul>').attr({
				class: 'pagination'
			}).appendTo($(nav));
			if (dataproduct.length % test == 0) {
				var lap = dataproduct.length / test;
			} else {
				var lap = parseInt(dataproduct.length / test) + 1;
			}
			for (var i = 0; i < lap; i++) {
				var li = $('<li>').addClass('page-item').appendTo($(ul));
				var a = $('<a>').addClass('page-link').attr({
					onclick: 'pagni($(this))',
					'data-currentpage': i
				}).text(i + 1).appendTo($(li));
			}
			var input = $('<input>').val(dataproduct).attr({
				id: 'chuadata'
			}).css({
				display: 'none'
			}).appendTo($(nav));
			mang = dataproduct;
		}
	});
	function hoversp(obj) {
		$(obj).children('div').addClass('show_div_product');
		$(obj).children('.btn_sp_group').children('.like_sp').css({
			animation: 'hienralike 0.4s forwards'
		});
		$(obj).children('.btn_sp_group').children('.add_sp').css({
			animation: 'hienraadd 0.4s forwards'
		});
	}

	function outhoversp(obj) {
		$(obj).children('div').removeClass('show_div_product');
		$(obj).children('.btn_sp_group').children('.like_sp').css({
			animation: ''
		});
		$(obj).children('.btn_sp_group').children('.add_sp').css({
			animation: ''
		});
	}

	function compareStrings(a, b) {
		// Assuming you want case-insensitive comparison
		a = a.toLowerCase();
		b = b.toLowerCase();
		return (a < b) ? -1 : (a > b) ? 1 : 0;
	}

	function compareStringsL(a, b) {
		// Assuming you want case-insensitive comparison
		a = a.toLowerCase();
		b = b.toLowerCase();
		return (a > b) ? -1 : (a < b) ? 1 : 0;
	}

	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	function pagni(obj) {
		$([document.documentElement, document.body]).animate({
			scrollTop: $("#content").offset().top - 30
		}, 1000);
		$('#content').contents(':not(.selectdiv)').remove();
		for (var i = 8 * obj.attr('data-currentpage'); i < 8 * obj.attr('data-currentpage') + 8; i++) {
			if (i < mang.length) {
				showProduct(mang, i);
			}
		}
	}
	$('#search_price').click(function(event) {
		var data_price = $('.js-range-slider').data("ionRangeSlider");
		var filter = [];
		for (var i = 0; i < dataproduct.length; i++) {
			if ((dataproduct[i]['price'] >= data_price['old_from']) && (dataproduct[i]['price'] <= data_price['old_to'])) {
				filter.push(dataproduct[i]);
			}
		}
		$('#content').contents(':not(.selectdiv)').remove();
		$('#content').next().remove();
		if(filter.length){
			for (var i = 0; i < num; i++) {
				showProduct(filter, i);
			}
		}else{
			var div = $('<div>').attr({
				class: 'col-xs-6 col-md-3 khoisp',
				style: 'height: 300px;margin-bottom: 10px;cursor: pointer;overflow: hidden;'
				}).text('No products available').appendTo($('#content'));
		}
		var pagnition = $('<div>').attr({
			class: 'col-sm-12 text-right'
		}).insertAfter($('#content'));
		var nav = $('<nav>').attr({
			'aria-label': 'Page navigation example'
		}).appendTo($(pagnition));
		var ul = $('<ul>').attr({
			class: 'pagination'
		}).appendTo($(nav));
		if (filter.length % test == 0) {
			var lap = filter.length / test;
		} else {
			var lap = parseInt(filter.length / test) + 1;
		}
		for (var i = 0; i < lap; i++) {
			var li = $('<li>').addClass('page-item').appendTo($(ul));
			var a = $('<a>').addClass('page-link').attr({
				onclick: 'pagni($(this))',
				'data-currentpage': i
			}).text(i + 1).appendTo($(li));
		}
		var input = $('<input>').val(dataproduct).attr({
			id: 'chuadata'
		}).css({
			display: 'none'
		}).appendTo($(nav));
		mang = filter;
	});

	function showProduct(dataproduct, i) {
		var div = $('<div>').attr({
			class: 'col-xs-6 col-md-3 khoisp',
			style: 'height: 300px;margin-bottom: 10px;cursor: pointer;overflow: hidden;'
		}).appendTo($('#content'));
		var a = $('<a>').attr({
			href: location.protocol + "//" + document.domain + "/home/product/" + dataproduct[i]['id'],
		}).appendTo($(div));
		var _1sp = $('<div>').attr({
			class: '1sp',
			style: 'position: relative;width: 100%;height: 85%;',
			onmouseover: "hoversp(this)",
			onmouseout: "outhoversp(this)"
		}).appendTo($(a));
		var img_link = dataproduct[i]['image'].split(',')[1];
		var img = $('<img>').attr({
			src: '<?php echo FIELD; ?>/app/webroot/img/product/' + img_link,
			style: 'width:100%;height:100%;max-width: 100%;position: absolute;top:0;right: 0;'
		}).appendTo($(_1sp));
		var div_2 = $('<div>').attr({
			style: 'width: 100%;height: 100%;position: absolute;top:0;right: 0;max-width: 100%;'
		}).appendTo($(_1sp));
		var div_3 = $('<div>').attr({
			style: 'position: absolute;bottom:0px;right: 0;width: 100%;height: 18%;',
			class: 'btn_sp_group'
		}).appendTo($(_1sp));
		var btn = $('<button>').attr({
			class: 'btn-outline-danger like_sp',
			style: 'width: 50%;height: 100%;float: left;background-color: #040404b5;opacity: 0;'
		}).appendTo($(div_3));
		var itag = $('<i>').attr({
			class: 'fas fa-heart',
			style: 'font-size: 15px;color: white;'
		}).appendTo($(btn));
		if ($("#content").attr("data-session") == "session") {
			var btn_2 = $('<button>').attr({
				class: 'btn-outline-danger add_sp',
				style: 'width: 50%;height: 100%;background-color: #040404b5;opacity: 0;'
			}).appendTo($(div_3));
		} else {
			var btn_2 = $('<button>').attr({
				class: 'btn-outline-danger add_sp',
				style: 'width: 50%;height: 100%;background-color: #040404b5;opacity: 0;',
				'data-izimodal-open': "#modal-custom"
			}).appendTo($(div_3));
		}
		var i_2 = $('<i>').attr({
			class: 'fas fa-cart-plus',
			style: 'font-size: 15px;color: white;'
		}).appendTo($(btn_2));
		var divtt = $('<div>').attr({
			class: 'tt',
			style: 'width: 100%;height: 15%;'
		}).appendTo($(div));
		var h4 = $('<h4>').attr({
			style: 'display: block; width: 100%;height: 50%;margin: 0;padding-top: 2px;'
		}).text(dataproduct[i]['name']).appendTo($(divtt));
		var h4_2 = $('<h4>').attr({
			style: 'display: block; width: 50%;height: 50%;margin: 0;padding: 0;float:right;'
		}).addClass('text-right').text(numberWithCommas(dataproduct[i]['price']) + 'đ').appendTo($(divtt));
		var div_rate = $('<div>').css({
			width: '50%',
			height: '50%',
			margin: '0',
			padding: '0'
		}).appendTo($(divtt));
		var span_rate = $('<span>').addClass('rating').attr({
			'data-id': dataproduct[i]['rating'],
			'id': dataproduct[i]['id']
		}).appendTo($(div_rate));
		$(span_rate).jRate({
			rating: $(span_rate).attr('data-id'),
			readOnly: true
		});
	}
</script>
