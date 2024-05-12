<?php

session_start();
session_destroy();

setcookie('logintoken', '', time() - 3600, '/');


header('location:/');
?>

