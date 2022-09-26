<?php
    include("style2.php");
    include("db_conn.php");
    session_start();
if(isset($_SESSION['email'])){
    $sql = "SELECT * FROM public.user ;";
    $result = pg_query($db_handle, $sql);
?>
    <!doctype html>
    <html lang="en">
    <?php
        head();
    ?>
        <body>

    <?php
        if($_SESSION['roleID'] == 3){
            navLogStudent(1);
        }else{
            navLogOut(1);
        }
    ?>
    <?php
        icon3();
    ?>
    <?php
        footer();
    ?>

        </body>

    <?php
}else{
    echo "please login";
    echo "<meta http-equiv='refresh' content='1;url=index.php'/>";  
}
