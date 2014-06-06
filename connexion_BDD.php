<?php
    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='reserv';
    $cnx=new mysqli($hote,$user,$passwd,$database);
    $cnx->set_charset("utf8");
    $SQLFR = "SET lc_time_names = 'fr_FR';";
    $cnx->query($SQLFR);
?>
