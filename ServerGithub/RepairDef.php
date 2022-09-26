<?php
    include("db_conn.php");
    session_start();
    if(isset($_SESSION['email'])){
        if($_SESSION['email'] == 'Nashi@asia.edu.tw' || $_SESSION['email'] == 'csie@asia.edu.tw'){
            $id = $_POST['userID'];

            $sql = "DELETE FROM public.repairdetial WHERE id = $id ;"; 

            $result = pg_query($db_handle,$sql);

            if($result){
                echo '<script>alert("Delete success")</script>';
                echo "<meta http-equiv='refresh' content='0;url=Reinquire.php'/>";  
            }else{
                echo '<script>alert("Delete false")</script>';
                echo "<meta http-equiv='refresh' content='0;url=Reinquire.php'/>";  
            } 
        }else{
            echo '<script>alert("權限不足")</script>';
            echo "<meta http-equiv='refresh' content='0;url=Reinquire.php'/>";  
        }
    }else{
        echo '<script>alert("please login")</script>';
        echo "<meta http-equiv='refresh' content='0;url=index.php'/>";  
    }