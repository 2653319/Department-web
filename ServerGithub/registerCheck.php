<?php
include("db_conn.php");
include("mailSend.php");


$id = $_POST['username'];
$Password = $_POST['passwd'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$userRole = 3;
$userStatus = 0;

$sql = "INSERT INTO public.user (name, passwd, email, phone, create_date, role, status)
VALUES('$id' , crypt('$Password',gen_salt('bf')) , '$email', '$phone' , current_timestamp , '$userRole' , '$userStatus' );";

$result = pg_query($db_handle,$sql);

if($result){
    if(send($email,$id)){
        ?>
        <script>
        alert('suss   wait  for  admin  to  check');
        </script>
        <meta http-equiv='refresh' content='0;url=index.php'/>
        <?php
    }else{
        ?>
        <script>
            alert('error   Please try again');
            window.location.reload();
        </script>
        <?php
    }
}else{
    ?>
    <script>
        alert("error   Please try again");
        window.location.reload();
    </script>
    <?php
}    
