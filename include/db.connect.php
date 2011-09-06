<?php
//connect to the database
    $connect=mysql_connect($db_host,$db_user,$db_password) or die("Connection failed"); //open database
    mysql_select_db($db) or die("Not Connected to Database"); //select database

?>
