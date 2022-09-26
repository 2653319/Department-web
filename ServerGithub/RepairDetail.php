<?php
    include("style2.php");
    include("db_conn.php");
    session_start();
if(isset($_SESSION['email'])){
    $user = $_POST['userID'];
    $sql = "SELECT * FROM public.repairdetial WHERE id = '$user' ;";

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
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[2].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">單位</label>';
    echo '</form>';
///phone
    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[3].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">聯絡電話</label>';
    echo '</form>';
///role
    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[4].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">Email</label>';
    echo '</form>';
///stat
    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[5].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">教室編號</label>';
    echo '</form>';
///create date
    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[6].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">電腦編號</label>';
    echo '</form>';
///delete date
    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[7].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">設備名稱</label>';
    echo '</form>';

    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[8].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">財產編號</label>';
    echo '</form>';

    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[9].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">軟/硬體</label>';
    echo '</form>';

    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[10].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">問題</label>';
    echo '</form>';

    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[11].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">其他狀況</label>';
    echo '</form>';

    echo '<form class="form-floating">';
    echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[12].'" aria-label=".form-control-lg example" disabled>';
    echo '<label for="floatingInputValue">詳細</label>';
    echo '</form>';
    echo '</br>';
    switch($row[15]){
        case 0:
            $sch = '拒絕申請';
            $schVar = 100;
            $refuse = true;
            break;
        case 1:
            $sch = '收到表單';
            $schVar = 20;
            $refuse = false;
            break;
        case 2:
            $sch = '申請審核中';
            $schVar = 40;
            $refuse = false;
            break;
        case 3:
            $sch = '申請成功';
            $schVar = 60;
            $refuse = false;
            break;
        case 4:
            $sch = '處理中';
            $schVar = 80;
            $refuse = false;
            break;
        case 5:
            $sch = '完成';
            $schVar = 100;
            $refuse = false;
            break;
    }
    if($row[15] == 0){
    ?>
    <td>                
    <div class="progress">
        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $schVar; ?>%" aria-valuenow="<?php echo $schVar; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $schVar; ?>%</div>
    </div>
    <label><?php echo $sch; ?></label>
    </td>
    <?php
    }else{
        ?>
        <td>                
        <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $schVar; ?>%" aria-valuenow="<?php echo $schVar; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $schVar; ?>%</div>
        </div>
        <label><?php echo $sch; ?></label>
        </td>
        <?php
    }

        echo '</br>';
    if($refuse == true){
        echo '<form class="form-floating">';
        echo '<input class="form-control form-control-lg" type="text" placeholder="" value="'.$row[16].'" aria-label=".form-control-lg example " disabled >';
        echo '<label for="floatingInputValue">拒絕原因</label>';
        echo '</form>';
        echo '</br>';
    }

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
