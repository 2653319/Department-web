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
            navLogOut(0));
        }
    ?>

    <?php
while($row = pg_fetch_row($result)){
///id
    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[0].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">ID</label>';
    echo '</form>';
///name
    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[1].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">名稱</label>';
    echo '</form>';
///email
    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[3].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">Email</label>';
    echo '</form>';
///phone
    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[4].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">聯絡電話</label>';
    echo '</form>';
///role
    echo '<form class="form-floating">';
    switch ($row[6]){
        case 0:
            $role = '管理員';
            break;
        case 1:
            $role = '院長';
            break;
        case 2:
            $role = '系助';
            break;
        case 3:
            $role = '學生';
            break;
    }
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$role.'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">身分</label>';
    echo '</form>';
///stat
    echo '<form class="form-floating">';
    switch ($row[7]){
        case 0:
            $stat = '未開啟';
            break;
        case 1:
            $stat = '已開啟';
            break;
        case 2:
            $stat = '已刪除';
            break;
    }
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$stat.'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">狀態</label>';
    echo '</form>';
///create date
    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[5].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">Create-Date</label>';
    echo '</form>';
///delete date
    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[9].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">Delete-Date</label>';
    echo '</form>';
    echo '</br>';
    echo '<input class="btn btn-outline-success" type ="button" onclick="history.back()" value="回到上一頁"></input>';
}

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

