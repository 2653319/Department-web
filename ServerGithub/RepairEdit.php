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
    echo '<form action="RepairEditCheck.php" method="POST">';
///id
    echo '<label for="floatingInputValue">ID</label>';
    echo '<input class="form-control form-control-lg" name="id" type="text" placeholder="" value="'.$row[0].'" aria-label=".form-control-lg example" hidden >';
    echo '<input class="form-control form-control-lg form-floating" type="text" placeholder="" value="'.$row[0].'" aria-label=".form-control-lg example" disabled>';

///name
    echo '<label for="floatingInputValue">名稱</label>';
    echo '<input class="form-control form-control-lg" name="user" type="text" placeholder="" value="'.$row[1].'" aria-label=".form-control-lg example" hidden >';
    echo '<input class="form-control form-control-lg" name="user" type="text" placeholder="" value="'.$row[1].'" aria-label=".form-control-lg example" disabled>';

///email
    echo '<label for="floatingInputValue">單位</label>';
    ?>  
    <select class="form-control form-control-lg" name="depart">
        <?php if($row[2] == "資訊電機學院"){ ?> <option value="資訊電機學院" selected>資訊電機學院</option>
        <?php }else{ ?> <option value="資訊電機學院">資訊電機學院</option> <?php } ?>
        <?php if($row[2] == "資訊工程學系"){ ?> <option value="資訊工程學系" selected>資訊工程學系</option>
        <?php }else{ ?> <option value="資訊工程學系">資訊工程學系</option> <?php } ?>
        <?php if($row[2] == "生物科技與醫學工程學系"){ ?> <option value="生物科技與醫學工程學系" selected>生物科技與醫學工程學系</option>
        <?php }else{ ?> <option value="生物科技與醫學工程學系">生物科技與醫學工程學系</option> <?php } ?>
        <?php if($row[2] == "光電與通訊學系"){ ?> <option value="光電與通訊學系" selected>光電與通訊學系</option>
        <?php }else{ ?> <option value="光電與通訊學系">光電與通訊學系</option> <?php } ?>
    </select>
    <?php
///phone

    echo '<label for="floatingInputValue">聯絡電話</label>';
    echo '<input class="form-control form-control-lg" name="phone"  type="text" placeholder="" value="'.$row[3].'" aria-label=".form-control-lg example">';

///role

    echo '<label for="floatingInputValue">Email</label>';
    echo '<input class="form-control form-control-lg" name="email" type="text" placeholder="" value="'.$row[4].'" aria-label=".form-control-lg example" hidden >';
    echo '<input class="form-control form-control-lg" name="email" type="text" placeholder="" value="'.$row[4].'" aria-label=".form-control-lg example" disabled>';
    
    
///stat
    echo '<label for="floatingInputValue">教室編號</label>';
    echo '<input class="form-control form-control-lg" name="locat" type="text" placeholder="" value="'.$row[5].'" aria-label=".form-control-lg example" >';
    
    
///create date

    echo '<label for="floatingInputValue">電腦編號</label>';
    echo '<input class="form-control form-control-lg" name="comNum" type="text" placeholder="" value="'.$row[6].'" aria-label=".form-control-lg example" >';

///delete date

    echo '<label for="floatingInputValue">設備名稱</label>';
    echo '<input class="form-control form-control-lg" name="proName" type="text" placeholder="" value="'.$row[7].'" aria-label=".form-control-lg example" >';

    echo '<label for="floatingInputValue">財產編號</label>';
    echo '<input class="form-control form-control-lg" name="proNum" type="text" placeholder="" value="'.$row[8].'" aria-label=".form-control-lg example" >';


    echo '<label for="floatingInputValue">軟/硬體</label>';
    ?>  
    <select class="form-control form-control-lg" name="proKind">
        <?php if($row[9] == "硬體"){ ?> <option value="硬體" selected>硬體</option>
        <?php }else{ ?> <option value="硬體">硬體</option> <?php } ?>
        <?php if($row[9] == "軟體"){ ?> <option value="軟體" selected>軟體</option>
        <?php }else{ ?> <option value="軟體">軟體</option> <?php } ?>
    </select>
    <?php

    echo '<label for="floatingInputValue">問題</label>';
    echo '<input class="form-control form-control-lg" name="problem" type="text" placeholder="" value="'.$row[10].'" aria-label=".form-control-lg example" >';
    

    echo '<label for="floatingInputValue">其他狀況</label>';
    echo '<input class="form-control form-control-lg" name="problemText" type="text" placeholder="" value="'.$row[11].'" aria-label=".form-control-lg example" >';
    

    echo '<label for="floatingInputValue">詳細</label>';
    echo '<input class="form-control form-control-lg" name="problemDetail" type="text" placeholder="" value="'.$row[12].'" aria-label=".form-control-lg example" >';


    echo '</br>';


    echo '<label for="floatingInputValue">進度</label>';
    ?>  
    <select class="form-control form-control-lg" name="sch">
        <?php if($row[15] == 0){ ?> <option value="0" selected>拒絕申請</option>
        <?php }else{ ?> <option value="0">拒絕申請</option> <?php } ?>
        <?php if($row[15] == 1){ ?> <option value="1" selected>收到表單</option>
        <?php }else{ ?> <option value="1">收到表單</option> <?php } ?>
        <?php if($row[15] == 2){ ?> <option value="2" selected>申請審核中</option>
        <?php }else{ ?> <option value="2">申請審核中</option> <?php } ?>
        <?php if($row[15] == 3){ ?> <option value="3" selected>申請成功</option>
        <?php }else{ ?> <option value="3">申請成功</option> <?php } ?>
        <?php if($row[15] == 4){ ?> <option value="4" selected>處理中</option>
        <?php }else{ ?> <option value="4">處理中</option> <?php } ?>
        <?php if($row[15] == 5){ ?> <option value="5" selected>完成</option>
        <?php }else{ ?> <option value="5">完成</option> <?php } ?>
    </select>
    <?php


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
    echo '</br>';
    echo '</br>';
    if($refuse == true){
        echo '<label for="floatingInputValue">拒絕原因</label>';
        echo '<input class="form-control form-control-lg" name="refuse" type="text" value="'.$row[16].'" aria-label=".form-control-lg example" >';
        echo '</br>';
    }

    echo '<button class="btn btn-outline-success" type="submit">修改</button>';
    echo '</form>';
    echo '</br>';
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
