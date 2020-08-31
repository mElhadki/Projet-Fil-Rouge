<?php
define('BASE_URL', "http://localhost/eshop");

session_start();
unset($_SESSION['idU']);
unset($_SESSION['message']);
unset($_SESSION['type']);
unset($_SESSION['Admin']);


session_destroy();

header('location: ' . BASE_URL . '/views');
