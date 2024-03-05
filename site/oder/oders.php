<p style="text-align:center;color:green;font-size:24px">DANH SÁCH HÓA ĐƠN</p>
<div style="margin-left: 80px; margin-top: 32px">
<table border="1" style="width:90% ;" >
    <thead>
    <tr>
                    <th scope="col">Mã hóa đơn</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Số điện thoại </th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Phương thức thanh toán</th>
                    <th scope="col">Thanh toán</th>
                    <th scope="col">Trạng thái</th>
                    <th></th>
    </tr>
    </thead>
    <tbody>
                <?php
                foreach($listOderCustomer as $oder){
                    extract($oder);
                    $method = "";
//                    $lockCustomer="index.php?act=lockCustomer&status_customer=1&id_customer=".$id_customer;
                    $detail = "index.php?act=listOderDetail&id_oder=".$id_oder;
                    if($method_payment == 1){
                        $method = "Chuyển khoản";
                    } else{
                        $method = "Thanh toán khi nhận hàng";
                    }
                    $oder = "";
                    if($status_oder == 1){
                        $oder = "<p style='color:green;'>Đã thanh toán</p>";
                    } else{
                        $oder = "<p style='color:red;'>Chưa thanh toán</p>";
                    }
                    $payment = "";
                    if($status_payment == 1){
                        $payment = "<p style='color: green'>Giao thành công</p>";
                    } else{
                        $payment = "<p style='color:darkred;'>Đang giao hàng</p>";
                    }
                    echo '<tr>
                                <td>'.$id_oder.'</td>
                                <td>'.$date_oder.'</td>
                                <td>'.$unitPrice.'</td>
                                <td>0'.$phone_customer.'</td>
                                <td>'.$address_customer.'</td>
                                <td>'.$method.'</td>
                                <td>'.$oder.'</td>
                                <td>'.$payment.'</td>                                                    
                                <td>
                                    <a href="'.$detail.'"><input class="thanktoan_oder" style="margin-right: 15px;background-color: green;padding: 5px 10px;border-radius: 5px;color:#FFFFFF;" name="oder" type="submit" value="CHI TIẾT"></a></td>
                          </tr>';
                }
                ?>
                </tbody>
            </table>

</form>
</div>