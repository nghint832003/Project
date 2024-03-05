<div style="text-align: center!important;">
    <h2>Mã hóa đơn của bạn là:<b><?= $_SESSION['id_oder']?></b> </h2>
    <h2>Nội dung chuyển khoản (Mã hóa đơn_Số điện thoại)</h2>
    <img  style="height: 500px; margin-left: 580px" src="../upload/QRcode.jpg">
    <a href="index.php?act=oders&id_customer=<?= $_SESSION['user']['id_customer']?>"><input class="thanktoan_oder" style="margin-right: 15px;background-color: #1cc88a;padding: 5px 10px;border-radius: 5px;color:#FFFFFF;" type="submit" value="Xem hóa đơn"></a>
    <a href="index.php"><input class="thanktoan_oder" style=";background-color: #1cc88a;padding: 5px 10px;border-radius: 5px;color:#FFFFFF;" type="submit" value="Về trang chủ"></a>
</div>
