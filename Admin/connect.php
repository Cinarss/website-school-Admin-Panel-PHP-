<?php 

    try{
        $db = new PDO("mysql:host=localhost;dbname=school;charset=utf8;","root","");
        // echo "connect";
    }
    catch (PDOException $e) {
        $e->getMessage();
        }

?>