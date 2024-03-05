<p style="text-align:center;color:green;font-size:24px;margin-bottom: 32px">GIỎ HÀNG</p>
<table border="1" style="width:90% ;" >
    <thead>
    <tr>
        <th>Ảnh sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Màu sản phẩm</th>
        <th>Cỡ sản phẩm</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $totalUnitPrice = 0;
//    print_r($_SESSION['myCart']);
        foreach ($_SESSION['myCart'] as $cart){
            $id_product = $cart[0];
            $pic1 = $cart[1];
            $name_product = $cart[2];
            $color_product = $cart[3];
            $size_product = $cart[4];
            $price_product = $cart[5];
            $quantity = $cart[6];
            $unitPrice = $quantity * $price_product;
            $totalUnitPrice += $unitPrice;
            echo '<tr>
                     <td id="img"><img src="../../fashinista/upload/product/'.$pic1.'"></td>
                     <td>'.$name_product.'</td>
                     <td>'.$color_product.'</td>
                     <td>'.$size_product.'</td>
                     <td id="price">'.$price_product.'</td>
                     <td>'.$quantity.'</td>          
                     <td>'.$unitPrice.'</td>
                     <td> <a style="font-size: 25px;" href="index.php?act=deleteCart&id_product='.$id_product.'&id_customer='.$_SESSION['user']['id_customer'].'"><i style="color:red" class="fa fa-trash"></i></a> </td>
                  </tr>
                ';
        }
        echo '<tr>
                <th id="tt" colspan="8">Tổng tiền:'.$totalUnitPrice.'</th>
              </tr>';
    ?>

    </tbody>
</table>
<form style="width: 700px;margin: 0 auto;" method="post" enctype="application/x-www-form-urlencoded" action="../../fashinista/index.php?act=addOder">
    <input type="hidden" name="id_customer" value="<?= $_SESSION['user']['id_customer']?>">
    <input type="hidden" name="unitPrice" value="<?= $totalUnitPrice?>">
    <div style="margin-top: 30px">
        <input type="radio" name="methodpayment" value="11">
        <label>Thanh toán khi nhận hàng</label><br>

        <input type="radio" name="method_payment" value="1">
        <label>Thanh toán bằng chuyển khoản</label>
        <div>
            <div class="mb-6" style="margin-top: 20px;">
                <input
                        type="text" name="name_customer" required
                        class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Họ và Tên"
                />
            </div>

            <div class="mb-6">
                <input
                        type="text" name="phone_customer" required
                        class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Số điện thoại"
                />
            </div>

            <div class="mb-6">
                <input
                        type="text" name="address_customer" required
                        class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Địa chỉ"
                />
            </div>
        </div>
        <div class="thanktoan" style="display: flex;">
            <input class="thanktoan_oder" style="margin-right: 20px;background-color: green;padding: 7px 10px;border-radius: 5px;color:#FFFFFF;" name="oder" type="submit" value="THANH TOÁN">
        </div>
    </div>
</form>