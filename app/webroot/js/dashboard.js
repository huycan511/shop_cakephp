$(function () {
	$("#search_products").click(function(){
		const name = $(this).prev().prev().val();
		const price = $(this).prev().val();
		if(name.trim() == ''){
			$.toast({
				heading: 'Error',
				text: 'Please check your input',
				icon: 'error',
				position: 'bottom-right',
				loader: false
			});
		}else{
			window.location.replace(location.protocol + "//" + document.domain + "/products/search?name=" + name +"&price=" + price + "&page=0",);
		}

	});
	$("#cancel_buy_now").click(function(){
		$(".modal-window").css("display", "none");
		$("#buy_now_name").val('');
		$("#buy_now_phone").val('');
		$('#hanhchinh').val('');
		$('#huyen').val('');
		$('#xa').val('');
		$("#buy_now_sonha").val('');
		$('#buy_now_amount').val(1);
	});

	$("#submit_buy_now").click(function(){
		const name =  $("#buy_now_name").val();
		const phone = $("#buy_now_phone").val();
		const sonha = $("#buy_now_sonha").val();
		const id_product = $(this).attr('data-id');
		const xa = $("#xa").val();
		if(name && phone && sonha && xa){
			const address = sonha + xa;
			const dongia = $("#buy_now_dongia").text();
			const info = name + ' - ' + phone;
			var geocoder;
			geocoder = new google.maps.Geocoder();
			geocoder.geocode({ 'address': xa }, function (results, status) {
				if (status == 'OK') {
					var latitude = results[0].geometry.location.lat();
					var longitude = results[0].geometry.location.lng();
					$.ajax({
						url: location.protocol + "//" + document.domain + "/users/buyNow",
						type: 'POST',
						data: {
							info: info,
							address: address,
							dongia: dongia,
							lat: latitude,
							lng: longitude,
							id_product: id_product,
							amount: $("#buy_now_amount").val(),
						},
					})
						.done(function (res) {
							if(res == 'false'){
								$.toast({
									heading: 'Error',
									text: 'Something wrong',
									icon: 'error',
									position: 'bottom-right',
									loader: false
								});
								setTimeout(function () {
									window.location = location.protocol + "//" + document.domain;
								}, 2000);
							}else{
								$.toast({
									heading: 'Success',
									text: 'Order success',
									icon: 'success',
									position: 'bottom-right',
									loader: false
								});
								setTimeout(function () {
									window.location = location.protocol + "//" + document.domain;
								}, 2000);
							}
						})
						.fail(function () {
							$.toast({
								heading: 'Error',
								text: 'Something wrong, please try again!',
								icon: 'error',
								position: 'bottom-right',
								loader: false
							});
						});
				}
			});
		}else{
			$.toast({
				heading: 'Error',
				text: 'Please fill the form',
				icon: 'error',
				position: 'bottom-right',
				loader: false
			});
		}
	});

	$("#buy_now_amount").change(function() {
		const unit = parseInt($(this).attr('data-price'));
		$("#buy_now_dongia").text(unit * $(this).val());
	});

	$(".open_buy_modal").click(function(){
		const img = $(this).parent().prev().children().attr('src');
		const id_product = $(this).prev().attr('data-product');
		$('#submit_buy_now').attr('data-id', id_product);
		$("#buy_now_dongia").text($(this).attr("data-price"));
		$("#buy_now_amount").attr('data-price', $(this).attr("data-price"));
		$("#img_buy_now").attr('src', img);
		$(".modal-window").css("display", "block");
	})

	$(".buy_now").click(function(e){
		e.preventDefault();
		const img = $(this).parent().prev().prev().attr('src');
		$('#submit_buy_now').attr('data-id', $(this).attr('data-id'));
		$("#buy_now_dongia").text($(this).attr("data-price"));
		$("#buy_now_amount").attr('data-price', $(this).attr("data-price"));
		$("#img_buy_now").attr('src', img);
		$(".modal-window").css("display", "block");
	})

	$(".buy_now_product_page").click(function(){
		const img = $(this).parent().parent().prev().children().children().children().children().attr('src');
		$('#submit_buy_now').attr('data-id', $(this).prev().attr('data-product'));
		$("#img_buy_now").attr('src', img);
		$("#buy_now_dongia").text($(this).attr("data-price"));
		$("#buy_now_amount").attr('data-price', $(this).attr("data-price"));
		$(".modal-window").css("display", "block");
	});

	$("#subscribe_email").click(function (e) {
		var email = $(this).prev().val();
		$.ajax({
			type: "POST",
			url: location.protocol + "//" + document.domain + "/mails/subscribe",
			data: {
				mail: email,
			},
			success: function (response) {
			}
		});
		$.toast({
			heading: 'Success',
			text: 'Subscibe done!',
			icon: 'success',
			position: 'bottom-right',
			loader: false
		});
		$(this).prev().val('');
	});
	$(".remove_wishlist").click(function (e) {
		$.ajax({
			url: location.protocol + "//" + document.domain + "/users/removeWishlist",
			type: 'post',
			data: {
				id_product: $(this).attr('data-id')
			},
			success: function (data) {
				location.reload();
			}
		});
	});
	$.ajax({
		url: '/home/authFacebook',
		dataType: 'json',
		success: function (response) {
			$('.btn-auth').attr('href', response).addClass('login-facebook');
		}
	});

	var dataProduct = $.parseJSON($.ajax({
		url: location.protocol + "//" + document.domain + "/products/getAllProduct",
		dataType: "json",
		async: false
	}).responseText);
	var options = {
		data: dataProduct,
		placeholder: "Search...",


		getValue: "name",
		list: {
			match: {
				enabled: true
			}, showAnimation: {
				type: "fade", //normal|slide|fade
				time: 400,
				callback: function () { }
			},

			hideAnimation: {
				type: "slide", //normal|slide|fade
				time: 400,
				callback: function () { }
			},
			onClickEvent: function () {
				var index = $("#searchText").getSelectedItemData().link;
				window.location = index;
			}
		},

		template: {
			type: "iconLeft",
			fields: {
				iconSrc: "icon"
			}
		}
	};
	if ($("#searchText").length > 0) {
		$("#searchText").easyAutocomplete(options);
	}
	$("#modal-custom").on('click', 'header a', function (event) {
		event.preventDefault();
		var index = $(this).index();
		$(this).addClass('active').siblings('a').removeClass('active');
		$(this).parents("div").find("section").eq(index).removeClass('hide').siblings('section').addClass('hide');

		if ($(this).index() === 0) {
			$("#modal-custom .iziModal-content .icon-close").css('background', '#ddd');
		} else {
			$("#modal-custom .iziModal-content .icon-close").attr('style', '');
		}
	});
	$('.remove_in_cart').click(function (e) {
		$.ajax({
			url: location.protocol + "//" + document.domain + "/users/removeProduct",
			type: 'POST',
			data: {
				id_product: $(this).prev().attr('data-id')
			}
		})
			.done(function () {
				window.location.reload();
			})
			.fail(function () {
				window.location.reload();
			});
	});
	$('.like_product').click(function (event) {
		$.ajax({
			url: location.protocol + "//" + document.domain + "/users/likeProduct",
			type: 'POST',
			data: {
				id_product: $(this).attr('data-product')
			}
		})
			.done(function (res) {
				$.ajax({
					url: location.protocol + "//" + document.domain + "/home/getWishList"
				})
					.done(function (res1) {

						$("#span_wishtlist").empty();
						$("#span_wishtlist").text('(' + res1 + ' )');
						$.toast({
							heading: 'Success',
							text: 'Add to your wishlist ',
							icon: 'success',
							position: 'bottom-right',
							loader: false
						});
					}).fail(function () {
						console.log("error");
					});
			})
			.fail(function () {
				console.log("error");
			});
	});
	$(".update_cart").click(function (e) {
		var amount = $(this).parent().prev().val();
		$.ajax({
			url: location.protocol + "//" + document.domain + "/users/updateCart",
			type: 'POST',
			data: {
				amount: amount,
				id_product: $(this).attr('data-id')
			}
		})
			.done(function (res) {
				window.location.reload();
			})
			.fail(function () {
				window.location.reload();
			});
	})
	$("#change_pass").click(function (event) {
		if (($("#new_pass").val() == $("#confirm_pass").val()) && $("#new_pass").val() && $("#confirm_pass").val()) {
			if ($(this).attr('data-type') == "old") {
				$.ajax({
					url: location.protocol + "//" + document.domain + "/users/change_old_pass",
					type: 'POST',
					data: {
						id_user: $(this).attr("data-user"),
						current_pass: $("#current_pass").val(),
						new_pass: $("#new_pass").val()
					}
				})
					.done(function (res) {

						if (res == 1) {
							$.toast({
								heading: 'Success',
								text: 'Change password success!',
								icon: 'success',
								position: 'bottom-right',
								loader: false
							});
						} else {
							$.toast({
								heading: 'Error',
								text: 'Current password wrong!',
								icon: 'error',
								position: 'bottom-right',
								loader: false
							});
						}
					})
					.fail(function () {
						console.log("error");
					});
			} else {
				$.ajax({
					url: location.protocol + "//" + document.domain + "/users/set_new_pass",
					type: 'POST',
					data: {
						id_user: $(this).attr("data-user"),
						new_pass: $("#new_pass").val()
					}
				})
					.done(function (res) {
						if (res == 1) {
							$.toast({
								heading: 'Success',
								text: 'Set password success!',
								icon: 'success',
								position: 'bottom-right',
								loader: false
							});
						}
					})
					.fail(function () {
						console.log("error");
					});
			}
		} else {
			$.toast({
				heading: 'Error',
				text: 'Something wrong, please check!',
				icon: 'error',
				position: 'bottom-right',
				loader: false
			});
		}
	})
	$(".edit_user_name").click(function (event) {
		$(this).addClass("d-none");
		$(this).next().removeClass("d-none");
		$(this).parent().prev().children("h3").addClass("d-none");
		$(this).parent().prev().children("input").removeClass("d-none");
	})
	$(".edit_user_phone").click(function (event) {
		$(this).addClass("d-none");
		$(this).next().removeClass("d-none");
		$(this).parent().prev().children("h3").addClass("d-none");
		$(this).parent().prev().children("input").removeClass("d-none");
	})
	$("#modal-custom").on('click', '.submit', function (event) {
		event.preventDefault();

		var fx = "wobble",  //wobble shake
			$modal = $(this).closest('.iziModal');

		if (!$modal.hasClass(fx)) {
			$modal.addClass(fx);
			setTimeout(function () {
				$modal.removeClass(fx);
			}, 100);
		}
	});
	$('.login_btn').click(function (event) {
		$.ajax({
			url: location.protocol + "//" + document.domain + "/users/login",
			type: 'POST',
			data: {
				email: $('#input-email').val(),
				password: $('#input-password').val()
			},
		})
			.done(function (res) {
				if (res == 0) {
					$.toast({
						heading: 'Error',
						text: 'Please try again',
						icon: 'error',
						position: 'bottom-right',
						loader: false
					});
				} else {
					window.location.replace(location.protocol + "//" + document.domain + "/home");
				}
			})
			.fail(function () {
				console.log("error");
			})
			.always(function () {
				console.log("complete");
			});

	});
	$('#register_btn').click(function (event) {
		$.ajax({
			url: location.protocol + "//" + document.domain + "/users/register",
			type: 'POST',
			data: {
				name: $('#username_register').val(),
				email: $('#email_register').val(),
				password: $('#password_register').val()
			},
		})
			.done(function (res) {
				$.toast({
					text: 'Please check your email and confirm account',
					icon: 'info',
					position: 'bottom-right',
					loader: false
				});
			})
			.fail(function () {
				console.log("error");
			});
	});

	$('#login_user_btn').click(function (event) {
		if ($('#email_login').val() == '' || $('#pass_login').val() == '') {
			$.toast({
				heading: 'Error',
				text: 'Please please field',
				icon: 'error',
				position: 'bottom-right',
				loader: false
			});
		} else {
			$.ajax({
				url: location.protocol + "//" + document.domain + "/users/login",
				type: 'POST',
				data: {
					email: $('#email_login').val(),
					pass: $('#pass_login').val()
				}
			})
				.done(function (res) {
					if (res == 1) {
						location.reload();
					} else {
						$.toast({
							heading: 'Error',
							text: 'Password or email is wrong',
							icon: 'error',
							position: 'bottom-right',
							loader: false
						});
					}
				})
				.fail(function () {
					console.log("error");
				});
		}
	});

	$('#destroy_order').click(function (event) {
		var id_invoice = $(this).attr('data-invoice');
		$.confirm({
			title: false,
			buttons: {
				confirm: function () {
					$.ajax({
						url: 'destroyBill/' + id_invoice
					})
						.done(function (res) {
							if(res == 'false'){

								$.toast({
									heading: 'Error',
									text: 'Something wrong!',
									icon: 'error',
									position: 'bottom-right',
									loader: false
								});
							}else{
								$.toast({
									heading: 'Success',
									text: 'Destroy success!',
									icon: 'success',
									position: 'bottom-right',
									loader: false
								});
								setTimeout(function () { location.reload(); }, 2000);
							}
						})
						.fail(function () {
							console.log("error");
						});
				},
				cancel: function () {
				}
			},
			theme: 'black',
		});
	});

	$('#button-payment-address').click(function (event) {

		if (document.querySelector('input[name="payment_address"]:checked').value == 'new') {
			console.log('dung new');
		} else {
			console.log('dung cu');
		}
	});
	$('#add_address').click(function (event) {
		var sonha = $('#sonha').val();
		var address_full = sonha.concat(', ' + $('#xa').val());
		var address = $('#xa').val();
		var geocoder;
		geocoder = new google.maps.Geocoder();
		if (address != '') {
			geocoder.geocode({ 'address': address }, function (results, status) {
				if (status == 'OK') {
					var latitude = results[0].geometry.location.lat();
					var longitude = results[0].geometry.location.lng();
					$.ajax({
						url: location.protocol + "//" + document.domain + "/users/addAddress",
						type: 'POST',
						data: {
							address: address_full,
							lat: latitude,
							lng: longitude,
						},
					})
						.done(function (res) {
							location.reload();
						})
						.fail(function () {
							$.toast({
								heading: 'Error',
								text: 'Something wrong, please try again!',
								icon: 'error',
								position: 'bottom-right',
								loader: false
							});
						});
				}
			});
		} else {
			$.toast({
				heading: 'Error',
				text: 'Something wrong, please try again!',
				icon: 'error',
				position: 'bottom-right',
				loader: false
			});
		}
	});

	$.getJSON(location.protocol + "//" + document.domain + "/app/webroot/tree.json", function (data) {
		$.each(data, function (key, value) {
			$('#hanhchinh').append($('<option>', { value: key, text: value['name'] }));
		});
		$('#hanhchinh').on('change', function () {
			$('#huyen')
				.empty()
				.append('<option selected disabled> --- Please Select --- </option>')
				;
			$('#xa')
				.empty()
				.append('<option selected disabled> --- Please Select --- </option>')
				;
			var i = this.value;
			$.each(data, function (key, value) {
				if (key == i) {
					$.each(value['quan-huyen'], function (key, value) {

						$('#huyen').append($('<option>', { value: key, text: value['name'] }));
					});
				}
			});
			$('#huyen').on('change', function () {
				$('#xa')
					.empty()
					.append('<option selected disabled> --- Please Select --- </option>')
					;
				var j = this.value;
				$.each(data[i]['quan-huyen'], function (key, value) {
					if (key == j) {
						$.each(value['xa-phuong'], function (key, value) {
							$('#xa').append($('<option>', { value: value['path_with_type'], text: value['name'] }));
						});
					}
				});
			});
		});
	});
})
function codeAddress() {
	var geocoder;
	geocoder = new google.maps.Geocoder();

	var address = document.getElementById('search').value;
	if (address != '') {
		geocoder.geocode({ 'address': address }, function (results, status) {
			if (status == 'OK') {
				var latitude = results[0].geometry.location.lat();
				var longitude = results[0].geometry.location.lng();
			}
		});
	} else { console.log('ds'); }
}
function deleteAddress(obj) {

	$.ajax({
		url: location.protocol + "//" + document.domain + "/users/deleteAddress",
		type: 'POST',
		data: {
			id: obj.attr('data-id')
		}
	})
		.done(function (res) {
			location.reload();
		})
		.fail(function () {
			console.log("error");
		})
		.always(function () {
			console.log("complete");
		});

}
function submit_edit_checkout_name(obj) {
	const newName = obj.parent().prev().children('input').val();
	obj.addClass('d-none');
	obj.prev().removeClass("d-none");
	obj.parent().prev().children('h3').text(newName).removeClass("d-none");
	obj.parent().prev().children('input').addClass('d-none');
	$.ajax({
		url: location.protocol + "//" + document.domain + "/users/editName",
		type: 'POST',
		data: { name: newName }
	})
		.done(function () {
			$.toast({
				heading: 'Success',
				text: 'Update info success!',
				icon: 'success',
				position: 'bottom-right',
				loader: false
			});
		})
		.fail(function () {
			console.log("error");
		});
}
function submit_edit_checkout_phone(obj) {
	obj.addClass('d-none');
	obj.prev().removeClass("d-none");
	obj.parent().prev().children('h3').text(obj.parent().prev().children('input').val()).removeClass("d-none");
	obj.parent().prev().children('input').addClass('d-none');
	$.ajax({
		url: location.protocol + "//" + document.domain + "/users/editPhone",
		type: 'POST',
		data: { phone: obj.parent().prev().children('input').val() }
	})
		.done(function () {
			$.toast({
				heading: 'Success',
				text: 'Update info success!',
				icon: 'success',
				position: 'bottom-right',
				loader: false
			});
		})
		.fail(function () {
			console.log("error");
		});
}
function edit_checkout(obj) {
	obj.hide();
	obj.next().removeClass('d-none');
	obj.parent().prev().children('h3').addClass('d-none');
	obj.parent().prev().children('input').removeClass('d-none');
}
function minus(obj) {
	$.ajax({
		url: location.protocol + "//" + document.domain + "/users/lessAmount",
		type: 'POST',
		data: {
			id_product: obj.attr('data-id')
		}
	})
		.done(function () {
			console.log("success");
		})
		.fail(function () {
			console.log("error");
		});

	var num = parseInt(obj.parent().next().children('span').text());
	var price = parseInt(obj.parent().next().next().attr('data-unit'));
	if (num > 0) {
		num--;
		var current = (price * num);
		obj.parent().next().children('span').text(num);
		obj.parent().next().next().children('span').attr('data-total', price * num);
		obj.parent().next().next().children('span').text(numberWithCommas(current) + 'đ');
	}
	var total = 0;
	$('.price_per_product').each(function () {
		total += parseInt($(this).attr('data-total'));
	})
	$('#total_cart').text(total.toLocaleString({ style: 'currency' }) + 'đ');
	$('#total_cart').attr({
		'data-price': total
	});
	$('#vat_price').text((0.1 * total).toLocaleString({ style: 'currency' }) + 'đ');
	$('#vat_price').attr({
		'data-price': 0.1 * total
	});
	$('#total_price').text((0.1 * total + total).toLocaleString({ style: 'currency' }) + 'đ');
	$('#total_price').attr({
		'data-price': 0.1 * total + total
	});
	$('#span_price_cart').text((0.1 * total + total).toLocaleString({ style: 'currency' }) + 'đ');
}
function add(obj) {
	$.ajax({
		url: location.protocol + "//" + document.domain + "/users/moreAmount",
		type: 'POST',
		data: {
			id_product: obj.attr('data-id')
		}
	})
		.done(function () {
			console.log("success");
		})
		.fail(function () {
			console.log("error");
		});
	var num = parseInt(obj.parent().next().children('span').text());
	var price = parseInt(obj.parent().next().next().attr('data-unit'));
	num++;
	var current = (price * num);
	obj.parent().next().children('span').text(num);
	obj.parent().next().next().children('span').attr('data-total', price * num);
	obj.parent().next().next().children('span').text(numberWithCommas(current) + 'đ');
	var total = 0;
	$('.price_per_product').each(function () {
		total += parseInt($(this).attr('data-total'));
	})
	$('#total_cart').text(total.toLocaleString({ style: 'currency' }) + 'đ');
	$('#total_cart').attr({
		'data-price': total
	});
	$('#vat_price').text((0.1 * total).toLocaleString({ style: 'currency' }) + 'đ');
	$('#vat_price').attr({
		'data-price': 0.1 * total
	});
	$('#total_price').text((0.1 * total + total).toLocaleString({ style: 'currency' }) + 'đ');
	$('#total_price').attr({
		'data-price': 0.1 * total + total
	});
	$('#span_price_cart').text((0.1 * total + total).toLocaleString({ style: 'currency' }) + 'đ');
}
function remove_product(obj) {
	obj.parent().parent().remove();
	if ($('.tr_cart').length == 0) {
		obj.parent().parent().parent().parent().parent().remove();
		$('#li_price').remove();
		var li = $('<li>').appendTo($('.cart-dropdown-menu'));
		var div = $('<div>').appendTo($(li));
		var h1 = $('<h1>').text('Nothing here!').appendTo($(div));
		$('#span_amount_product_cart').text('0');
		$('#span_price_cart').text('0đ');
	} else {
		var present_total = parseInt($('#total_cart').attr('data-price'));
		var present_vat = parseInt($('#vat_price').attr('data-price'));
		var present_price = parseInt($('#total_price').attr('data-price'));
		var price_remove = parseInt(obj.parent().prev().children('span').attr('data-total'))
		$('#span_amount_product_cart').text($('.tr_cart').length);
		$('#total_cart').text((present_total - price_remove).toLocaleString({ style: 'currency' }) + 'đ');
		$('#total_cart').attr({
			'data-price': present_total - price_remove
		});
		$('#vat_price').text((present_vat - 0.1 * price_remove).toLocaleString({ style: 'currency' }) + 'đ');
		$('#vat_price').attr({
			'data-price': present_vat - 0.1 * price_remove
		});
		$('#total_price').text((present_price - price_remove - 0.1 * price_remove).toLocaleString({ style: 'currency' }) + 'đ');
		$('#total_price').attr({
			'data-price': present_price - price_remove - 0.1 * price_remove
		});
		$('#span_price_cart').text((present_price - price_remove - 0.1 * price_remove).toLocaleString({ style: 'currency' }) + 'đ');
	}
	$.ajax({
		url: location.protocol + "//" + document.domain + "/users/removeProduct",
		type: 'POST',
		data: {
			id_product: obj.attr('data-id'),
			id_user: obj.attr('data-user')
		}
	})
		.done(function () {
			console.log("success");
		})
		.fail(function () {
			console.log("error");
		});
}
function addcart(obj) {
	$.ajax({
		url: location.protocol + "//" + document.domain + "/users/addToCart",
		type: 'POST',
		data: {
			id_user: obj.attr('data-user'),
			id_product: obj.attr('data-product')
		}
	})
		.done(function (res) {
			$.toast({
				heading: 'Success',
				text: 'Add to your cart',
				icon: 'success',
				position: 'bottom-right',
				loader: false
			});
		})
		.fail(function () {
			console.log("error");
		});
	$('.cart-dropdown-menu').empty();
	setTimeout(function () {
		$.ajax({
			url: location.protocol + "//" + document.domain + "/home/getCart",
			type: 'POST',
			dataType: 'json',
			data: {
				id_user: obj.attr('data-user')
			}
		})
			.done(function (res) {

				if (!res || res.length == 0) {
					var li = $('<li>').appendTo($('.cart-dropdown-menu'));
					var div = $('<div>').appendTo($(li));
					var h1 = $('<hi>').text('Nothing here!').appendTo($(div));
				} else {
					var total = 0;
					var res_length = res.length;
					for (var i = 0; i < res_length; i++) {
						total += res[i]['1'] * res[i]['amount'];
					}
					var li = $('<li>').appendTo($('.cart-dropdown-menu'));
					var table = $('<table>').addClass('table table-striped').appendTo($(li));
					var tbody = $('<tbody>').appendTo($(table));
					var max_cart = (res_length > 4)?4:res_length;
					for (var i = 0; i < max_cart; i++) {
						var tr = $('<tr>').addClass('tr_cart').appendTo($(tbody));
						var td = $('<td>').addClass('text-center').appendTo($(tr));
						var a = $('<a>').appendTo($(td));
						var img = $('<img>').attr({
							class: 'img-thumbnail',
							src: location.protocol + "//" + document.domain + "/app/webroot/img/product/" + res[i]['2']
						}).css({
							width: '60px'
						}).appendTo($(a));
						var td2 = $('<td>').addClass('text-left').appendTo($(tr));
						var a2 = $('<a>').text(res[i]['0']).appendTo($(td2));
						var i1 = $('<i>').attr({
							class: 'fas fa-minus-square',
							'data-id': res[i]['id_product'],
							onclick: 'minus($(this))'
						}).css({
							'font-size': '20px',
							'margin-right': '10px'
						}).appendTo($(td2));
						var i2 = $('<i>').attr({
							class: 'fas fa-plus-square',
							'data-id': res[i]['id_product'],
							onclick: 'add($(this))'
						}).css({
							'font-size': '20px'
						}).appendTo($(td2));
						var td3 = $('<td>').addClass('text-left').text('x ').appendTo($(tr));
						var span = $('<span>').css({
							width: '10px'
						}).text(res[i]['amount']).appendTo($(td3));
						var td4 = $('<td>').addClass('text-left').attr({
							'data-unit': res[i]['1']
						}).appendTo($(tr));
						var span2 = $('<span>').attr({
							class: 'price_per_product',
							'data-total': res[i]['1'] * res[i]['amount']
						}).text(numberWithCommas(res[i]['1'] * res[i]['amount']) + 'đ').appendTo($(td4));
						var td5 = $('<td>').attr({
							class: 'text-center'
						}).appendTo($(tr));
						var button = $('<button>').attr({
							class: 'btn btn-danger btn-xs',
							onclick: 'remove_product($(this))',
							'data-id': res[i]['id_product'],
							title: 'Remove',
							type: 'button'
						}).appendTo($(td5));
						var i3 = $('<i>').addClass('fa fa-times').css({
							'font-size': '10px'
						}).appendTo($(button));
					}
					if(res_length>4){
						var a_more = $("<a>").attr("href", location.protocol + "//" + document.domain + "/users/basket").text("+"+res_length-4+" more product").appendTo($(".cart-dropdown-menu"));
					}
					var li2 = $('<li>').attr({
						id: 'li_price'
					}).appendTo($('.cart-dropdown-menu'));
					var div2 = $('<div>').appendTo($(li2));
					var table2 = $('<table>').addClass('table table-bordered').appendTo($(div2));
					var tbody2 = $('<tbody>').appendTo($(table2));
					var tr2 = $('<tr>').appendTo($(tbody2));
					var td6 = $('<td>').addClass('text-right').appendTo($(tr2));
					var strong = $('<strong>').text('Sub-Total').appendTo($(td6));
					var td7 = $('<td>').attr({
						class: 'text-right',
						'data-price': total,
						id: 'total_cart'
					}).text(numberWithCommas(total) + 'đ').appendTo($(tr2));
					var tr3 = $('<tr>').appendTo($(tbody2));
					var td8 = $('<td>').addClass('text-right').appendTo($(tr3));
					var strong2 = $('<strong>').text('VAT (10%)').appendTo($(td8));
					var td9 = $('<td>').attr({
						class: 'text-right',
						'data-price': total * 0.1,
						id: 'vat_price'
					}).text(numberWithCommas(total * 0.1) + 'đ').appendTo($(tr3));
					var tr4 = $('<tr>').appendTo($(tbody2));
					var td9 = $('<td>').addClass('text-right').appendTo($(tr4));
					var strong3 = $('<strong>').text('Total').appendTo($(td9));
					var td10 = $('<td>').attr({
						class: 'text-right',
						'data-price': total * 0.1 + total,
						id: 'total_price'
					}).text(numberWithCommas(total * 0.1 + total) + 'đ').appendTo($(tr4));
					var p = $('<p>').addClass('text-right').appendTo($(div2));
					var span3 = $('<span>').addClass('btn-viewcart').appendTo($(p));
					var a_cart = $('<a>').html('<strong><i class="fa fa-shopping-cart"></i> View Cart</strong>').appendTo($(span3));
					var span4 = $('<span>').addClass('btn-checkout').css({
						'margin-left': '3px'
					}).appendTo($(p));
					var a_checkout = $('<a>').attr({
						href: 'users/checkout'
					}).html('<strong><i class="fa fa-share"></i> Checkout</strong>').appendTo($(span4));
					$('#span_amount_product_cart').text(res.length);
					$('#span_price_cart').text(numberWithCommas(total + total * 0.1) + 'đ');
				}
			})
			.fail(function () {
				console.log("error");
			});
	}, 1500);
}
function numberWithCommas(x) {
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
function initMap() {
	// The location of Uluru
	var uluru = { lat: parseFloat($('#map').attr('data-lat')), lng: parseFloat($('#map').attr('data-lng')) };
	// The map, centered at Uluru
	var map = new google.maps.Map(
		document.getElementById('map'), { zoom: 19, center: uluru });
	// The marker, positioned at Uluru
	var marker = new google.maps.Marker({ position: uluru, map: map });
}

function confirmOrderFunc(arr, arr1) {
	var response = grecaptcha.getResponse();

	if (response.length == 0) {
		$.toast({
			heading: 'Error',
			text: 'Something wrong, please try again!',
			icon: 'error',
			position: 'bottom-right',
			loader: false
		});
	} else {
		const checkout_name = $("#checkout_name").val();
		const checkout_phone = $("#checkout_phone").val();
		const comment_order = $('#comment_order').val();
		const note = comment_order.replace(/^\s+|\s+$/g, '').length == 0 ? checkout_name + ' - ' + checkout_phone : checkout_name + ' - ' + checkout_phone + ' - ' + comment_order.trim();
		if (document.querySelector('input[name="payment_address"]:checked').value == 'existing') {
			var address = $('#address_id_exist').val();
			var lat = $('#address_id_exist').find(':selected').attr('data-lat');
			var lng = $('#address_id_exist').find(':selected').attr('data-lng');
			$.ajax({
				url: 'addOnlineBill',
				type: 'POST',

				data: {
					note: note,
					address: address,
					lat: lat,
					lng: lng,
					arr: arr,
					arr1: arr1,
					price: $('#total_order_online').attr('data-total'),
				}
			})
				.done(function (res) {
					window.location.replace(location.protocol + "//" + document.domain +"/users/orderlist");
				})
				.fail(function () {
					$.toast({
						heading: 'Error',
						text: 'Something wrong',
						icon: 'error',
						position: 'bottom-right',
						loader: false
					});
				});
		}
		if (document.querySelector('input[name="payment_address"]:checked').value == 'new') {
			if ($("#sonha").val() && $('#xa').val()) {
				var sonha = $("#sonha").val();
				var address = sonha.concat(', ' + $('#xa').val());
				var geocoder;
				geocoder = new google.maps.Geocoder();
				geocoder.geocode({ 'address': address }, function (results, status) {
					if (status == 'OK') {
						var lat = results[0].geometry.location.lat();
						var lng = results[0].geometry.location.lng();
						$.ajax({
							url: 'addOnlineBill',
							type: 'POST',
							data: {
								note: note,
								address: address,
								lat: lat,
								lng: lng,
								arr: arr,
								arr1: arr1,
								price: $('#total_order_online').attr('data-total'),
							}
						})
							.done(function (res) {
								window.location.replace(location.protocol + "//" + document.domain +"/users/orderlist");
							})
							.fail(function () {
								$.toast({
									heading: 'Error',
									text: 'Something wrong',
									icon: 'error',
									position: 'bottom-right',
									loader: false
								});
							});
					}
				});

			} else {
				$.toast({
					heading: 'Error',
					text: 'Please check your order!',
					icon: 'error',
					position: 'bottom-right',
					loader: false
				});
			}
		}
	}

}
function hoversp(obj) {
	$(obj).children('div').addClass('show_div_product');
	$(obj).children('.btn_sp_group').children('.like_sp').css({
		animation: 'hienralike 0.4s forwards'
	});
	$(obj).children('.btn_sp_group').children('.add_sp').css({
		animation: 'hienraadd 0.4s forwards'
	});
	$(obj).children('.btn_sp_group').children('.buy_now').css({
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
	$(obj).children('.btn_sp_group').children('.buy_now').css({
		animation: ''
	});
}
