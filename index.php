<?php
ob_start();
session_start();
include "dao/pdo.php";
include "dao/account.php";
include "dao/category.php";
include "dao/comment.php";
include "dao/product.php";
include "dao/oder.php";
include "./site/header.php";
$listProduct = loadall_product();
if(!isset($_SESSION['myCart'])) $_SESSION['myCart']=[];
if(isset($_GET['act']) && ($_GET['act']) != ""){
    $act = $_GET['act'];
    switch ($act){
        case 'signin':
            if(isset($_POST['signin'])){
                $user_customer = $_POST['user_customer'];
                $pass_customer = $_POST['pass_customer'];
                $check_account = check_account($user_customer,$pass_customer);
                if(is_array($check_account)){
                    $_SESSION['user'] = $check_account;
                        header('location:../../../fashinista/index.php');
                } else {
                    $thongbao = "Tài khoản không tồn tại hoặc đã bị khóa!";
                }
            }
            include '../fashinista/site/account/sign-in.php';
            break;

        case 'product':
            if(isset($_GET['id_category'])){
                $listProduct = productCategory($_GET['id_category']);
            } else if(isset($_POST['nameProduct'])){
                $listProduct = productName($_POST['nameProduct']);
            } else{
                $listProduct = loadall_product();
            }
            include './site/product.php';
            break;

        case 'productDetail':
            if(isset($_GET['id_product'])){
                $id_product = $_GET['id_product'];
                $product = loadone_product($id_product);
                $product_detail = loadone_product_detail($id_product);
                extract($product);
                $category = $id_category;
                $load_product_category = load_products_category($id_product,$category);
                view($_GET['id_product']);
            }
            include 'site/product_detail.php';
            break;

        case 'signup':
            if(isset($_POST['signup'])){
                $name_customer = $_POST['name_customer'];
                $phone_customer = $_POST['phone_customer'];
                $email_customer = $_POST['email_customer'];
                $address_customer = $_POST['address_customer'];
                $birthday_customer = $_POST['birthday_customer'];
                $user_customer = $_POST['user_customer'];
                $pass_customer = $_POST['pass_customer'];
                $filename=$_FILES['pic']['name'];
                $target_dir = "../fashinista/upload/user/";
                $target_file = $target_dir . basename($_FILES["pic"]["name"]);
                if($name_customer == '' && $phone_customer == '' && $email_customer ==''
                && $address_customer == '' && $user_customer == '' && $pass_customer =='' && $filename == ''){
                    $thongbao = "Vui lòng điền đầy đủ thông tin";
                } else{
                    move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
                    insert_custom($name_customer,$phone_customer,$email_customer,$address_customer,$birthday_customer,$user_customer,$pass_customer,$filename);
                    $thongbao = "Đăng ký thành công";
                }
            }
            include '../fashinista/site/account/sign-up.php';
            break;

        case 'cart':
            if(!isset($_SESSION['user'])){
                include '../fashinista/site/account/sign-in.php';
            } else if(isset($_POST['addtoCart'])){
                $id_product = $_POST['id_product'];
                $pic1 = $_POST['pic1'];
                $name_product = $_POST['name_product'];
                $color_product = $_POST['color_product'];
                $size_product = $_POST['size_product'];
                $price_product = $_POST['price_product'];
                $quantity = $_POST['quantity'];
                $infoCart = [$id_product,$pic1,$name_product,$color_product,
                            $size_product,$price_product,$quantity];
                array_push($_SESSION['myCart'],$infoCart);
            }
            include '../fashinista/site/cart.php';
            break;

        case 'sendComment':
            if(!isset($_SESSION['user'])){
                include '../fashinista/site/account/sign-in.php';
            } else if(isset($_POST['sendComment'])){
                $id_customer = $_POST['id_customer'];
                $id_product = $_POST['id_product'];
                $content_comment = $_POST['content_comment'];
                $date_comment = date('Y-m-d');
                insert_comment($id_customer,$id_product,$content_comment,$date_comment);
                $link = "../../fashinista/index.php?act=productDetail&id_product=".$id_product;
                header("location: " . $link);
            }
            break;
        case 'addOder':
            if(isset($_POST['oder'])){
                $id_customer = $_POST['id_customer'];
                $unitPrice = $_POST['unitPrice'];

                $date_oder = date('Y-m-d');
                $name_customer = $_POST['name_customer'];
                $phone_customer = $_POST['phone_customer'];
                $address_customer = $_POST['address_customer'];
                if(!isset($_SESSION['user']) ){
                    header('location:../../fashinista/index.php?act=signin');
                } else{
                    if(!isset($_POST['method_payment'])){
                        insert_oders($id_customer,$date_oder,$unitPrice,$name_customer,$phone_customer,$address_customer);
                    } else{
                        $method_payment = $_POST['method_payment'];
                        insert_oder($id_customer,$date_oder,$unitPrice,$method_payment,$name_customer,$phone_customer,$address_customer);
                    }
                    $id_oder = loadone_oder($address_customer,$name_customer,$phone_customer,$date_oder);
                    extract($id_oder);
                    $_SESSION['id_oder'] = $id_oder;
                    foreach ($_SESSION['myCart'] as $cart) {
                        $id_product = $cart[0];
                        $name_product = $cart[2];
                        $color_product = $cart[3];
                        $size_product = $cart[4];
                        $price_product = $cart[5];
                        $quantity = $cart[6];
                        insert_oder_detail($id_oder,$color_product,$size_product,$quantity,$price_product,$id_product);
                    }
                }
                if($method_payment == false){
                    $listOderCustomer = loadall_oder_customer($_SESSION['user']['id_customer']);
                    include 'site/oder/oders.php';
                } else{
                    header('location:../../fashinista/index.php?act=QRcode');
                }
            }
            break;
        case 'deleteCart':
            $search_value = $_GET['id_product'];
            $array_keymap = array_recursive_search_key_map($search_value,$_SESSION['myCart']);
            $key = $array_keymap[0];
            unset($_SESSION['myCart'][$key]);
            $listOderCustomer = loadall_oder_customer($_GET['id_customer']);
            include '../fashinista/site/cart.php';
            break;

        case 'oders':
            $listOderCustomer = loadall_oder_customer($_GET['id_customer']);
            include 'site/oder/oders.php';
            break;
        case 'QRcode':
            include 'site/QRcode.php';
            break;

        case 'logout':
            unset($_SESSION['user']);
            header('location:index.php');
            break;
        case 'listOderDetail':
            if(isset($_GET['id_oder'])){
                $listOderDetail = loadall_oder_detail($_GET['id_oder']);
            }
            include "site/oder/oderDetail.php";
            break;
        case 'deleteOderDetail':
            if(isset($_GET['id_oderDetail'])){
                deleteOderDetail($_GET['id_oderDetail']);
            }
            $listOderDetail = loadall_oder_detail($_GET['id_oder']);
            include 'site/oder/oderDetail.php';
            break;

        case 'deleteOder':
            if(isset($_GET['id_oder'])){
                delete_oder_detail($_GET['id_oder']);
                deleteOder($_GET['id_oder']);
            }
            $listOderCustomer = loadall_oder_customer($_GET['id_customer']);
            include 'site/oder/oders.php';
            break;
        default:
            include 'site/cart.php';
            break;
    }

}else {
    include 'site/home.php';
}
include 'site/footer.php';
ob_start();
?>