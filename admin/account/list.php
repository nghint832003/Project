<p style="text-align:center;color:green;font-size:24px">DANH SÁCH TÀI KHOẢN</p>
<form  class="" action="">
    <table class="table table-bordered">
        <table class="table table-bordered">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Mã khách hàng</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col"> Tên khách hàng</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa chỉ </th>
                    <th scope="col">Tài khoản đăng nhập</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($listCustomer as $customer){
                    extract($customer);
                    $unlockCustomer="index.php?act=unlockCustomer&id_customer=".$id_customer;
                    $lockCustomer="index.php?act=lockCustomer&id_customer=".$id_customer;
                    $updateCustomer = "index.php?act=loadCustomer&id_customer=".$id_customer;
                    $statusCustomer = "";
                    if($status_customer == 1){
                        $statusCustomer = "<p style='color: red'>Khóa</p>";
                    } else{
                        $statusCustomer = "<p style='color:green;'>Mở</p>";
                    }
                    echo '<tr>
                                <th scope="col">'.$id_customer.'</th>
                                <th scope="col"><img style="height: 25px" src="../../upload/user/'.$pic.'"></th>
                                <th scope="col">'.$name_customer.'</th>
                                <th scope="col">0'.$phone_customer.'</th>
                                <th scope="col">'.$email_customer.'</th>
                                <th scope="col">'.$address_customer.'</th>  
                                <th scope="col">'.$user_customer.'</th>
                                <th scope="col">'.$pass_customer.'</th>   
                                <th scope="col">'.$statusCustomer.'</th>                                                       
                                <td><a href="'.$lockCustomer.'"><input type="button" value="Khóa"></a>
                                    <a href="'.$unlockCustomer.'"><input type="button" value="Mở"></a>
                                    <a href="'.$updateCustomer.'"><input type="button" value="Cập nhật"></a></td>
                              </tr>';
                }
                ?>
                </tbody>
            </table>
        </table>
</form>
</div>