<?php
session_start();
if(!isset($_SESSION['logged'])) header('location: signin.php');
$_SESSION['logged']=false;
session_destroy();