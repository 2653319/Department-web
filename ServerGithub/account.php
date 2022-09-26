<?php
    include("style2.php");
    include("db_conn.php");
    session_start();
if(isset($_SESSION['email'])){
    $sql = "SELECT * FROM public.user WHERE status = 1 ;";
    $result = pg_query($db_handle, $sql);

    $sql2 = "SELECT * FROM public.user WHERE status = 2 ;";
    $result2 = pg_query($db_handle, $sql2);

    $sql3 = "SELECT * FROM public.user WHERE status = 0 ;";
    $result3 = pg_query($db_handle, $sql3);
?>
    <!doctype html>
    <html lang="en">
    <?php
        head();
    ?>
        <body>

    <?php
        if($_SESSION['roleID'] == 3){
            navLogStudent(3);
        }else{
            navLogOut(3);
        }
    ?>
<!-- <div style="background-image: linear-gradient(#a6c0fe 0%, #f68084 100%);"> -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">未啟用</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">啟用</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">停用</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">未啟用</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">角色</th>
                    <th scope="col">狀態</th>
                    <th scope="col">其他</th>
                    <th scope="col">其他</th>
                </tr>
            </thead>
        <tbody>
        <?php
        $i = 1;
        while($row3 = pg_fetch_row($result3)){
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>
                <form action=userDetail.php method=post>
                    <input type=hidden name=userID value=$row3[0]>
                    <button type=submit class='btn btn-outline-success'>$row3[1]</button>
                </form>
                </td>";
            echo "<td>". $row3[3] ."</td>";
            if($row3[6] == 0){echo "<td>管理員</td>";}else if($row3[6] == 1){echo "<td>院長</td>";}else if($row3[6] == 2){echo "<td>系助</td>";}else if($row3[6] == 3){echo "<td>學生</td>";}
            if($row3[7] == 0){echo "<td>未啟用</td>";}else if($row3[7] == 1){echo "<td>啟用</td>";}else if($row3[7] == 2){echo "<td>已停用</td>";}
            echo "
                <td>                
                <form action=userUpdate.php method=post>
                    <input type=hidden name=userID value=$row3[0]>
                    <button type=submit class='btn btn-outline-primary'>修改</button>
                </form>
                </td>";

            echo "<td>";
                ?>
                <form action=userStop.php method=post onsubmit='return confirm("確定停用?")' >
                <?php
                echo "
                    <input type=hidden name=userID value=$row3[0] >
                    <button type=submit class='btn btn-outline-dark'>停用</button>
                </form>
                </td>";

            echo "</tr>";
            $i+=1;
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
                    <th scope="col">啟用</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">角色</th>
                    <th scope="col">狀態</th>
                    <th scope="col">其他</th>
                    <th scope="col">其他</th>
                </tr>
            </thead>
        <tbody>
        <?php
        $i = 1;
        while($row = pg_fetch_row($result)){
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>
                <form action=userDetail.php method=post>
                    <input type=hidden name=userID value=$row[0]>
                    <button type=submit class='btn btn-outline-success'>$row[1]</button>
                </form>
                </td>";
            echo "<td>". $row[3] ."</td>";
            if($row[6] == 0){echo "<td>管理員</td>";}else if($row[6] == 1){echo "<td>院長</td>";}else if($row[6] == 2){echo "<td>系助</td>";}else if($row[6] == 3){echo "<td>學生</td>";}
            if($row[7] == 0){echo "<td>未啟用</td>";}else if($row[7] == 1){echo "<td>啟用</td>";}else if($row[7] == 2){echo "<td>已停用</td>";}
            echo "
                <td>                
                <form action=userUpdate.php method=post>
                    <input type=hidden name=userID value=$row[0]>
                    <button type=submit class='btn btn-outline-primary'>修改</button>
                </form>
                </td>";

            echo "<td>";
                ?>
                <form action=userStop.php method=post onsubmit='return confirm("確定停用?")'>
                <?php
                echo "
                    <input type=hidden name=userID value=$row[0] >
                    <button type=submit class='btn btn-outline-dark'>停用</button>
                </form>
                </td>";

            echo "</tr>";
            $i+=1;
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
                    <th scope="col">停用</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">角色</th>
                    <th scope="col">狀態</th>
                    <th scope="col">其他</th>
                    <th scope="col">其他</th>
                </tr>
            </thead>
        <tbody>
        <?php
        $j = 1;
        while($row2 = pg_fetch_row($result2)){
            echo "<tr>";
            echo "<td>" . $j . "</td>";
            echo "<td>
                <form action=userDetail.php method=post>
                    <input type=hidden name=userID value=$row2[0]>
                    <button type=submit class='btn btn-outline-success'>$row2[1]</button>
                </form>
                </td>";
            echo "<td>". $row2[3] ."</td>";
            if($row2[6] == 0){echo "<td>管理員</td>";}else if($row2[6] == 1){echo "<td>院長</td>";}else if($row2[6] == 2){echo "<td>系助</td>";}else if($row2[6] == 3){echo "<td>學生</td>";}
            if($row2[7] == 0){echo "<td>未啟用</td>";}else if($row2[7] == 1){echo "<td>啟用</td>";}else if($row2[7] == 2){echo "<td>已停用</td>";}
            echo "
                <td>                
                <form action=userUpdate.php method=post>
                    <input type=hidden name=userID value=$row2[0]>
                    <button type=submit class='btn btn-outline-primary'>修改</button>
                </form>
                </td>";

            echo "<td>";
                ?>
                <form action=userdel.php method=post onsubmit='return confirm("確定刪除?")' >
                <?php
                echo "
                    <input type=hidden name=userID value=$row2[0] >
                    <button type=submit class='btn btn-outline-danger'>刪除</button>
                </form>
                </td>";

            echo "</tr>";
            $j+=1;
        }
        ?>
        </tbody>
        </table>
    </div>
  </div>
</div>



    



    <?php
        footer();
    ?>

        </body>

    <?php
}else{
    echo "please login";
    echo "<meta http-equiv='refresh' content='1;url=index.php'/>";  
}
