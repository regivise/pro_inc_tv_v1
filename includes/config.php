<?php
ob_start();//waits until all code is executed

session_start();

date_default_timezone_set("Africa/Nairobi");


try{

    $conn = new PDO("mysql:dbname=pro_inc_tv_v1;host=localhost","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

}
catch(PDOException $e){

    exit("Connection failed".$e->getMessage());
}

?>