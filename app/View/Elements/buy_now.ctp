<style>
	.modal-window {
		position: fixed;
		width: 600px;
		height: 700px;
		top: 50%;
		left: 50%;
		margin-top: -350px;
		margin-left: -300px;
		z-index: 99;
		border: 1px solid #e5e5e5;
		background: #f7f7f9;
		display: none;
	}
</style>
<div id="buy_now_modal" class="modal-window">
	<div style="
		background: #7db432;
		height: 40px;
		color: white;
		font-size: 23px;
		align-items: center;
		justify-content: center;
		display: flex;">
		Buy now
	</div>
	<div style="padding: 20px;">
		<div class="form-group">
			<label>Họ tên</label>
			<input id="buy_now_name" require type="text" class="form-control" placeholder="Enter your name">
		</div>
		<div class="form-group">
			<label>Số điện thoại</label>
			<input id="buy_now_phone" type="number" class="form-control" placeholder="Enter your phone">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Số nhà, ngõ, phố</label>
			<input id="buy_now_sonha" type="text" class="form-control" placeholder="Enter your address">
		</div>
		<div class="form-group">
			<label>Tỉnh / Thành phố</label>
			<select class="form-control" id="hanhchinh">
				<option selected disabled> --- Please Select --- </option>
			</select>
		</div>
		<div class="form-group">
			<label>Huyện / Quận</label>
			<select id="huyen" class="form-control">
				<option selected disabled> --- Please Select --- </option>
			</select>
		</div>
		<div class="form-group">
			<label>Xã / Phường</label>
			<select id="xa" class="form-control">
				<option selected disabled> --- Please Select --- </option>
			</select>
		</div>
		<div class="form-group" style="display: flex; align-items: center;">
			<label>Sản phẩm:</label>
			<img id="img_buy_now" src="" style="margin-left: 10px;margin-right: 10px; width: 50px;">
			<div style="display: flex; align-items: center;margin-right: 10px;">
				<label style="width: 70px;">Số lượng: </label>
				<input style="width: 60px;" type="number" class="form-control" value="1" id="buy_now_amount">
			</div>
			<label >Đơn giá:</label>
			<label id="buy_now_dongia"></label>
			<label>d</label>
		</div>
		<div style="text-align: center; margin-top: 25px;">
			<button class="btn btn-primary" id="submit_buy_now">Submit</button>
			<button class="btn btn-primary" id="cancel_buy_now">Cancel</button>
		</div>
	</div>
</div>
