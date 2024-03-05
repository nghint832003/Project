<?php
function insert_comment($id_customer, $id_product, $content_comment, $date_comment)
{
    $sql = "insert into comments(id_customer, id_product, content_comment, date_comment) values('$id_customer','$id_product','$content_comment','$date_comment')";
    pdo_execute($sql);
}

function loadall_comment($id_product)
{
    $sql = "select customers.pic,customers.id_customer,id_product,content_comment,date_comment,customers.name_customer from comments 
            INNER JOIN customers ON customers.id_customer = comments.id_customer where 1";
    if ($id_product > 0) $sql .= " AND id_product='" . $id_product . "'";
    $sql .= " order by id_comment desc";
    $listcomment = pdo_query($sql);
    return $listcomment;
}

function list_comment(){
    $sql = "select id_customer,products.name_product, id_comment, content_comment, date_comment from comments
            INNER JOIN products ON products.id_product = comments.id_product";
    $list_comment = pdo_query($sql);
    return $list_comment;
}

function delete_comment($id_comment)
{
    $sql = "delete from comments where id_comment=" . $id_comment;
    pdo_query($sql);
}

function count_comment($id_product){
    $sql = "select count(id_comment) from comments where id_product=".$id_product;
    $count_comment = pdo_query($sql);
    return $count_comment;
}
?>