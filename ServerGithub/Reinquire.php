<?php
    include("style2.php");
    include("db_conn.php");
    session_start();
if(isset($_SESSION['email'])){
    if($_SESSION['roleID'] != 3){
        $sql = "SELECT * FROM public.repairdetial WHERE schedule != '0' AND schedule != '5';";
        $result = pg_query($db_handle, $sql);

        $sql2 = "SELECT * FROM public.repairdetial WHERE schedule = '0';";
        $result2 = pg_query($db_handle, $sql2);

        $sql3 = "SELECT * FROM public.repairdetial WHERE schedule = '5';";
        $result3 = pg_query($db_handle, $sql3);
    }else{
        $ID = $_SESSION['id'];

        $sql = "SELECT * FROM public.repairdetial WHERE schedule != '0' AND schedule != '5' AND applicantname = '$ID';";
        $result = pg_query($db_handle, $sql);

        $sql2 = "SELECT * FROM public.repairdetial WHERE schedule = '0' AND applicantname = '$ID';";
        $result2 = pg_query($db_handle, $sql2);

        $sql3 = "SELECT * FROM public.repairdetial WHERE schedule = '5' AND applicantname = '$ID';";
        $result3 = pg_query($db_handle, $sql3);

    }
?>
    <!doctype html>
    <html lang="en">
    <?php
        head();
    ?>
        <body>

    <?php
        if($_SESSION['roleID'] == 3){
            navLogStudent(4);
        }else{
            navLogOut(4);
        }
    ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">進行中</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">拒絕受理</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">完成</button>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">教室編號</th>
                    <th scope="col">設備名稱</th>
                    <th scope="col">問題</th>
                    <th scope="col">進度條</th>
                    <th scope="col">詳細</th>
                    <th scope="col">修改</th>
                    <th scope="col">完成</th>
                </tr>
            </thead>
        <tbody>
        <?php

        while($row = pg_fetch_row($result)){
            echo "<tr>";
            echo "<td>". $row[0] ."</td>";
            echo "<td>". $row[1] ."</td>";
            echo "<td>". $row[5] ."</td>";
            echo "<td>". $row[7] ."</td>";
            echo "<td>". $row[10] ."</td>";
            switch($row[15]){
                case 0:
                    $sch = '拒絕申請';
                    $schVar = 100;
                    break;
                case 1:
                    $sch = '收到表單';
                    $schVar = 20;
                    break;
                case 2:
                    $sch = '申請審核中';
                    $schVar = 40;
                    break;
                case 3:
                    $sch = '申請成功';
                    $schVar = 60;
                    break;
                case 4:
                    $sch = '處理中';
                    $schVar = 80;
                    break;
                case 5:
                    $sch = '完成';
                    $schVar = 100;
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
            
            echo "
            <td>                
            <form action=RepairDetail.php method=post>
                <input type=hidden name=userID value=$row[0]>
                <button type=submit class='btn btn-outline-primary'>詳細</button>
            </form>
            </td>";
            if($_SESSION['roleID'] != 3){
            echo "
                <td>                
                <form action=RepairEdit.php method=post>
                    <input type=hidden name=userID value=$row[0]>
                    <button type=submit class='btn btn-outline-primary'>修改</button>
                </form>
                </td>";

            echo "<td>";
                ?>
                <form action=RepairFinish.php method=post onsubmit='return confirm("確定完成?")' >
                <?php
                echo "
                    <input type=hidden name=userID value=$row[0] >
                    <button type=submit class='btn btn-outline-dark'>完成</button>
                </form>
                </td>";
            }
            echo "</tr>";

        }
        ?>
        </tbody>
        </table>
  </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">教室編號</th>
                    <th scope="col">設備名稱</th>
                    <th scope="col">問題</th>
                    <th scope="col">進度條</th>
                    <th scope="col">詳細</th>
                    <th scope="col">修改</th>
                    <th scope="col">刪除</th>
                </tr>
            </thead>
        <tbody>
        <?php

        while($row = pg_fetch_row($result2)){
            echo "<tr>";
            echo "<td>". $row[0] ."</td>";
            echo "<td>". $row[1] ."</td>";
            echo "<td>". $row[5] ."</td>";
            echo "<td>". $row[7] ."</td>";
            echo "<td>". $row[10] ."</td>";
            switch($row[15]){
                case 0:
                    $sch = '拒絕申請';
                    $schVar = 100;
                    break;
                case 1:
                    $sch = '收到表單';
                    $schVar = 20;
                    break;
                case 2:
                    $sch = '申請審核中';
                    $schVar = 40;
                    break;
                case 3:
                    $sch = '申請成功';
                    $schVar = 60;
                    break;
                case 4:
                    $sch = '處理中';
                    $schVar = 80;
                    break;
                case 5:
                    $sch = '完成';
                    $schVar = 100;
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
            
            echo "
            <td>                
            <form action=RepairDetail.php method=post>
                <input type=hidden name=userID value=$row[0]>
                <button type=submit class='btn btn-outline-primary'>詳細</button>
            </form>
            </td>";
            if($_SESSION['roleID'] != 3){
            echo "
                <td>                
                <form action=RepairEdit.php method=post>
                    <input type=hidden name=userID value=$row[0]>
                    <button type=submit class='btn btn-outline-primary'>修改</button>
                </form>
                </td>";

            echo "<td>";
                ?>
                <form action=RepairDef.php method=post onsubmit='return confirm("確定刪除?")' >
                <?php
                echo "
                    <input type=hidden name=userID value=$row[0] >
                    <button type=submit class='btn btn-outline-dark'>刪除</button>
                </form>
                </td>";
            }
            echo "</tr>";

        }
        ?>
        </tbody>
        </table>
  </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">教室編號</th>
                    <th scope="col">設備名稱</th>
                    <th scope="col">問題</th>
                    <th scope="col">進度條</th>
                    <th scope="col">詳細</th>
                    <th scope="col">修改</th>
                    <th scope="col">刪除</th>
                </tr>
            </thead>
        <tbody>
        <?php

        while($row = pg_fetch_row($result3)){
            echo "<tr>";
            echo "<td>". $row[0] ."</td>";
            echo "<td>". $row[1] ."</td>";
            echo "<td>". $row[5] ."</td>";
            echo "<td>". $row[7] ."</td>";
            echo "<td>". $row[10] ."</td>";
            switch($row[15]){
                case 0:
                    $sch = '拒絕申請';
                    $schVar = 100;
                    break;
                case 1:
                    $sch = '收到表單';
                    $schVar = 20;
                    break;
                case 2:
                    $sch = '申請審核中';
                    $schVar = 40;
                    break;
                case 3:
                    $sch = '申請成功';
                    $schVar = 60;
                    break;
                case 4:
                    $sch = '處理中';
                    $schVar = 80;
                    break;
                case 5:
                    $sch = '完成';
                    $schVar = 100;
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
            
            echo "
            <td>                
            <form action=RepairDetail.php method=post>
                <input type=hidden name=userID value=$row[0]>
                <button type=submit class='btn btn-outline-primary'>詳細</button>
            </form>
            </td>";
            if($_SESSION['roleID'] != 3){
            echo "
                <td>                
                <form action=RepairEdit.php method=post>
                    <input type=hidden name=userID value=$row[0]>
                    <button type=submit class='btn btn-outline-primary'>修改</button>
                </form>
                </td>";

            echo "<td>";
                ?>
                <form action=RepairDef.php method=post onsubmit='return confirm("確定刪除?")' >
                <?php
                echo "
                    <input type=hidden name=userID value=$row[0] >
                    <button type=submit class='btn btn-outline-dark'>刪除</button>
                </form>
                </td>";
            }
            echo "</tr>";

        }
        ?>
        </tbody>
        </table>
  </div>
  </div>
</div>


<!-- <div style="background-image: linear-gradient(#a6c0fe 0%, #f68084 100%);"> -->

    <?php
        footer();
    ?>

        </body>

    <?php
}else{
    echo "please login";
    echo "<meta http-equiv='refresh' content='1;url=index.php'/>";  
}
