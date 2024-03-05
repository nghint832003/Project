<p style="text-align:center;color:green;font-size:24px">Danh sách hóa đơn</p>
<form  class="" action="">
    <table class="table table-bordered">
        <table class="table table-bordered">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Mã HĐ</th>
                    <th scope="col">Mã KH</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Tổng tiền</th>
<!--                    <th scope="col">Tên người nhận</th>-->
                    <th scope="col">SĐT </th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Phương thức thanh toán</th>
                    <th scope="col">Thanh toán</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($listOder as $oder){
                    extract($oder);
                        $inputPayment = "";
                        $inputOder = "";
                        $deleteOder = "index.php?act=deleteOder&id_oder=".$id_oder;
                        $detail = "index.php?act=listOderDetail&id_oder=".$id_oder;
                        $Oder = "index.php?act=Oder&id_oder=".$id_oder;
                        $Payment = "index.php?act=Payment&id_oder=".$id_oder;
                        $statusOder = "";
                        if($status_oder == 0){
                            $statusOder = "<p style='color: red'>Chưa thanh toán</p>";
                        } else {
                            $statusOder = "<p style='color: green'>Đã thanh toán</p>";
                            $inputOder = "hidden";
                        }
                        $statusPayment = "";
                        if($status_payment == 0){
                            $statusPayment = "<p style='color: darkred'>Đang giao</p>";
                        } else {
                            $statusPayment = "<p style='color: green'>Giao thành công</p>";
                            $inputPayment = "hidden";
                        }
                    $method = "";
                    if($method_payment == 1){
                        $method = "Chuyển khoản";
                    } else{
                        $method = "Thanh toán khi nhận hàng";
                    }
                    echo '<tr>
                                <th scope="col">'.$id_oder.'</th>
                                <th scope="col">'.$id_customer.'</th>
                                <th scope="col">'.$date_oder.'</th>
                                <th scope="col">'.$unitPrice.'</th>
                                <th scope="col">0'.$phone_customer.'</th>
                                <th scope="col">'.$address_customer.'</th> 
                                <th scope="col">'.$method.'</th>
                                <th scope="col">'.$statusOder.'</th>    
                                <th scope="col">'.$statusPayment.'</th>                                                     
                                <td><a href="'.$deleteOder.'"><input type="button" value="Xóa"></a> <br>
                                    <a href="'.$detail.'"><input type="button" value="Chi tiết"></a> <br>  
                                    <a href="'.$Oder.'"><input type="button" '.$inputOder.' value="Thanh toán"></a><br>
                                    <a href="'.$Payment.'"><input type="button" '.$inputPayment.' value="Giao hàng"></a>    
                                </td>                                                         
                              </tr>';
                }
                ?>
                </tbody>
            </table>
        </table>
</form>
</div>