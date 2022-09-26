<?php
    include("style2.php");
    include("db_conn.php");
    session_start();
if(isset($_SESSION['email'])){
    $user = $_POST['userID'];
    $sql = "SELECT * FROM public.user WHERE id = '$user';";
    $result = pg_query($db_handle, $sql);
?>
    <!doctype html>
    <html lang="en">
    <?php
        head();
    ?>
        <body>

    <?php
        if($_SESSION['roleID'] == 3){
            navLogStudent(0);
        }else{
            navLogOut(0);
        }
    ?>

    <?php
    $row = pg_fetch_row($result);

    echo '<form action="userUpdateCheck.php" method="POST" >';
///id
    echo '<label>ID</label>';
    echo '<input class="form-control form-control-lg" name="id" type="text" placeholder="" value="'.$row[0].'" aria-label=".form-control-lg example" hidden >';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[0].'" aria-label=".form-control-lg example" disabled >';
///name
    echo '<label >名稱</label>';
    echo '<input class="input-floating form-control form-control-lg" name="user" type="text" placeholder="" value="'.$row[1].'" aria-label=".form-control-lg example" >';
///email
    echo '<label>Email</label>';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[3].'" aria-label=".form-control-lg example" disabled>';

///phone
    echo '<label>聯絡電話</label>';
    echo '<input class="form-control form-control-lg" name="phone" type="text" placeholder="" value="'.$row[4].'" aria-label=".form-control-lg example" >';
///role

    echo '<label >身分</label>';
    ?>  
        <select class="form-control form-control-lg" name="role">
            <?php if($row[6] == 0){ ?> <option value="0" selected>管理員</option>
            <?php }else{ ?> <option value="0">管理員</option> <?php } ?>
            <?php if($row[6] == 1){ ?> <option value="1" selected>院長</option>
            <?php }else{ ?> <option value="1">院長</option> <?php } ?>
            <?php if($row[6] == 2){ ?> <option value="2" selected>系助</option>
            <?php }else{ ?> <option value="2">系助</option> <?php } ?>
            <?php if($row[6] == 3){ ?> <option value="3" selected>學生</option>
            <?php }else{ ?> <option value="3">學生</option> <?php } ?>
        </select>
    <?php
///stat

    echo '<label>狀態</label>';
    ?>  
        <select class="form-control form-control-lg" name="status">
                <?php if($row[7] == 0){ ?> <option value="0" selected>未啟用</option>
                <?php }else{ ?> <option value="0">未啟用</option> <?php } ?>
                <?php if($row[7] == 1){ ?> <option value="1" selected>已啟用</option>
                <?php }else{ ?> <option value="1">已啟用</option> <?php } ?>
                <?php if($row[7] == 2){ ?> <option value="2" selected>已停用</option>
                <?php }else{ ?> <option value="2">已停用</option> <?php } ?>
         </select>
    <?php
    echo '</br>';
    echo '<button class="btn btn-outline-success" type="submit">修改</button>';
    echo '</form>';
    echo '</br>';
    echo '<input class="btn btn-outline-success" type ="button" onclick="history.back()" value="回到上一頁"></input>';
    ?>



    <?php
        footer();
    ?>

        </body>

    <?php
}else{
    echo '<script>alert("please login")</script>';
    echo "<meta http-equiv='refresh' content='0;url=index.php'/>";  
}
