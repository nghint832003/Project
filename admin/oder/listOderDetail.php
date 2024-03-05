<p style="text-align:center;color:green;font-size:24px">Chi tiết hóa đơn</p>
<form  class="" action="">
    <table class="table table-bordered">
        <table class="table table-bordered">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Mã hóa đơn</th>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Ảnh sản phẩm</th>
                    <th scope="col">Màu sản phẩm</th>
                    <th scope="col">Cỡ sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá sản phẩm</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($listOderDetail as $oderDetail){
                    extract($oderDetail);
                    $deleteOderDetail = "index.php?act=deleteOderDetail&id_oder=".$id_oder;
                    $deleteOderDetail .= "&id_oderDetail=".$id_oderDetail;
//                    $lockCustomer="index.php?act=lockCustomer&status_customer=1&id_customer=".$id_customer;
//                    $updateCustomer = "index.php?act=loadCustomer&id_customer=".$id_customer;
                    echo '<tr>
                                <th scope="col">'.$id_oderDetail.'</th>
                                <th scope="col">'.$id_product.'</th>
                                <th scope="col"><img style="height: 30px" src="../../../fashinista/upload/product/'.$pic1.'" ></th>
                                <th scope="col">'.$color_product.'</th>
                                <th scope="col">'.$size_product.'</th>  
                                <th scope="col">'.$quantity.'</th>
                                <th scope="col">'.$price_product.'</th>                                                                              
                                <td><a href="'.$deleteOderDetail.'"><input type="button" value="Xóa"></a></td>
                               </tr>';
                }
                ?>
                </tbody>
            </table>
        </table>
</form>
</div>