<p style="text-align:center;color:green;font-size:24px">Danh sách bình luận</p>
<form  class="" action="">
    <table class="table table-bordered">
        <table class="table table-bordered">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Mã bình luận</th>
                    <th scope="col"> Mã người dùng</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Nội dung bình luận</th>
                    <th scope="col">Ngày bình luận</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($list_comment as $comment){
                    extract($comment);
//                    $updateCategory="index.php?act=loadCategory&id_category=".$id_category;
                    $deleteComment="index.php?act=deleteComment&id_comment=".$id_comment;
                    echo '<tr>
                                <th scope="col">'.$id_comment.'</th>
                                <th scope="col">'.$id_customer.'</th>
                                <th scope="col">'.$name_product.'</th>
                                <th scope="col">'.$content_comment.'</th>
                                <th scope="col">'.$date_comment.'</th>                                                          
                                <td><a href="'.$deleteComment.'"><input type="button" value="Xóa"></a></td>
                              </tr>';
                }
                ?>
                </tbody>
            </table>
        </table>
</form>
</div>