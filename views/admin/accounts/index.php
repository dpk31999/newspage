<a href="account/add" class="btn btn-default">
    <span class="glyphicon glyphicon-plus"></span> Thêm
</a> 
<a href="" class="btn btn-default">
    <span class="glyphicon glyphicon-repeat"></span> Reload
</a>
<a class="btn btn-warning" id="lock_acc_list">
    <span class="glyphicon glyphicon-lock"></span> Khoá
</a>
<a class="btn btn-success" id="unlock_acc_list">
    <span class="glyphicon glyphicon-lock"></span> Mở khoá
</a>
<a class="btn btn-danger" id="del_acc_list">
    <span class="glyphicon glyphicon-trash"></span> Xoá
</a> 
<br><br>
<div class="table-responsive">
    <table class="table table-striped list" id ="list_acc">
        <tr>
            <td><input type = "checkbox"></td>
            <td><strong>ID</strong></td>
            <td><strong>Tên đăng nhập</strong></td>
            <td><strong>Trạng thái</strong></td>
            <td><strong>Tools</strong></td>
        </tr>
        <?php
            foreach($accounts as $account)
            {
                echo '
                <tr>
                    <td><input type ="checkbox" name ="id_acc[]" value="'.$account->id.'"></td>
                    <td>'.$account->id.'</td>
                    <td>'.$account->username.'</td>';
                    if($account->status == 1)
                    {
                        echo '<td><label class="label label-warning">Khóa</label></td>';
                    }
                    else{
                        echo '<td><label class="label label-success">Hoạt động</label></td>';
                    }
                    echo '
                    <td>
                        <a data-id="'.$account->id.'" class="btn btn-sm btn-warning lock-acc-list">
                            <span class="glyphicon glyphicon-lock"></span>
                        </a>
                        <a data-id="'.$account->id.'" class="btn btn-sm btn-success unlock-acc-list">
                            <span class="glyphicon glyphicon-lock"></span>
                        </a>
                        <a data-id="'.$account->id.'" class="btn btn-sm btn-danger del-acc-list">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
                ';
            }
        ?>
    </table>
</div>