<?php

function db_connect()
{
    $db = new PDO('mysql:host=localhost;dbname=movie;charset=utf8','root','root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;    
}

?>