<?php
    include("db_conn.php");
    session_start();

    if(isset($_SESSION['email'])){
    $id = $_POST['id'];     //ID
    $name = $_POST['user']; //名稱
    $depart = $_POST['depart']; //單位
    $phone = $_POST['phone'];   //手機
    $email = $_POST['email'];   //信箱
    $locat = $_POST['locat'];  //教室編號
    $comNum = $_POST['comNum'];  //電腦編號
    $proName = $_POST['proName'];  //設備名稱
    $proNum = $_POST['proNum'];  //財產編號
    $proKind = $_POST['proKind'];  //軟硬體
    $problem = $_POST['problem'];  //問題
    $problemText = $_POST['problemText'];  //其他問題  可null
    $problemDetail = $_POST['problemDetail'];  //詳細
    $sch = $_POST['sch'];  //進度
    $refuse = $_POST['refuse'];  //拒絕原因  可null


    $sql = "UPDATE public.repairdetial SET applicantname ='$name' , department='$depart' , phoneext='$phone' , email ='$email' , locationid ='$locat' , computerserialno ='$comNum' , propertyname ='$proName' , propertyserialno = '$proNum'
     , problemKind ='$proKind' , problemitem ='$problem' , problemtext ='$problemText' , problemmemo = '$problemDetail' , schedule ='$sch' , refuse = '$refuse' WHERE id = '$id';";

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