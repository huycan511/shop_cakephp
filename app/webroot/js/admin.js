$(document).ready(function(){
	var pathname = $(location).attr('pathname');
	pathname = pathname.split("/")[3];

	$('#sidebarToggle').click(function(){
		$('.sidebar').toggleClass('leftcc');
	});

	$(document).tooltip({
		placement: 'left',
		show: {
			effect: "slideDown",
			speed: 10,
		}
	});
	
	$('label.range-label')
		.on("click", function(){
			$(this).css({
				"transform": "translateY(-120%) translateX(0%)",
				"transition": "all 0.1s ease-out",
				"cursor": "s-resize"
			})
		.on("dblclick", function(){
			$(this).css({
				"transform": "translateY(0%) translateX(0%)",
				"transition": "all 0.1s ease-out",
				"cursor": "n-resize"
			})
		})
	});

	/** Register */
	$('input.second').attr("readonly", "readonly");
	$('input.first').on("change keyup paste", function(){
		if($(this).val()){
			$('input.second').removeAttr("readonly")
								
		} else {
			$('input.second').attr("readonly", "readonly");
		}
	});

	$('input.second').on("change keyup paste",function(){
		if($(this).val()){
			$(this).parent().next().css("display", "block");
		} else {
			$(this).parent().next().css("display", "none");
		}
	});
	
	$('.next-button').hover(function(){
		$(this).css('cursor', 'pointer');
		$('input.second').attr("readonly", "readonly");
	});

	$('.next-button.name').click(function(){
		$('.name-section').addClass("fold-up");
		$('.contact-section').removeClass("folded");
		$('.instruction').text("How to contact with you?");
	});

	$('.next-button.contact').click(function(){
		$('.contact-section').addClass("fold-up");
		$('.instruction').text("Please enter your password");
		$('.password-section').removeClass("folded");
	});

	//Register Click
	$('.next-button.password').click(function(){
		$('.password-section').addClass("fold-up");
		$('.instruction').prev().hide();
		$firstName = $('#adFirstName').val();
		$lastName = $('#adLastName').val();
		$email = $('#adEmail').val();
		$phone = $('#adPhone').val();
		$password = $('#adPassword').val();
		$password2 = $('#adConfirmPassword').val();
		$.ajax({
			url: 'ajaxRegister',
			type: 'POST',
			data: {
				firstName: $firstName,
				lastName: $lastName,
				email: $email,
				phone: $phone,
				password: $password,
				confirmpassword: $password2
			}
		}).done(function(res) {
			res = $.parseJSON(res);
			var nameAd = res['name']
			if(res['name']){
				$.toast({
					heading: 'Success',
					bgColor: 'green',
					text: 'Your account is ' + nameAd,
					icon: 'success',
					hideAfer: 30000,
					position: 'bottom-right',
					loader: false
				});
				$('.instruction').text('Your account is ' + nameAd);
				$('.transfer-link').css("margin-top", "6rem");
				$('.login-success').css({"background-color": "#41ec44", "margin-top": "0"});
			}else{
				for (var i = 0; i < res.length; i++){
					$.toast({
						heading: 'Error',
						text: res[i],
						icon: 'error',
						hideAfer: 30000,
						position: 'bottom-right',
						loader: false
					});
				};
				$('.instruction').text("Something is wrong! Please check your registed information again");
				$('.transfer-link').css("margin-top", "6rem");
				$('.login-fail').css({"background-color": "#ec4141", "margin-top": "0"});
			}
		});
	});

	//Login Click
	$('.next-button.loginPassword').click(function(){
		$('.name-section').addClass("fold-up");
		$('.font-alert').hide();
		$account = $('#adAccount').val();
		$password = $('#adLoginPass').val();
		$.ajax({
			url: 'ajaxLogin',
			type: 'POST',
			data: {
				account: $account,
				password: $password
			}
		}).done(function(res) {
			res = $.parseJSON(res);
				if(res['email'] != null || res['name'] != null){
					if(res['status'] == 'approved'){
						window.location.href = location.protocol + "//" + document.domain + "/cakephp/admins/dashboard";
						$('.login-success').css({"background-color": "#41ec44", "margin-top": "0"});
					} else {
						$.toast({
							heading: 'Warning',
							text: 'Your account is not available...',
							icon: 'warning',
							hideAfer: 30000,
							bgColor: 'rgb(189, 183, 45)',
							position: 'top-right',
							loader: false
						});                            
						$('.instruction').text("Your account has not been approved!");
						$('.transfer-link').css("margin-top", "6rem");
						if(res['status'] == 'declined'){
							$('.login-decline').css({"background-color": "#ec4141", "margin-top": "0"});
						} else if(res['status'] == 'requesting'){
							$('.login-processing').css({"background-color": "#173041", "margin-top": "0"});
						}
					}
				}else {
					$.toast({
						heading: 'Error',
						text: res[0],
						icon: 'error',
						hideAfer: 30000,
						position: 'bottom-right',
						loader: false
					});            
					$('.instruction').text("Something is wrong! Please check out your information account again");
					$('.transfer-link').css("margin-top", "6rem");
					$('.login-fail').css({"background-color": "#ec4141", "margin-top": "0"});
				}
		});
	});

	/** Navigation */
	var btnbell = $("#navbell-toggle");
	var btnuser = $("#navuser-toggle");
	var bell = $("#navbell");
	var user = $("#navuser");

	btnbell.on("click", function(){
		bell.show();
		user.hide();
	})

	btnuser.on("click", function(){
		bell.hide();
		user.show();
	})

	$("body").on("mouseup", function(){
		user.hide();
		bell.hide();
	});

	//Logout
	$(".logout").on('click',function(){
		$(".popup#modal-logout").css({
			'margin': '30vh 30vw',
			'z-index':'999'
		});
		$('#admin-content').addClass('overlay');
		$(".popup#modal-logout").find('#btnCancel').on('click',function(){
				$(".popup#modal-logout").css('margin', '-50vh 30vw');
				$('#admin-content').removeClass('overlay');
			});
	});

	//Delete Account
	$(".delete").on('click',function(){
		$(".popup#modal-delete").css({
			'margin': '30vh 30vw',
			'z-index':'999'
		});
		$('#admin-content').addClass('overlay');
		$(".popup#modal-delete").find('#btnCancel').on('click',function(){
				$(".popup#modal-delete").css('margin', '-50vh 30vw');
				$('#admin-content').removeClass('overlay');
			});
	});

	/** Table */

	// Edit value by selecting
	$("select.edit-select option").each(function(){
		var target_change = $(this).parent().parent().prev();
		if($(this).val() == target_change.text()){
			$(this).attr("selected", true);
		}
	});

	//Initilizing Datatable
	var table = $('#darktable').DataTable( {
		"pagingType": "full_numbers",
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"dom": '<"darktable"l>tip',
		"order": [],

		initComplete: function () {
			if( pathname == 'lists') {
				//Select box admin's status
				this.api().columns([6]).every( function () {
					var column = this;
					var select = $('<select><option value=""></option></select>')
						.prependTo( $("#col-admin-status") )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );
					column.data().unique().sort().each( function ( d ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			};

			if( pathname == 'users') {

				//Select box user's status
				this.api().columns([11]).every( function () {
					var column = this;
					var select = $('<select><option value=""></option></select>')
						.prependTo( $("#col-user-status") )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );
					column.data().unique().sort().each( function ( d ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			};

			if( pathname == 'pictures') {
				//Select box pic's status
				this.api().columns([8]).every( function () {
					var column = this;
					var select = $('<select><option value=""></option></select>')
						.prependTo( $("#col-pic-status") )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );
					column.data().unique().sort().each( function ( d ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		}
		
	} );

	/** Input Search */
	// Search by keywords
	$("#keyword-search")
	.on('keyup', function() {
		if ($(this).val == null) {
			table.search($(this).val(), false, true).draw();
		} else {
			table.search($(this).val(), true, false).draw();
		}
	})
	.siblings('.empty').on('click', function(){
		$(this).siblings('input').val(null);
		table.search('', false, true).draw();
	});

	if(pathname == "lists"){
		// Search by admin name
		$("#admin-name-search")
		.on('keyup', function() {
			if ($(this).val == null) {
				table.columns([1]).search($(this).val(), false, true).draw();
			} else {
				table.columns([1]).search($(this).val(), true, false).draw();
			}
		})
		.siblings('.empty').on('click', function(){
			$(this).siblings('input').val(null);
			table.columns([1]).search('', false, true).draw();
		});
	}

	if(pathname == "users"){
		// Search by user name
		$("#user-name-search")
		.on('keyup', function() {
			if ($(this).val == null) {
				table.columns([2]).search($(this).val(), false, true).draw();
			} else {
				table.columns([2]).search($(this).val(), true, false).draw();
			}
		})
		.siblings('.empty').on('click', function(){
			$(this).siblings('input').val(null);
			table.columns([2]).search('', false, true).draw();
		});
	}

	if(pathname == "pictures"){
		// Search by pic owner
		$("#pic-owner-search")
		.on('keyup', function() {
			if ($(this).val == null) {
				table.columns([2]).search($(this).val(), false, true).draw();
			} else {
				table.columns([2]).search($(this).val(), true, false).draw();
			}
		})
		.siblings('.empty').on('click', function(){
			$(this).siblings('input').val(null);
			table.columns([2]).search('', false, true).draw();
		});
		// Search by pic tag
		$("#pic-tag-search")
		.on('keyup', function() {
			if ($(this).val == null) {
				table.columns([6]).search($(this).val(), false, true).draw();
			} else {
				table.columns([6]).search($(this).val(), true, false).draw();
			}
		})
		.siblings('.empty').on('click', function(){
			$(this).siblings('input').val(null);
			table.columns([6]).search('', false, true).draw();
		});
	}

	if(pathname == "tags"){
		// Search by tag name
		$("#tag-name-search")
		.on('keyup', function() {
			if ($(this).val == null) {
				table.columns([1]).search($(this).val(), false, true).draw();
			} else {
				table.columns([1]).search($(this).val(), true, false).draw();
			}
		})
		.siblings('.empty').on('click', function(){
			$(this).siblings('input').val(null);
			table.columns([1]).search('', false, true).draw();
		});
	}

	/** Range Search */
	if(pathname == "admins"){
		$.fn.dataTable.ext.search.push(
			function (settings, data) {
				//Search by a range of creation time
				var min = $('#admin-creation-from').datepicker("getDate");
				var max = $('#admin-creation-to').datepicker("getDate");
				var startDate = new Date(data[5]);
				if ( ( min == null && max == null ) 
					|| ( min == null && startDate <= max ) 
					|| ( min <= startDate   && max == null )
					|| ( min <= startDate   && startDate <= max ) )
				{return true;}
				return false;
			}
		)
	}

	if(pathname == "users"){
		$.fn.dataTable.ext.search.push(
			function (settings, data) {
				//Search by a range of the number of followers
				var min = parseInt( $('#user-followers-min').val(), 10 );
				var max = parseInt( $('#user-followers-max').val(), 10 );
				var number = parseFloat( data[7] ) || 0;
				if ( ( isNaN( min ) && isNaN( max ) ) 
					|| ( isNaN( min ) && number <= max ) 
					|| ( min <= number   && isNaN( max ) )
					|| ( min <= number   && number <= max ) )
				{return true;}
				return false;
			},
			function (settings, data) {
				//Search by a range of the number of reported times
				var min = parseInt( $('#user-reports-min').val(), 10 );
				var max = parseInt( $('#user-reports-max').val(), 10 );
				var number = parseFloat( data[8] ) || 0;
				if ( ( isNaN( min ) && isNaN( max ) ) 
					|| ( isNaN( min ) && number <= max ) 
					|| ( min <= number   && isNaN( max ) )
					|| ( min <= number   && number <= max ) )
				{return true;}
				return false;
			},
			function (settings, data) {
				//Search by a range of creation time
				var min = $('#user-creation-from').datepicker("getDate");
				var max = $('#user-creation-to').datepicker("getDate");
				var startDate = new Date(data[9]);
				if ( ( min == null && max == null ) 
					|| ( min == null && startDate <= max ) 
					|| ( min <= startDate   && max == null )
					|| ( min <= startDate   && startDate <= max ) )
				{return true;}
				return false;
			},
			function (settings, data) {
				//Search by a range of login time
				var min = $('#user-login-from').datepicker("getDate");
				var max = $('#user-login-to').datepicker("getDate");
				var startDate = new Date(data[10]);
				if ( ( min == null && max == null ) 
					|| ( min == null && startDate <= max ) 
					|| ( min <= startDate   && max == null )
					|| ( min <= startDate   && startDate <= max ) )
				{return true;}
				return false;
			}
		)
	}

	if(pathname == "pictures"){
		$.fn.dataTable.ext.search.push(
			function (settings, data) {
				//Search by a range of the number of likes
				var min = parseInt( $('#pic-likes-min').val(), 10 );
				var max = parseInt( $('#pic-likes-max').val(), 10 );
				var number = parseFloat( data[3] ) || 0;
				if ( ( isNaN( min ) && isNaN( max ) ) 
					|| ( isNaN( min ) && number <= max ) 
					|| ( min <= number   && isNaN( max ) )
					|| ( min <= number   && number <= max ) )
				{return true;}
				return false;
			},
			function (settings, data) {
				//Search by a range of the number of comments
				var min = parseInt( $('#pic-comments-min').val(), 10 );
				var max = parseInt( $('#pic-comments-max').val(), 10 );
				var number = parseFloat( data[4] ) || 0;
				if ( ( isNaN( min ) && isNaN( max ) ) 
					|| ( isNaN( min ) && number <= max ) 
					|| ( min <= number   && isNaN( max ) )
					|| ( min <= number   && number <= max ) )
				{return true;}
				return false;
			},
			function (settings, data) {
				//Search by a range of the number of pins
				var min = parseInt( $('#pic-pins-min').val(), 10 );
				var max = parseInt( $('#pic-pins-max').val(), 10 );
				var number = parseFloat( data[5] ) || 0;
				if ( ( isNaN( min ) && isNaN( max ) ) 
					|| ( isNaN( min ) && number <= max ) 
					|| ( min <= number   && isNaN( max ) )
					|| ( min <= number   && number <= max ) )
				{return true;}
				return false;
			},
			function (settings, data) {
				//Search by a range of the number of reported times
				var min = parseInt( $('#pic-reports-min').val(), 10 );
				var max = parseInt( $('#pic-reports-max').val(), 10 );
				var number = parseFloat( data[7] ) || 0;
				if ( ( isNaN( min ) && isNaN( max ) ) 
					|| ( isNaN( min ) && number <= max ) 
					|| ( min <= number   && isNaN( max ) )
					|| ( min <= number   && number <= max ) )
				{return true;}
				return false;
			}
		)
	}

	if(pathname == "tags"){
		$.fn.dataTable.ext.search.push(
			function (settings, data) {
				//Search by a range of the number of pictures
				var min = parseInt( $('#tag-pics-min').val(), 10 );
				var max = parseInt( $('#tag-pics-max').val(), 10 );
				var number = parseFloat( data[2] ) || 0;
				if ( ( isNaN( min ) && isNaN( max ) ) 
					|| ( isNaN( min ) && number <= max ) 
					|| ( min <= number   && isNaN( max ) )
					|| ( min <= number   && number <= max ) )
				{return true;}
				return false;
			}
		)
	}

	$("#admin-creation-from").datepicker({ 
		onSelect: function () { 
			table.draw(); 
		}, changeMonth: true, changeYear: true });
	$("#admin-creation-to").datepicker({ 
		onSelect: function () { 
			table.draw(); 
		}, changeMonth: true, changeYear: true });

	$("#user-creation-from").datepicker({ 
		onSelect: function () { 
			table.draw(); 
		}, changeMonth: true, changeYear: true });
	$("#user-creation-to").datepicker({ 
		onSelect: function () { 
			table.draw(); 
		}, changeMonth: true, changeYear: true });

	$("#user-login-from").datepicker({ 
		onSelect: function () { 
			table.draw(); 
		}, changeMonth: true, changeYear: true });
	$("#user-login-to").datepicker({ 
		onSelect: function () { 
			table.draw(); 
		}, changeMonth: true, changeYear: true });

	$('.min, .max').on("focus change keyup paste", function(){
		table.draw();
	});

	$('.adjust-quantity').on("click", function(){
		table.draw(); 
	})

	$('.max').parent().hide();
	$('.from-to-button').hide();

	$('.plus-button').on("click", function () {
		$(this).hide().siblings().show();
	});

	$('.from-to-button').on("click", function () {
		$(this) .hide()
				.siblings('.plus-button').show()
				.siblings('.range-max').hide()
				.children('input').val(null);
		table.draw();
	});

	//Select a single row
	$('#darktable tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	} );

	//Edit records
	if(pathname == 'dashboard'){
		$('#nav-dashboard').addClass('text-white');
	}

	if(pathname == 'lists'){
		$('#nav-manager, #nav-admins-manager').addClass('text-white');
		var column = table.columns([7]);
		column.visible( false );
	}

	if(pathname == 'users'){
		$('#nav-manager, #nav-users-manager').addClass('text-white');
		var column = table.columns([12]);
		column.visible( false );
	}

	if(pathname == 'pictures'){
		$('#nav-manager, #nav-pictures-manager').addClass('text-white');
		var column = table.columns([9]);
		column.visible( false );
	}

	if(pathname == 'tags'){
		$('#nav-manager, #nav-tags-manager').addClass('text-white');
	}

	if(pathname == 'account'){
		$('#nav-account').addClass('text-white');
	}

	$('#save, #cancel').hide();

	$('#cancel').on( 'click', function () {
		column.visible( false );
		$(this).hide();
		$('#save').hide();
		$('#edit').show();
	} );

	$('#edit').on( 'click', function () {
		column.visible( true );
		$(this).hide().siblings().show();
	} );

	$('#save').on( 'click', function () {
		$(".popup#modal-save").css({
			'margin': '30vh 30vw',
			'z-index':'999'
		});
		$('#admin-content').addClass('overlay');
		$(".popup#modal-save").find('#btnCancel').on('click',function(){
				$(".popup#modal-save").css('margin', '-50vh 30vw');
				$('#admin-content').removeClass('overlay');
			});
	} );

	$('.popup#modal-save #btnOK').on( 'click', function () {
		if(pathname == 'lists') {
			$page = 'admins';
		}
		if(pathname == 'users') {
			$page = 'users'
		}
		if(pathname == 'pictures') {
			$page = 'pictures'
		}
		$("select.edit-select").each(function(){
			$target_object = $(this).parent().siblings(".target").text(); 
			$text_change = $('option:selected', this).val();
			$status = $(this).parent().prev();
			$text_status = $status.text();
			$status.text($text_change);
		$.ajax({
			type: 'POST',
			url: location.protocol + "//" + document.domain + "/cakephp/admins/ajaxEdit",
			data: { 
				page: $page,
				name: $target_object, 
				oldstatus: $text_status,
				newstatus: $text_change }
		}).done(function(res) {
		res = $.parseJSON(res);
			if(res['name']){
				$.toast({
					heading: 'Success',
					bgColor: 'green',
					text: res['name'] + '\'s status was changed from ' + res['oldstatus'] + ' to ' + res['newstatus'],
					icon: 'success',
					hideAfer: 50000,
					position: 'bottom-right',
					loader: false
				});                            
			}else if(res[0]){
				$.toast({
					heading: 'Error',
					text: res[0],
					icon: 'error',
					hideAfer: 50000,
					position: 'bottom-right',
					loader: false
				});            
			}});
		} )
		$(".popup#modal-save").css('margin', '-50vh 30vw');
		$('#admin-content').removeClass('overlay');
	} );

	/** Avatar Upload */
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#imagePreview').css('background-image', 'url('+e.target.result +')');
				$('#imagePreview').hide();
				$('#imagePreview').fadeIn(650);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#imageUpload").change(function() {
		readURL(this);
	});

	$('#avatar-save').on( 'click', function () {
		$(".popup#modal-avatar").css({
			'margin': '30vh 30vw',
			'z-index':'999'
		});
		$('#admin-content').addClass('overlay');
		$(".popup#modal-avatar").find('#btnCancel').on('click',function(){
				$(".popup#modal-avatar").css('margin', '-50vh 30vw');
				$('#admin-content').removeClass('overlay');
			});
	} );

	$('.popup#modal-avatar #btnOK').on( 'click', function () {
		var file_data = $('#imageUpload').prop('files')[0];
		var form_data = new FormData();
		form_data.append('imageUpload', file_data);
		$.ajax({
			type: 'POST',
			url: 'ajaxChangePicture',
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
		}).done(function(res) {
			res = $.parseJSON(res);
			if(res['avatar']){
				$.toast({
					heading: 'Success',
					bgColor: 'green',
					text: 'Your avatar was changed successfully!',
					icon: 'success',
					hideAfer: 30000,
					position: 'bottom-right',
					loader: false
				});
			}else{
				for (var i = 0; i < res.length; i++){
					$.toast({
						heading: 'Error',
						text: res[i],
						icon: 'error',
						hideAfer: 30000,
						position: 'bottom-right',
						loader: false
					});
				};
			}
		});
		$(".popup#modal-avatar").css('margin', '-50vh 30vw');
		$('#admin-content').removeClass('overlay');
	} );

	/** Admin Profile */
	$("#password").click(function(){
		$(this).hide();
		$(".change-password").show();
		$("#cancel-edit-profile, #submit-edit-profile").show();
	})
	$("input[type=password]").addClass('canwrite');

	$("#cancel-edit-profile, #submit-edit-profile, .change-password").hide();

	$("#edit-profile").click(function() {
		$("#cancel-edit-profile, #submit-edit-profile").show();
		$(this).hide();
		$("input[type=text]").removeAttr('readonly');
		$("input[type=text]").addClass('canwrite');
		$("#nameAdEdit").attr('readonly', 'readonly');
		$("#nameAdEdit").removeClass('canwrite');
	});

	$("#cancel-edit-profile").click(function() {
		$("#cancel-edit-profile, #submit-edit-profile, .change-password").hide();
		$("#password").show();
		$("#edit-profile").show();
		$("input[type=text]").attr('readonly', 'readonly');
		$("input[type=text]").removeClass('canwrite');
	});

	$('#submit-edit-profile').on( 'click', function () {
		$(".popup#modal-profile").css({
			'margin': '30vh 30vw',
			'z-index':'999'
		});
		$('#admin-content').addClass('overlay');
		$(".popup#modal-profile").find('#btnCancel').on('click',function(){
				$(".popup#modal-profile").css('margin', '-50vh 30vw');
				$('#admin-content').removeClass('overlay');
			});
	} );

	$('.popup#modal-profile #btnOK').on( 'click', function () {
		$firstName = $('#firstnameAdEdit').val();
		$lastName = $('#lastnameAdEdit').val();
		$email = $('#emailAdEdit').val();
		$phone = $('#phoneAdEdit').val();
		$oldPass = $('#oldPassAdEdit').val();
		$newPass = $('#newPassAdEdit').val();
		$reenterPass = $('#reenterPassAdEdit').val();
		$.ajax({
			type: 'POST',
			url: 'ajaxEditProfile',
			data: { 
				firstName: $firstName, 
				lastName: $lastName,
				email: $email,
				phone: $phone,
				oldpassword: $oldPass,
				newpassword: $newPass,
				reenterpassword: $reenterPass,
			}
		}).done(function(res) {
			res = $.parseJSON(res);
			if(res['name']){
				$.toast({
					heading: 'Success',
					bgColor: 'green',
					text: 'Updated profile successfully',
					icon: 'success',
					hideAfer: 30000,
					position: 'bottom-right',
					loader: false
				});
			}else{
				for (var i = 0; i < res.length; i++){
					$.toast({
						heading: 'Error',
						text: res[i],
						icon: 'error',
						hideAfer: 30000,
						position: 'bottom-right',
						loader: false
					});
				};
			}
		});
		$(".popup#modal-profile").css('margin', '-50vh 30vw');
		$('#admin-content').removeClass('overlay');
	} );
});

function newfeedac(obj){

	window.open(location.protocol + "//" + document.domain + "/cakephp/profiles/profile/" + obj);
}
function newfeeimg(obj){
 
	window.open(location.protocol + "//" + document.domain + "/cakephp/feeds/image_detail/" + obj);
}
function newtagimg(nametag){
  
	window.open(location.protocol + "//" + document.domain + "/cakephp/tags/loadTag/" + nametag);
}