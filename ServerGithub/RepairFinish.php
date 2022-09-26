<?php
    include("db_conn.php");
    session_start();

if(isset($_SESSION['email'])){
    $id = $_POST['userID'];

    $sql = "UPDATE public.repairdetial SET schedule = '5' WHERE id = '$id';";

    $result = pg_query($db_handle,$sql);

    if($result){
        echo '<script>alert("edit success")</script>';
        echo "<meta http-equiv='refresh' content='0;url=Reinquire.php'/>";  
    }else{
        echo '<script>alert("edit false")</script>';
        echo "<meta http-equiv='refresh' content='0;url=Reinquire.php'/>";   
    }
}else{
    echo '<script>alert("please login")</script>';
    echo "<meta http-equiv='refresh' content='0;url=index.php'/>";  
}