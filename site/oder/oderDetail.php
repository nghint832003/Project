<p style="text-align:center;color:green;font-size:24px">Chi tiết hóa đơn</p>
<div style="margin-top: 32px; margin-left: 320px">
<form  class="" action="" style="width: 100%" >
    <table class="table table-bordered"  >
        <table class="table table-bordered" >
            <table class="table" >
                <thead>
                <tr>
                    <th scope="col">Mã hóa đơn</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Ảnh sản phẩm</th>
                    <th scope="col">Màu sản phẩm</th>
                    <th scope="col">Cỡ sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th></th>
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
                                <td scope="col">'.$id_oderDetail.'</td>
                                <td scope="col">'.$name_product.'</td>
                                <td scope="col"><img style="width: 40px" src="../../../fashinista/upload/product/'.$pic1.'" ></td>
                                <td scope="col">'.$color_product.'</td>
                                <td scope="col">'.$size_product.'</td>  
                                <td scope="col">'.$quantity.'</td>
                                <td scope="col">'.$price_product.'</td>                                                                              
                                
                               </tr>';
                }
                ?>
                </tbody>
            </table>
        </table>
</form>
</div>