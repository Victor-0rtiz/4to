<?php
session_start();
if (!$_SESSION['sesioncreada']){
    header("Location: ../login.php");
    exit();
}


