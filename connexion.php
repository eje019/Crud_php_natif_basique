<?php
$pdo = new PDO("mysql:host=localhost; 
                dbname=Users", 
                "root", 
                "");

$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>