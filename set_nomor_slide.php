<?php
session_start();
$_SESSION['nomor_slide'] = $_GET['nomor_slide'] ?? die('Invalid nomor slide');
?>
OK