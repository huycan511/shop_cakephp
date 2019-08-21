<style>
.div_list_notification{
    display: grid;
    border-top: solid;
    border-top-color: cornflowerblue;
    margin: auto;
    padding-top: 15px;
}
.item_notification{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    height: 50px;
    width: 100%;
    box-sizing: border-box;
    background-color:#F1F8FD;
    border: 1px solid #03b3f9;
    margin: 2px 0;
}
.div_conten_noti{
    margin:auto;
    padding:auto;
    width:100%;
    height:100%;
    color:#6EA6CC;
    text-decoration: none;
    font-weight: 400;
}
.item_notification:hover {
    background-color: #FFFFFF;
}
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<div class="div_list_notification" sum_notification="<?php echo count($notifications); ?>">
    <?php foreach ($notifications as $notifications) { ?>
        <div onClick="checkedNoti($('.table_noti_<?php echo $notifications['Notification']['id']?>'))" class="item_notification">
            <?php if ($notifications['Notification']['type'] == 1 || $notifications['Notification']['type'] == 2) { ?>
                <a target="_blank" id="sothutu_<?php echo $notifications['Notification']['id']?>" rel="noopener noreferrer" class="dropdown-item d-flex align-items-center" href="/home/product/<?php echo $notifications['Notification']['id_key_notication']; ?>">
            <?php } else { ?>
                <a target="_blank" rel="noopener noreferrer" class="dropdown-item d-flex align-items-center" href="#">
            <?php } ?>
                    <div class="div_conten_noti">
                        <?php if ($notifications['Notification']['type'] == 1) { ?>
                            <span class="font-weight-bold">Have a new comment!</span>
                        <?php } else if ($notifications['Notification']['type'] == 2) {?>
                            <span class="font-weight-bold">Phản hồi bình luận!</span>
                        <?php } else { ?>
                            <span class="font-weight-bold">Have a Đơn hangf mới!</span>
                        <?php } ?>
                    </div>
                    <?php if($notifications['Notification']['status'] != '') { ?>
                        <div class="icon-circle">
                            <i class="fas fa-check" style='color: crimson;'></i>
                        </div>
                    <?php } ?>
                </a>
        </div>

    <?php } ?>
</div>
<script>

</script>