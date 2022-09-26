<?php
    include("db_conn.php");
    session_start();
    if(isset($_SESSION['email'])){
        if($_SESSION['email'] == 'Nashi@asia.edu.tw' || $_SESSION['email'] == 'csie@asia.edu.tw'){
            $id = $_POST['userID'];

            $sql = "UPDATE public.user SET status=2 WHERE id = '$id';"; 

            $result = pg_query($db_handle,$sql);

            if($result){
                echo '<script>alert("Stop success")</script>';
                echo "<meta http-equiv='refresh' content='0;url=account.php'/>";  
            }else{
                echo '<script>alert("Stop false")</script>';
                echo "<meta http-equiv='refresh' content='0;url=account.php'/>";  
            } 
        }else{
            echo '<script>alert("權限不足")</script>';
            echo "<meta http-equiv='refresh' content='0;url=account.php'/>";  
        }
    }else{
        echo '<script>alert("please login")</script>';
        echo "<meta http-equiv='refresh' content='0;url=index.php'/>";  
    }