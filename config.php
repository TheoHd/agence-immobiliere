<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=projetimmobilier;charset=utf8;','root','');

?>