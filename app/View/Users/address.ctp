<div class="col-sm-9" id="content">
            <form class="form-horizontal" onclick="return false;">
                <fieldset id="address">
                    <legend>Your Address</legend>
                    <div class="form-group required">
                        <label for="input-address-1" class="col-sm-2 control-label">Số nhà, ngõ, phố</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sonha" placeholder="Số nhà, ngõ, phố">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-zone" class="col-sm-2 control-label">Tỉnh / Thành phố</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="hanhchinh" name="zone_id">
                                <option selected disabled> --- Please Select --- </option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group required">
                        <label for="input-zone" class="col-sm-2 control-label">Huyện / Quận</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="huyen" name="zone_id">
                                <option selected disabled> --- Please Select --- </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-zone" class="col-sm-2 control-label">Xã / Phường</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="xa" name="zone_id">
                                <option selected disabled> --- Please Select --- </option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <button class="btn btn-primary" id="add_address" data-user="<?php echo $this->Session->read('id_user')?>">Submit</button>
                <hr style="border-top: dotted 1px;" />
                <fieldset>
                    <legend>My Address</legend>
                    <table style="width:100%">
                        <?php for ($i=0; $i < count($arrayAddress); $i++) {?>
                            <tr>
                                <td><h3><?php echo $arrayAddress[$i]['address'] ?></h3> </td>
                                <td><i class="fas fa-trash-alt" style="font-size: 25px;" data-id="<?php echo $arrayAddress[$i]['id'] ?>" onclick="deleteAddress($(this))"></i></td>
                            </tr>
                        <?php }?>
                    </table>
                </fieldset>
                </div>
            </form>
</div>