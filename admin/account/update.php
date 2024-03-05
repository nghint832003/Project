<?php
if(is_array($customer)){
    extract($customer);
}
?>

<p style="text-align:center;color:green;font-size:24px">Cập nhật tài khoản</p>
<form  action="../../../fashinista/admin/index.php?act=updateCustomer" method="post" enctype="multipart/form-data">
    <div style="margin-left: 50px;">
        <div class="form-group">
            <div class="col-md-4">
                <input class="form-control input-md" type="hidden"  name="id_customer" value="<?php if(isset($id_customer)) echo $id_customer;?>">
            </div>

            <label class="col-md-4 control-label" >Tên khách hàng</label>
            <div class="col-md-4">
                <input class="form-control input-md" type="text" name="name_customer" value="<?php if(isset($name_customer)) echo $name_customer ;?>">
            </div>

            <label class="col-md-4 control-label" >Số điện thoại</label>
            <div class="col-md-4">
                <input class="form-control input-md" type="text" name="phone_customer" value="<?php if(isset($phone_customer)) echo $phone_customer ;?>">
            </div>

            <label class="col-md-4 control-label" >Email</label>
            <div class="col-md-4">
                <input class="form-control input-md" type="text" name="email_customer" value="<?php if(isset($email_customer)) echo $email_customer ;?>">
            </div>

            <label class="col-md-4 control-label" >Địa chỉ</label>
            <div class="col-md-4">
                <input class="form-control input-md" type="text" name="address_customer" value="<?php if(isset($address_customer)) echo $address_customer ;?>">
            </div>

            <label class="col-md-4 control-label" >Tên tài khoản</label>
            <div class="col-md-4">
                <input class="form-control input-md" type="text" name="user_customer" value="<?php if(isset($user_customer)) echo $user_customer ;?>">
            </div>

            <label class="col-md-4 control-label" >Mật khẩu</label>
            <div class="col-md-4">
                <input class="form-control input-md" type="pass" name="pass_customer" value="<?php if(isset($pass_customer)) echo $pass_customer ;?>">
            </div>

            <label class="col-md-4 control-label" >Ảnh đại diện</label>
            <div class="col-md-4">
                <input class="form-control input-md" type="file" name="pic">
            </div>

            <label class="col-md-4 control-label" >Trạng thái tài khoản</label>
            <select id="status_customer" name="status_customer" class="form-control">
                <option value="0">Mở tài khoản</option>
                <option value="1">Khóa tài khoản</option>
            </select>

            <label class="col-md-4 control-label" >Loại tài khoản</label>
            <select id="user" name="user" class="form-control">
                <option value="0">Tài khoản khách hàng</option>
                <option value="1">Tài khoản quản lí</option>
            </select>

        </div>
        <div class="form-group">
            <div class="col-md-4">
                <input type="submit" name="updateCustomer" value="Cập nhật">
                <input type="reset" value="Nhập lại">
            </div>
        </div>
        <?php
        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
        ?>
    </div>

</form>
</div>