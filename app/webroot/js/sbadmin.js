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
})
