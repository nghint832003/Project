<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link href="/site/css/cart.css" rel="stylesheet"> -->
    <!-- <link href="../site/css/detail.css" rel="stylesheet"> -->
    <!-- <link href="css/index.css" rel="stylesheet"> -->
    <style>
        table,tr,td,th{
    border-collapse: collapse;
    text-align: center;
    padding: 10px;
}

table,tr,th,td{
    border: none;
}

td{
    background-color: white;

}

tr{
    border-bottom: 15px solid rgba(230, 234, 241, 1);
}

table{
    width: 70%;
    margin-left: 30px;
}

#img{
    width: 100px;
    height: 100px;

}

td img{
    width: 100%;

}

td{
    height: 210px;
    font-size: 20px;
}

#tt{
    height: 30px;
}

th{
    background-color: rgba(108, 93, 211, 1);
    color: white;
    border: none;
}
input[type=number]{width: 30px;outline: none;}

.sanpham_left{float: left;width: 55%;margin-bottom: 200px;height: 950px;}
/* .sanpham_left_top{height: 680px;} */
.sanpham_left_top img{width: 100%;height: 898px;}
.sanpham_left_bottom{display: grid;grid-template-columns: repeat(4,1fr);gap: 10px;}
.sanpham_left_bottom img{cursor: pointer;width: 100%;height: 200px;}
.sanpham_left_bottom>img:hover{border: 1px solid gray;}

.sanpham_right{float: right;width: 43%;border: 1px solid rgb(225, 225, 225);height: 1105px;padding: 20px;position: relative;}
.sanpham_right_textstar h2{font-size: 45px;color: #333333;margin-top: 0px;}
.sanpham_right_star{margin-top: -20px;font-size: 20px;color: rgb(231, 61, 61);}
.sanpham_right_price{background-color: #ededed;padding: 3px 20px;margin: 20px -20px 20px -20px;}
.sanpham_right_price h2{color: #ff1900;}
.sanpham_right_main{height: 450px;margin-bottom: 10px;}
.sanpham_right_bottom{background-color: #ededed;height: 400px;position: absolute;bottom: 0;right: 0;left: 0;padding: 20px;}
.sanpham_right_main_text01,.sanpham_right_bottom_color_text{display: flex;align-items: center;margin-bottom: -20px;}
.sanpham_right_bottom_color_button button{border: 1px solid rgb(123, 123, 123);background-color: #FFFFFF;padding: 10px 15px; color: #333333;font-size: 15px;border-radius: 5px;transition: 0.4s;margin-top: 15px;}
.sanpham_right_main_text01 h2,.sanpham_right_bottom_color_text h2{color:#333333;width: 40%;}
.sanpham_right_main_text01 p,.sanpham_right_bottom_color_text p{color:#6d6767;font-size: 20px;;width: 80%;}
.sanpham_right_bottom_dathang_dathang_nek{background-color: red;text-align: center;width: 100%;height: 70px;line-height: 5px;color: #e0dede;font-variant: small-caps;font-family: times new roman;transition: 0.9s;}
.sanpham_right_bottom_dathang_dathang_nek:hover{background-color: #f03723;color: #FFFFFF;}
.sanpham_right_bottom_dathang_dathang_nek h2{padding-top: 20px;}
.sanpham_right_bottom_dathang_dathang_nekk{width: 100%;height: 50%;border: 1px solid rgb(93, 93, 93);line-height: 20px;text-align: center;margin-top: 15px;color: #555555;}
/*  */
.cothethick{clear: both;}
.text1{border-bottom: 5px solid red;width: 262px;padding-bottom: 5px;}
/*  */
.spnew{display: grid;grid-template-columns: repeat(5,1fr);gap: 20px;}
.sp01{text-align: center;border-bottom: 2px solid red;border-radius: 10px;padding-bottom: 10px;}
.imgnek{overflow: hidden;height: 305px;}
.sp01 img{width: 100%;transition: 0.4s;}
.sp01 img:hover{transform:scale(1.5);}
.sp01>h3{color: red;margin: -10px 0 10px 0;}
a{text-decoration: none;}
.sp01 h2{text-align: center;color: black;}
.sp01>button{cursor: pointer;border-radius: 20px;padding:7px 15px;border: none;color: #FFFFFF;background-color: #2281ed;}
.binhluan{margin-top: 20px;margin-bottom: 700px;}
.conment{background-color: rgb(228, 221, 221);}
.conment_header{display: flex;gap: 10px;margin: 20px;padding: 10px;}
.avatar>img{width: 50px;height: 50px;border-radius: 100px;}
.name h2{font-size: 17px;margin-top: 9px;}
.name h6{font-size: 10px;margin-top: -12px;}
.name{border-bottom: 1px dashed black;width: 100%;}
.comment_bottom{margin-left: 90px;margin-top: -10px;padding-bottom: 20px;}
.box{height: 350px;overflow: hidden scroll;}
.vietbl{margin-top: 50px;}
.vietbl textarea{padding: 20px;outline: none;}
.vietbl button{margin-top: 15px;background-color: rgb(10, 179, 33);color: #FFFFFF;font-size: 15px;padding: 7px;border: none;cursor: pointer;}

.block:hover .hidden {
    display: block;
}
    </style>
</head>

<body>
    <header class=" bg-gray-900">
        <div class="max-w-7xl mx-auto flex justify-between py-4">
            <div class="1 flex">
                <div class="logo ">
                    <a href="index.php"><img src="./upload/logo.jpg" width="150px" style="margin-top: 16.5px" alt=""></a>
                </div>
                <div class="menu">
                    <ul class="flex py-3 px-10">
                <?php
                    $list_category = loadall_category();
                    foreach ($list_category as $list){
                        extract($list);
                        echo '<li><a href="index.php?act=product&id_category='.$id_category.'" class="px-3 text-gray-400 hover:text-white">'.$name_category.'</a></li>';
                    }
                ?>
                    </ul>
                </div>
            </div>
            <div class="2 flex py-2">
                <div class="px-4">
                    <form action="index.php?act=product" method="post" class="bg-white rounded-3xl  bg-gray-600">
                        <button type="submit" class="fa fa-search px-3"></button>
                        <input type="text" name="nameProduct" placeholder="Bạn tìm gì..."
                            class="py-2 pr-4 rounded-3xl bg-gray-600 focus:outline-none text-white">
                    </form>
                </div>
                <div class="py-2 pl-5 flex">
                    <?php
                        if(!isset($_SESSION['user'])){
                    ?>
                    <a href="index.php?act=signup" class="px-2"><i class="fa fa-user-plus" aria-hidden="true" style="color: rgb(233, 233, 233);font-size:21px;"></i></a>
                    <a href="index.php?act=signin" class="px-2"><i class="fa fa-users" aria-hidden="true" style="color: rgb(233, 233, 233);font-size:21px;"></i></a>
                    <?php
                        }else if(isset($_SESSION['user']) && $_SESSION['user']['user'] == 1){
                    ?>
                            <a href="../../fashinista/admin/index.php" class="px-2"><i class="fa fa-cogs" aria-hidden="true" style="color: rgb(233, 233, 233);font-size:21px;"></i></a>
                            <a href="index.php?act=logout" class="px-2"><i class="fa fa-sign-out" aria-hidden="true" style="color: rgb(233, 233, 233);font-size:25px;"></i></a>
                    <?php
                        }else{
                    ?>
                            <a href="index.php?act=oders&id_customer=<?php echo $_SESSION['user']['id_customer']?>" class="px-2"><i class="fa fa-cc-visa" aria-hidden="true" style="color: rgb(233, 233, 233);font-size:21px;"></i></a>
                    <a href="index.php?act=cart" class="px-2"><i class="fa fa-cart-plus" aria-hidden="true" style="color: rgb(233, 233, 233);font-size:25px;"></i></a>
                    <a href="index.php?act=logout" class="px-2"><i class="fa fa-sign-out" aria-hidden="true" style="color: rgb(233, 233, 233);font-size:25px;"></i></a>
                    <?php
                        }
                    ?>

                </div>
            </div>
        </div>
    </header>
