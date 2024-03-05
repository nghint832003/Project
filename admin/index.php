<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location:../../fashinista/index.php");
}
include "../dao/pdo.php";
include "../dao/account.php";
include "../dao/category.php";
include "../dao/comment.php";
include "../dao/product.php";
include "../dao/oder.php";
include "header.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            case 'addCategory':
                if(isset($_POST['addCate'])&&($_POST['addCate'])){
                    $name_category = $_POST['name_category'];
                    $filename=$_FILES['hinh']['name'];
                    if($name_category == '' && $filename == ''){
                        $thongbao = "Vui lòng điền đầy đủ thông tin";
                    } else{
                        $target_dir = "../upload/category/";
                        $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                        } else {
                            //echo "Sorry, there was an error uploading your file.";
                        }
                        insert_category($name_category,$filename);
                        $thongbao="Thêm thành công";
                    }
                }
                include "../admin/category/add.php";
                break;

            case 'listCategory':
                $listCategory = loadall_category();
                include "category/list.php";
                break;

            case 'deleteCategory':
    //            if(isset($_GET['name_category']) && $_GET['name_category'] >0){
                    delete_category($_GET['id_category']);
    //            }
                $listCategory = loadall_category();
                include 'category/list.php';
                break;

            case 'loadCategory':
                if(isset($_GET['id_category']) && $_GET['id_category'] > 0){
                    $category = loadone_category($_GET['id_category']);
                }

                include 'category/update.php';
                break;

            case 'updateCategory':
                if(isset($_POST['updateCate'])){
                    $name_category = $_POST['name_category'];
                    $id_category = $_POST['id_category'];
                    $filename = $_FILES['pic']['name'];
                    if($name_category == '') {
                        echo "<script>alert('Không Để Trống dữ liệu !');</script>";

    //                } else if($id_category == ''){
    //                    echo "<script>alert('Không Để Trống dữ liệu !');</script>";
                    } else if($filename == ''){
                        echo "<script>alert('Không Để Trống dữ liệu !');</script>";
                    }
                    else{
                        $filename = $_FILES['pic']['name'];
                        $target_dir = "../upload/category/";
                        $target_file = $target_dir . basename($_FILES["pic"]["name"]);
                        if ($name_category == ''  && $filename == '') {
                            echo "<script>alert('Không Để Trống dữ liệu !');</script>";
                        } else {
                            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
                            } else {
                            }
                            update_category($id_category, $name_category, $filename);
                            $thongbao = "Cập nhật thành công";
                        }
                    }
                }
                $listCategory = loadall_category();
                include 'category/list.php';
                break;

            case 'addProduct':
                if(isset($_POST['updatePro'])){
                    $name_product = $_POST['name_product'];
                    $id_category = $_POST['id_category'];
                    $des_product = $_POST['des_product'];
                    $date_product = date('Y/m/d');
                    $price_product = $_POST['price_product'];
                    $pic1 = $_FILES['pic1']['name'];
                    $pic2 = $_FILES['pic2']['name'];
                    $pic3 = $_FILES['pic3']['name'];
                    $pic4 = $_FILES['pic4']['name'];
                    $target_dir = "../upload/product/";
                    $target_file1 = $target_dir . basename($_FILES["pic1"]["name"]);
                    $target_file2 = $target_dir . basename($_FILES["pic2"]["name"]);
                    $target_file3 = $target_dir . basename($_FILES["pic3"]["name"]);
                    $target_file4 = $target_dir . basename($_FILES["pic4"]["name"]);
                    if($name_product == '' && $id_category == '' && $des_product == '' && $price_product==''
                    && $pic1=='' && $pic2=='' && $pic3=='' &&$pic4==''){
                        $thongbao = "Vui lòng điền đầy đủ thông tin";
                    } else {
                        move_uploaded_file($_FILES["pic1"]["tmp_name"], $target_file1);
                        move_uploaded_file($_FILES["pic2"]["tmp_name"], $target_file2);
                        move_uploaded_file($_FILES["pic3"]["tmp_name"], $target_file3);
                        move_uploaded_file($_FILES["pic4"]["tmp_name"], $target_file4);
                        insert_product($name_product, $id_category, $pic1, $pic2, $pic3, $pic4, $des_product, $date_product,$price_product);
                        $thongbao = "Thêm thành công";
                    }

                }
                $listCategory =loadall_category();
                include 'product/add.php';
                break;
            case 'addDetailProduct':
                if(isset($_POST['addDetailPro'])){
                    $id_product = $_POST['id_product'];
                    $color_product = $_POST['color_product'];
                    $size_product = $_POST['size_product'];
                    $quantity_product = $_POST['quantity_product'];
                    if($color_product == '' && $size_product == '' && $quantity_product ==''){
                        $thongbao = "Vui lòng điền đầy đủ thông tin";
                    } else{
                        insert_product_detail($id_product,$color_product,$size_product,$quantity_product);
                        $thongbao = "Thêm thành công";
                    }
                }
                $listProduct = loadall_product();
                include '../../fashinista/admin/product/add_detail.php';
                break;
            case 'listProduct':
                if(isset($_POST['listPro'])){
                    $name_product =$_POST['name_product'];
                    $name_category = $_POST['name_category'];
                    $search_products = search_products($name_product, $name_category);
                }
                $listProduct = loadall_product();
                include 'product/list.php'; 
                break;

            case 'deleteAllProduct':
                if(isset($_POST['name'])){
                    foreach ($_POST['name'] as $value){
                        $idProduct = $value;
                        delete_products_detail($idProduct);
                        delete_product($idProduct);
                    }
                }
                $listProduct = loadall_product();
                include 'product/list.php';
                break;

            case 'listDetailProduct':
                    $id_product = $_GET['id_product'];
                    $listProductDetail = load_product_detail($id_product);
                include 'product/list_detail.php';
                break;

            case 'listComment':
                $list_comment = list_comment();
                include '../../fashinista/admin/comment/list.php';
                break;

            case 'listCustomer':
                $listCustomer = loadall_account();
                include '../../fashinista/admin/account/list.php';
                break;

            case 'listOder':
                $listOder = loadall_oder();
                include '../../fashinista/admin/oder/listOder.php';
                break;

            case 'listOderDetail':
                if(isset($_GET['id_oder'])){
                    $listOderDetail = loadall_oder_detail($_GET['id_oder']);
                }
                include "../../fashinista/admin/oder/listOderDetail.php";
                break;


            case 'deleteProduct':
                if(isset($_GET['id_product'])){
                    delete_products_detail($_GET['id_product']);
                    delete_product($_GET['id_product']);
                }
                $listProduct = loadall_product();
                include 'product/list.php';
                break;

            case 'deleteComment':
                if(isset($_GET['id_comment'])){
                    delete_comment($_GET['id_comment']);
                }
                $list_comment = list_comment();
                include '../../fashinista/admin/comment/list.php';
                break;

            case 'deleteOderDetail':
                if(isset($_GET['id_oderDetail'])){
                    deleteOderDetail($_GET['id_oderDetail']);
                }
                $listOderDetail = loadall_oder_detail($_GET['id_oder']);
                include '../../fashinista/admin/oder/listOderDetail.php';
                break;

            case 'deleteOder':
                if(isset($_GET['id_oder'])){
                    delete_oder_detail($_GET['id_oder']);
                    deleteOder($_GET['id_oder']);
                }
                $listOder = loadall_oder();
                include '../../fashinista/admin/oder/listOder.php';
                break;

            case 'lockCustomer':
                if(isset($_GET['id_customer'])){
                    lockCustomer($_GET['id_customer']);
                }
                $listCustomer = loadall_account();
                include '../../fashinista/admin/account/list.php';
                break;

            case 'unlockCustomer':
                if(isset($_GET['id_customer'])){
                    unlockCustomer($_GET['id_customer']);
                }
                $listCustomer = loadall_account();
                include '../../fashinista/admin/account/list.php';
                break;

            case 'loadProduct':
                if(isset($_GET['id_product'])){
                    $product = loadone_product($_GET['id_product']);
                }
                $listProduct = loadall_product();
                $listCategory = loadall_category();
                include 'product/update.php';
                break;

            case 'loadCustomer':
                if(isset($_GET['id_customer'])){
                    $customer = loadone_customer($_GET['id_customer']);
                }
                $listCustomer = loadall_account();
                include '../../fashinista/admin/account/update.php';
                break;

            case 'updateCustomer':
                if(isset($_POST['updateCustomer'])){
                    $id_customer = $_POST['id_customer'];
                    $name_customer = $_POST['name_customer'];
                    $phone_customer = $_POST['phone_customer'];
                    $email_customer = $_POST['email_customer'];
                    $address_customer = $_POST['address_customer'];
                    $user_customer = $_POST['user_customer'];
                    $pass_customer = $_POST['pass_customer'];
                    $status_customer = $_POST['status_customer'];
                    $pic = $_FILES['pic']['name'];
                    $target_dir = "../upload/user/";
                    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
                    $user = $_POST['user'];
                    if($id_customer == '' && $name_customer == '' && $phone_customer =='' && $email_customer == '' &&
                    $address_customer =='' && $user_customer =='' && $pass_customer == '' && $status_customer == '' && $user == ''){
                        //Ko được để trống dữ liệu
                    } else {
                        move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
                        update_account($id_customer,$name_customer,$phone_customer,$email_customer,$address_customer,$user_customer,$pass_customer,$pic,$status_customer,$user);
                    }
                }
                $listCustomer = loadall_account();
                include '../../fashinista/admin/account/list.php';
                break;
            case 'updateProduct':
                if(isset($_POST['updateProduct'])){
                    $id_product = $_POST['id_product'];
                    $name_product = $_POST['name_product'];
                    $id_category = $_POST['id_category'];
                    $des_product = $_POST['des_product'];
                    $date_product = date('d/m/Y');
                    $price_product = $_POST['price_product'];
                    $pic1 = $_FILES['pic1']['name'];
                    $pic2 = $_FILES['pic2']['name'];
                    $pic3 = $_FILES['pic3']['name'];
                    $pic4 = $_FILES['pic4']['name'];
                    $target_dir = "../upload/product/";
                    $target_file1 = $target_dir . basename($_FILES["pic1"]["name"]);
                    $target_file2 = $target_dir . basename($_FILES["pic2"]["name"]);
                    $target_file3 = $target_dir . basename($_FILES["pic3"]["name"]);
                    $target_file4 = $target_dir . basename($_FILES["pic4"]["name"]);

                    if($name_product == '' && $id_category == '' && $des_product == '' && $price_product==''
                    && $pic1=='' && $pic2=='' && $pic3=='' &&$pic4==''){
                        echo "<script>alert('Không Để Trống dữ liệu !');</script>";
                    } else {
                        move_uploaded_file($_FILES["pic1"]["tmp_name"], $target_file1);
                        move_uploaded_file($_FILES["pic2"]["tmp_name"], $target_file2);
                        move_uploaded_file($_FILES["pic3"]["tmp_name"], $target_file3);
                        move_uploaded_file($_FILES["pic4"]["tmp_name"], $target_file4);
                        update_product($id_product,$name_product,$id_category,  $pic1, $pic2, $pic3, $pic4, $des_product,$price_product);
                        $thongbao = "Cập nhật thành công";
                    }
                }
                $listCategory = loadall_category();
                $listProduct = loadall_product();
                include 'product/list.php';
                break;

            case 'loadProductDetail':
                if(isset($_GET['id_pd'])){
                    $productDetail = loadOneProductDetail($_GET['id_pd']);
                }
                $listProduct = loadall_product();
                include 'product/update_detail.php';
                break;

            case 'updateProductDetail':
                if(isset($_POST['updateProductDetail'])){
                    $id_pd = $_POST['id_pd'];
                    $id_product = $_POST['id_product'];
                    $color_product = $_POST['color_product'];
                    $size_product = $_POST['size_product'];
                    $quantity_product = $_POST['quantity_product'];
                    if($id_pd == '' && $id_product == '' && $color_product == '' && $size_product == '' && $quantity_product == ''){
                        echo "<script>alert('Không Để Trống dữ liệu !');</script>";
                    } else{
                        update_product_detail($id_pd,$id_product,$color_product,$size_product,$quantity_product);
                        echo "<script>alert('Sửa thành công !');</script>";

                    }
                }
                $listProduct = loadall_product();
                include 'product/list.php';
                break;

            case 'deleteProductDetail':
                if(isset($_GET['id_pd'])){
                    delete_product_detail($_GET['id_pd']);
                }
                $listProduct = loadall_product();
                include 'product/list.php';
                break;
            case 'listCustomer':
                $listCustomer = loadall_account();
                include 'account/list.php';
                break;

            case 'deleteCustomer':
                if(isset($_GET['id_customer'])){
                    delete_account($_GET['id_customer']);
                }
                $listCustomer =loadall_account();
                include 'account/list.php';
                break;

            case 'listComment':
                $listComment = loadall_comment(0);
                include 'comment/list.php';
                break;

            case 'deleteComment':
                if(isset($_GET['id_comment'])){
                    delete_comment($_GET['id_comment']);
                }
                $listComment = loadall_comment(0);
                include 'comment/list.php';
                break;
            case 'Oder':
                if($_GET['id_oder']){
                    Oder($_GET['id_oder']);
                }
                $listOder = loadall_oder();
                include '../admin/oder/listOder.php';
                break;

            case 'Payment':
                if(isset($_GET['id_oder'])){
                    Payment($_GET['id_oder']);
                }
                $listOder = loadall_oder();
                include '../admin/oder/listOder.php';
                break;

            case 'logout':
                unset($_SESSION['user']);
                include '../index.php';
                break;

            default:
                include 'home.php';
                break;

    }
} else {
    include "home.php";
}
include 'footer.php';