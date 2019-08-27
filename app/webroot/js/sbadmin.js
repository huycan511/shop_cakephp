$(function(){
    $(".switch").click(function(event){
        console.log($(this).attr("data-status"));
	})
	$("#send_mail").click(function(e){
		var msg = $("#content_email").val();
		var sub = $("#subject_email").val();
		$.ajax({
			type: "POST",
			url: location.protocol + "//" + document.domain + "/mails/sendMail",
			data: {
				msg: msg,
				subject: sub,
			},
			success: function (res) {
				console.log(res)
			}
		});
	})
	$("#generate_excel").click(function(e){
		$.ajax({
			type: "POST",
			url: location.protocol + "//" + document.domain + "/admin/excelEarning",
			data: {
				from_date: $("#from_date").val(),
				to_date: $("#to_date").val(),
			},
			success: function (res) {
				console.log(res)
			}
		});
	})
})
