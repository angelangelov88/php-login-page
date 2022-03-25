<?php

include('./inc/autoload.php');

if (isset($_SESSION['id'])) {
    unset($_SESSION['id']);
}

if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
}



header('Location: login.php');
die;


?>
