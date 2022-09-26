<?php
include("db_conn.php");
session_start();

$email = $_POST['email'];
$userPassword = $_POST['password'];  
/* $userID = 'Nashi@asia.edu.tw';
$userPassword = 'Nashi';  */
/* echo $userID;
echo $userPassword; */

/* echo $userID;
echo $userPassword; */
/* $sql = "SELECT * FROM public.user ;";
$result = pg_query($db_handle ,$sql);

echo $result; */

$sql = "SELECT * FROM public.user WHERE email = '$email' AND passwd = crypt('$userPassword',passwd) AND status = 1 ;";

$result = pg_query($db_handle, $sql);
if($result && pg_num_rows($result)==1){
    $row = pg_fetch_row($result);
    /* echo '<script>alert("success")</script>'; */
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $row[1];
    $_SESSION['roleID'] = $row[6];
    echo "<meta http-equiv='refresh' content='0;url=indexLoginStatus.php'/>";  
}else{
    echo '<script>alert("E-mail or Password is error")</script>';
    echo "<meta http-equiv='refresh' content='1;url=index.php'/>"; 
} 


/* if(isset($_POST)){
    $userID = $_POST['username'];
    $userPassword = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE `email` = '$userID' AND `password` = crypt('$userPassword',passwd);";
    //echo $sql;

    $result = mysqli_query($link, $sql);
    $val = $result->num_rows;
    if ($val = 1){
        $_SESSION['email'] = $userID;
        echo "<meta http-equiv='refresh' content='2;url=index.php'/>";

    }else{
        echo "<h1 style = 'text-align:center';>ERRor</h1>";

        echo "<meta http-equiv='refresh' content='2;url=login.php'/>";
    }
}else{
    $outData = array("status" => "fail");
} */

?>