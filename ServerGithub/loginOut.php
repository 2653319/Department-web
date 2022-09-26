<?php
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['id']);
    echo '<script>alert("LoginOut")</script>';
    echo "<meta http-equiv='refresh' content='0;url=index.php'/>"; 
    
