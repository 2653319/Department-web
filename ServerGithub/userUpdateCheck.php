<?php
    include("db_conn.php");
    session_start();
    if(isset($_SESSION['email'])){
    $id = $_POST['id'];
    $name = $_POST['user'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];
    $role = $_POST['role'];


    $sql = "UPDATE public.user SET name='$name' , phone='$phone' , status='$status' , role ='$role' WHERE id = '$id';";

    $result = pg_query($db_handle,$sql);

    if($result){
        echo '<script>alert("edit success")</script>';
        echo "<meta http-equiv='refresh' content='0;url=account.php'/>";  
    }else{
        echo '<script>alert("edit false")</script>';
        echo "<meta http-equiv='refresh' content='0;url=account.php'/>";  
    }
}else{
    echo '<script>alert("please login")</script>';
    echo "<meta http-equiv='refresh' content='0;url=index.php'/>";  
}