<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Dashboard admin</title>

    <!-- Custom fonts for this template-->
    <link href="../../fashinista/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../fashinista/admin/css/adminStyle.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.js"
            integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
            crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="page-top">


<div id="wrapper">


    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">

            </div>
            <div class="sidebar-brand-text mx-3">Admin</div>
        </a>


        <hr class="sidebar-divider my-0">


<!--        <li class="nav-item active">-->
<!--            <a class="nav-link" href="index.html">-->
<!--                <i class="fas fa-fw fa-tachometer-alt"></i>-->
<!--                <span>Dashboard</span></a>-->
<!--        </li>-->


        <hr class="sidebar-divider">


        <div class="sidebar-heading">

            <div class="sidebar-heading">
                Khách hàng
            </div>
        </div>


        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Quản lí khách hàng</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tài khoản </h6>
                    <a class="collapse-item" href="../../fashinista/admin/index.php?act=listCustomer">Quản lí tài khoản</a>
                    <h6 class="collapse-header">Hóa đơn </h6>
                    <a class="collapse-item" href="../../fashinista/admin/index.php?act=listOder">Quản lí hóa đơn</a>
                </div>
            </div>
        </li>



        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Quản lí bình luận</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
<!--                    <h6 class="collapse-header">chỉnh sửa: </h6>-->
                    <a class="collapse-item" href="../admin/index.php?act=listComment">Danh sách bình luận</a>
                </div>
            </div>
        </li>


        <hr class="sidebar-divider">


        <div class="sidebar-heading">
            Sản phẩm
        </div>


        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Quản lí sản phẩm</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Loại sản phẩm</h6>
                    <a class="collapse-item" href="../admin/index.php?act=addCategory">Thêm loại</a>
                    <a class="collapse-item" href="../admin/index.php?act=listCategory">Danh sách loại</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Sản phẩm</h6>
                    <a class="collapse-item" href="../admin/index.php?act=addProduct">Thêm sản phẩm</a>
                    <a class="collapse-item" href="../admin/index.php?act=addDetailProduct">Thêm chi tiết sản phẩm</a>
                    <a class="collapse-item" href="../admin/index.php?act=listProduct">Danh sách sản phẩm</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider d-none d-md-block">


        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>



    </ul>

    <div id="content-wrapper" class="d-flex flex-column">


        <div id="content">


            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>


                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
                              echo $_SESSION['user']['name_customer']?></span>
                            <img class="img-profile rounded-circle"
                                 src="../../fashinista/upload/user/<?php echo $_SESSION['user']['pic']?>">
                        </a>


                    </li>
                    <a style="margin-top: 23px" href="../../fashinista/admin/index.php?act=logout">Logout</a>
                </ul>
            </nav>