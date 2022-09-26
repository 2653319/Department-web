<?php

$db_handle = pg_connect("host=localhost port=5432 dbname=NaSQL user=postgres password=P2653319");

if($db_handle){
    /* echo "Opened database successfully\n"; */
}else{
    echo "break";
}  

/*  
   $host        = "host=127.0.0.1";
    $port        = "port=5432";
   $dbname      = "dbname=NaSQL";
   $credentials = "user=postgres password=P2653319";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }  */
?>