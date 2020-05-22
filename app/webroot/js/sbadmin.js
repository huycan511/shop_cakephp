$(function() {
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
    var pusher = new Pusher('f552927cd047ec3e0bcb', {
        cluster: 'ap1',
        forceTLS: true
    });

    var channel = pusher.subscribe('Notification');
    channel.bind("Show_Noti_Comment_" + $('.container-fluid').attr('data_id_store') , function(data) {
		console.log(data);
        var num_notification = $('#count_noti').attr('number_noti');

		content = 'Có đơn hàng mới!';
		icon = 'fa-file-alt';
		color = 'bg-success';
		link = '/invoices/details/'


        $('#count_noti').text('');
        num_notification++;
        $('#count_noti').attr({ 'number_noti' : num_notification });
        $('#count_noti').text(num_notification);
        $('#a_not_notification').hide();
        addNotification(data, content, icon, color, link);
    });
});


function listShowNotification() {
    var num = 0;
    $(".itemnoti").each(function() {
        num++;
        $(this).attr('STT', num );
        if (parseInt($(this).attr('STT')) > 5){
            $(this).hide();
        }
    });
}

function addNotification(data, content, icon, color, link) {
    $('#div_of_notification').prepend($('<div>').addClass('itemnoti color_uncheck')
        .append($('<a>').addClass('dropdown-item d-flex align-items-center').attr({
            'href' : link + data['id_invoice'],
            'target' : '_blank',
            'rel' : 'noopener noreferrer'
            })
            .append($('<div>').addClass('mr-3')
                .append($('<div>').addClass('icon-circle ' + color)
                    .append($('<i>').addClass('fas text-white ' + icon))
                )
            ).append($('<div>')
                .append($('<div>').addClass('small text-gray-500').text(data['create_at']))
                .append($('<span>').addClass('font-weight-bold').append(content))
            )
        )
    );
}
