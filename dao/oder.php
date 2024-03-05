<?php
function insert_oder($id_customer,$date_oder,$unitPrice,$method_payment,$name_customer,$phone_customer,$address_customer){
    $sql = "insert into oders(id_customer,date_oder,unitPrice,method_payment,name_customer,phone_customer,address_customer)
            values('$id_customer','$date_oder','$unitPrice','$method_payment','$name_customer','$phone_customer','$address_customer')";
    pdo_execute($sql);
}

function insert_oders($id_customer,$date_oder,$unitPrice,$name_customer,$phone_customer,$address_customer){
    $sql = "insert into oders(id_customer,date_oder,unitPrice,name_customer,phone_customer,address_customer)
            values('$id_customer','$date_oder','$unitPrice','$name_customer','$phone_customer','$address_customer')";
    pdo_execute($sql);
}

function insert_oder_detail($id_oder,$color_product,$size_product,$quantity,$price_product,$id_product){
    $sql = "insert into oder_detail(id_oder,color_product,size_product,quantity,price_product,id_product)
            values('$id_oder','$color_product','$size_product','$quantity','$price_product','$id_product')";
    pdo_execute($sql);
}

function loadone_oder($address_customer,$name_customer,$phone_customer,$date_oder){
    $sql = "select * from oders where address_customer = '".$address_customer."'
            and name_customer = '".$name_customer."' 
            and phone_customer = '".$phone_customer."' 
            and date_oder = '".$date_oder."'
            order by id_oder desc";
    $id_oder = pdo_query_one($sql);
    return $id_oder;
}

function loadall_oder(){
    $sql = "select * from oders";
    $listOder = pdo_query($sql);
    return $listOder;
}

function loadall_oder_detail($id_oder){
    $sql = "select id_oder,id_oderDetail,products.name_product, products.id_product, products.pic1,color_product,size_product,quantity,products.price_product from oder_detail
            INNER JOIN products ON products.id_product = oder_detail.id_product  where id_oder =".$id_oder;
    $listOderDetail = pdo_query($sql);
    return $listOderDetail;
}
function deleteOderDetail($id_oderDetail){
    $sql = "delete from oder_detail where id_oderDetail =".$id_oderDetail;
    pdo_query($sql);
}

function deleteOder($id_oder){
    $sql = "delete from oders where id_oder =".$id_oder;
    pdo_query($sql);
}

function delete_oder_detail($id_oder){
    $sql = "delete from oder_detail where id_oder =".$id_oder;
    pdo_query($sql);
}
function loadall_oder_customer($id_customer){
    $sql = "select * from oders where `id_customer` =".$id_customer;
    $listOderCustomer = pdo_query($sql);
    return $listOderCustomer;
}

function array_recursive_search_key_map($needle, $haystack) {
    foreach($haystack as $first_level_key=>$value) {
        if ($needle === $value) {
            return array($first_level_key);
        } elseif (is_array($value)) {
            $callback = array_recursive_search_key_map($needle, $value);
            if ($callback) {
                return array_merge(array($first_level_key), $callback);
            }
        }
    }
    return false;
}

function Oder($id_oder){
    $sql = "update oders set status_oder = 1 where id_oder =".$id_oder;
    pdo_query($sql);
}

function Payment($id_oder){
    $sql = "update oders set status_payment = 1 where id_oder =".$id_oder;
    pdo_query($sql);
}