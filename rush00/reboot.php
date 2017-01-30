<?php
session_start();
if (isset($_SESSION['toto']) === TRUE)
    $_SESSION['toto'] = 0;
include('index.php');
?>
