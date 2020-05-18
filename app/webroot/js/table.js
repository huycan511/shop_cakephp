$(function(){
	$('#dataTable').DataTable();
	$("#dataTable1").dataTable().fnDestroy();
	$('#dataTable1').DataTable({
		 "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $( api.column( 4 ).footer() ).html(
                '$'+pageTotal
            );
        }
	});
	if($("#modal").length){
		$("#modal").iziModal();
	}
	//$( ".preview-images-zone" ).sortable();
	$.getJSON( location.protocol + "//" + document.domain +"/app/webroot/tree.json", function( data ) {
		$.each( data, function( key, value ) {
			$('#hanhchinh').append($('<option>', {value:key, text:value['name']}));
		});
		$('#hanhchinh').on('change', function() {
			$('#huyen')
			    .empty()
			    .append('<option selected disabled> --- Please Select --- </option>')
			;
			$('#xa')
				    .empty()
				    .append('<option selected disabled> --- Please Select --- </option>')
				;
			var i = this.value;
			$.each( data, function( key, value ) {
				if(key == i){
					$.each( value['quan-huyen'], function( key, value ) {
						//console.log(value);
						$('#huyen').append($('<option>', {value:key, text:value['name']}));
					});
				}
			});
			$('#huyen').on('change',function(){
				$('#xa')
				    .empty()
				    .append('<option selected disabled> --- Please Select --- </option>')
				;
				var j = this.value;
				$.each( data[i]['quan-huyen'], function( key, value ) {
					if(key == j){
						$.each( value['xa-phuong'], function( key, value ) {
							$('#xa').append($('<option>', {value:value['path_with_type'], text:value['name']}));
						});
					}
				});
			});
		});
	});
    $(document).on('click', '.image-cancel', function() {
        let no = $(this).data('no');
        $(".preview-image.preview-show-"+no).remove();
    });
	$('.add_cate').click(function(event) {
		$.ajax({
			url: location.protocol + "//" + document.domain +"/admins/addCategory",
			type: 'POST',
			data: {category: $(this).prev().val()}
		})
		.done(function(res) {
			location.reload();
		})
		.fail(function() {
			console.log("error");
		});
	});
	var fileCatcher = document.getElementById('file-catcher');
	var fileInput = document.getElementById('pro-image');

	fileShow = document.getElementById('preview-images-zone');
	var fileListDisplay = document.getElementById('file-list-display');
	if(fileCatcher!=null){
		var fileList = [];
		var renderFileList, sendFile, editImg;

		fileCatcher.addEventListener('submit', function (evnt) {
	    	evnt.preventDefault();
	    	if(window.location.href == location.protocol + "//" + document.domain +'/admin/products'){
	       		sendFile(fileList);
	       	}else{
	       		editImg(fileList);
	       	}
		});

		fileInput.addEventListener('change', function (evnt) {
			$(".preview-image").remove();
			readImage();

			fileList = [];
			for (var i = 0; i < fileInput.files.length; i++) {
				fileList.push(fileInput.files[i]);
			}
			renderFileList();
		});

	  renderFileList = function () {
	    fileListDisplay.innerHTML = '';
	    fileList.forEach(function (file, index) {
	        var fileDisplayEl = document.createElement('p');
	      fileDisplayEl.innerHTML = (index + 1) + ': ' + file.name;
	      fileListDisplay.appendChild(fileDisplayEl);
	    });
	  };

	  sendFile = function (file) {
	    var formData = new FormData();
	    for (var i = 0; i < file.length; i++) {
	    	 formData.append('file[]', file[i]);
	    }

	    formData.append('name',$('.name_product').val());
		formData.append('category',$('.cate_product').val());
		formData.append('price',$('.price_product').val());
		formData.append('description',$('.short_description').val());

			$.ajax({
				url: location.protocol + "//" + document.domain +"/admins/addProduct/",
				type: 'POST',
				processData: false,
				contentType: false,
				data: formData
			}).done(function(res) {
				res = $.parseJSON(res);
				console.log(res);
				location.reload();
			});
	  };
	  editImg = function (file) {
	    var formData = new FormData();
	    for (var i = 0; i < file.length; i++) {
	    	 formData.append('file[]', file[i]);
	    }
	    formData.append('id',$('#idproduct').val());
			$.ajax({
				url: location.protocol + "//" + document.domain +"/products/editImg/",
				type: 'POST',
				processData: false,
				contentType: false,
				data: formData
			}).done(function(res) {
				location.reload();
			});
	  };
	}

	$('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });
    $('.preenty-switch').click(function(event) {
    	$.ajax({
    		url: location.protocol + "//" + document.domain +"/questions/show/"+$(this).attr('data-show')
    	})
    	.done(function() {
    		console.log("success");
    	})
    	.fail(function() {
    		console.log("error");
    	});
    });
})
	function edit_btn(obj){
		obj.hide();
		obj.next().removeClass('d-none');
		obj.parent().prev().children('span').hide();
		obj.parent().prev().children('input').removeClass('d-none');
	}
	function submit_edit_cate(obj){
		obj.addClass('d-none');
		obj.prev().show();
		obj.parent().prev().children('span').text(obj.parent().prev().children('input').val());
		obj.parent().prev().children('span').show();
		obj.parent().prev().children('input').addClass('d-none');
		$.ajax({
			url: location.protocol + "//" + document.domain +"/admins/editCate",
			type: 'POST',
	        data: {
	            id : obj.attr('data-id'),
	            category: obj.parent().prev().children('input').val()
	        }
		})
		.done(function(res) {
		})
		.fail(function() {
			console.log("error");
		});
	}
	var num = 4;
function readImage() {
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");

        for (let i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.match('image')) continue;

            var picReader = new FileReader();

            picReader.addEventListener('load', function (event) {
                var picFile = event.target;
                var html =  '<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-cancel" data-no="' + num + '">x</div>' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                            '</div>';

                output.append(html);
                num = num + 1;
            });

            picReader.readAsDataURL(file);
        }
       // $("#pro-image").val('');
    } else {
        console.log('Browser not support');
    }
}
function edit_protype_product(obj){
	obj.hide();
	obj.next().removeClass('d-none');
	obj.parent().prev().children('input').removeClass('d-none');
	obj.parent().prev().children('span').hide();
}
function edit_category_product(obj){
	obj.hide();
	obj.next().removeClass('d-none');
	obj.parent().prev().children('select').removeClass('d-none');
	obj.parent().prev().children('span').hide();
}
function submit_edit_category(obj){
	obj.addClass('d-none');
	obj.prev().show();
	obj.parent().prev().children('select').addClass('d-none');
	$.ajax({
		url: location.protocol + "//" + document.domain +"/products/editCategory",
		type: 'POST',
		data: {
			id: obj.attr('data-id'),
			category: obj.parent().prev().children('select').val()
		},
	})
	.done(function(res) {
		res = $.parseJSON(res);
		console.log(res);
		$('.catego').text(res['name_genre']).show();
		$.toast({
            heading: 'Success',
            text: 'Edit successful!',
            icon: 'success',
            position: 'bottom-right',
            loader: false
        });
	})
	.fail(function() {
		console.log("error");
	});
}
function submit_edit_name(obj){
	obj.addClass('d-none');
	obj.prev().show();
	obj.parent().prev().children('input').addClass('d-none');
	obj.parent().prev().children('span').text(obj.parent().prev().children('input').val()).show();
	$.ajax({
		url: location.protocol + "//" + document.domain +"/products/editName",
		type: 'POST',
		data: {
			id: obj.attr('data-id'),
			name: obj.parent().prev().children('input').val()
		},
	})
	.done(function(res) {
		$.toast({
            heading: 'Success',
            text: 'Edit successful!',
            icon: 'success',
            position: 'bottom-right',
            loader: false
        });
	})
	.fail(function() {
		console.log("error");
	});
}
function submit_edit_price(obj){
	obj.addClass('d-none');
	obj.prev().show();
	obj.parent().prev().children('input').addClass('d-none');
	obj.parent().prev().children('span').text(obj.parent().prev().children('input').val()+' VND').show();
	$.ajax({
		url: location.protocol + "//" + document.domain +"/products/editPrice",
		type: 'POST',
		data: {
			id: obj.attr('data-id'),
			price: obj.parent().prev().children('input').val()
		},
	})
	.done(function(res) {
		$.toast({
            heading: 'Success',
            text: 'Edit successful!',
            icon: 'success',
            position: 'bottom-right',
            loader: false
        });
	})
	.fail(function() {
		console.log("error");
	});
}
function edit_protype_sdescription(obj){
	obj.hide();
	obj.next().removeClass('d-none');
	obj.parent().prev().children('textarea').removeClass('d-none');
	obj.parent().prev().children('span').hide();
}
function submit_edit_sdescription(obj){
	obj.addClass('d-none');
	obj.prev().show();
	obj.parent().prev().children('textarea').addClass('d-none');
	obj.parent().prev().children('span').text(obj.parent().prev().children('textarea').val()).show();
	$.ajax({
		url: location.protocol + "//" + document.domain +"/products/editDescription",
		type: 'POST',
		data: {
			id: obj.attr('data-id'),
			description: obj.parent().prev().children('textarea').val()
		},
	})
	.done(function(res) {
		$.toast({
            heading: 'Success',
            text: 'Edit successful!',
            icon: 'success',
            position: 'bottom-right',
            loader: false
        });
	})
	.fail(function() {
		console.log("error");
	});
}
function deleteImg(obj){
	$.confirm({
	    title: false,
	    buttons: {
	        confirm: function () {
	            $.ajax({
					url: location.protocol + "//" + document.domain +"/products/deleteImg",
					type: 'POST',
					data: {
						id: obj.attr('data-id'),
						img: obj.attr('data-text')
					},
				})
				.done(function(res) {
					location.reload();
				})
				.fail(function() {
					console.log("error");
				});
	        },
	        cancel: function () {
	            console.log('cancael');
	        }
	    },
	    theme: 'black',
	});
}
function showUpload(obj){
	obj.hide();
	obj.parent().next().removeClass('d-none');
}

function readImage() {
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");

        for (let i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.match('image')) continue;

            var picReader = new FileReader();

            picReader.addEventListener('load', function (event) {
                var picFile = event.target;
                var html =  '<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                            '</div>';

                output.append(html);
                num = num + 1;
            });

            picReader.readAsDataURL(file);
        }
       // $("#pro-image").val('');
    } else {
        console.log('Browser not support');
    }
}
