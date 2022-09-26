<?php
session_start();
include("db_conn.php");

if(isset($_SESSION['email'])){

$applicant = $_POST['applicant'];
$department = $_POST['department'];
$phoneExt = $_POST['phoneExt'];
$email = $_POST['email'];
$location = $_POST['location'];
$computerSerialNO = $_POST['computerSerialNO'];
$propertyName = $_POST['propertyName'];
$propertySerialNo = $_POST['propertySerialNo'];
$problemKind = $_POST['problemKind'];

$problemItem = "";
$tag = $_POST['problemItem'];
for($i = 0 ; $i < count($tag) ; $i++){
    if($i==0){
        $sql = "SELECT item FROM problemitems WHERE id = '$tag[$i]';";
        $result = pg_query($db_handle,$sql);
        $row = pg_fetch_array($result);
        $problemItem = $row["item"];
    }else{
        $sql = "SELECT item FROM problemitems WHERE id = '$tag[$i]';";
        $result = pg_query($db_handle,$sql);
        $row = pg_fetch_array($result);
        $problemItem = $problemItem.",".$row["item"];
    }
}



$problemText = $_POST['problemText'];

$problemMemo = $_POST['problemMemo'];


$sql = "INSERT INTO repairdetial (applicantName, department, phoneExt, email, locationid, computerSerialNO, propertyName, propertySerialNo
, problemKind, problemItem, problemText, problemMemo, create_date, finished_date ,schedule)
VALUES('$applicant', '$department', '$phoneExt', '$email', '$location', '$computerSerialNO', '$propertyName', '$propertySerialNo', '$problemKind', '$problemItem', '$problemText', '$problemMemo', current_timestamp, current_timestamp , 1);";

$result = pg_query($db_handle,$sql);

if($result){
    echo "<meta http-equiv='refresh' content='0;url=indexLoginStatus.php'/>"; 
    echo "<script>alert('送出')</script>";
}else{
    echo "<meta http-equiv='refresh' content='0;url=indexLoginStatus.php'/>"; 
    echo "<script>alert('錯誤')</script>";
}  

}else{
    echo '<script>alert("please login")</script>';
    echo "<meta http-equiv='refresh' content='0;url=index.php'/>";  
}