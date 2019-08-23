$(function() {
    var pusher = new Pusher('5fd26f415e2c6b54fd0f', {
        cluster: 'ap1',
        forceTLS: true
    });

    var channel = pusher.subscribe('Notification');
    channel.bind("Show_Noti_Comment_" + $('.container-fluid').attr('data_id_store') , function(data) {
        var num_notification = $('#count_noti').attr('number_noti');
        content = 'Have a new comment!';
        icon = 'fa-comment';
        color = 'bg-primary';
        link = '/home/product/'

        if (data['Notification']['type'] == 2) {
            content = 'Phản hồi bình luận!';
            icon = 'fa-comments';
            color = 'bg-info';
        }

        if (data['Notification']['type'] == 3) {
            content = 'You are new Order to a Custom!';
            icon = 'fa-file-alt';
            color = 'bg-success';
            link = '/invoices/details/'
        }

        $('#count_noti').text('');
        num_notification++;
        $('#count_noti').attr({ 'number_noti' : num_notification });
        $('#count_noti').text(num_notification);
        $('#a_not_notification').hide();
        addNotification(data, content, icon, color, link);
    });

    if (parseInt($('#div_of_notification').attr('sum_notification')) > 5 ) {
        $('#div_of_notification')
            .append($('<a>').addClass('color_uncheck')
                .addClass('dropdown-item text-center small text-gray-500')
                .attr({'href' : '/admin/listnotification'})
                .text('Show All Alerts'));
    }
    listShowNotification();
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
    $('#div_of_notification').prepend($('<div>').addClass('itemnoti color_uncheck table_noti_' + data['Notification']['id']).attr({
        'onClick' :'checkedNoti($(this))',
        'data_id_noti' : data['Notification']['id']
        })
        .append($('<a>').addClass('dropdown-item d-flex align-items-center').attr({
            'href' : link + data['Notification']['id_key_notication'],
            'target' : '_blank',
            'rel' : 'noopener noreferrer'
            })
            .append($('<div>').addClass('mr-3')
                .append($('<div>').addClass('icon-circle ' + color)
                    .append($('<i>').addClass('fas text-white ' + icon))
                )
            ).append($('<div>')
                .append($('<div>').addClass('small text-gray-500').text(data['Notification']['create_at']))
                .append($('<span>').addClass('font-weight-bold').append(content))
            )
        )
    );

    $('.div_list_notification').prepend($('<div>').addClass('item_notification').attr({
            'onClick' : "checkedNoti($('.table_noti_" + data['Notification']['id'] + "'))"
        })
        .append($('<a>').addClass('dropdown-item d-flex align-items-center')
            .attr({
                'target' : '_blank',
                'id' : 'sothutu_' + data['Notification']['id'],
                'rel' : 'noopener noreferrer',
                'href' : link + data['Notification']['id_key_notication']
            })
            .append($('<div>').addClass('div_conten_noti')
                .append($('<span>').addClass('font-weight-bold').append(content))
            )
        )
    );

    listShowNotification();
}

function checkedNoti(obj) {
    var num_notification = $('#count_noti').attr('number_noti');
    console.log(num_notification);
    console.log($(obj).attr('data_id_noti'));
    $.ajax({
		url:"/Admin/updateCheckNoti",
        type:'POST',
		data:{
			id_notification: $(obj).attr('data_id_noti'),
		}
	}).done(function(res) {
        console.log(res);
        if (res == 'updated'){
            $('#count_noti').text('');
            num_notification--;
            $('#count_noti').attr({ 'number_noti' : num_notification });
            $('#count_noti').text(num_notification);
            $(obj).removeClass('color_uncheck');
            $('#sothutu_' + $(obj).attr('data_id_noti'))
                .append($('<div>').addClass('icon-circle')
                    .append($('<i>').addClass('fas fa-check').css('color', 'crimson'))
                );
        }
    });
}