<?php
include('../models/connect.php');
include('../models/db.php');
session_start();
unset($_SESSION['idU']);
unset($_SESSION['message']);
unset($_SESSION['type']);
unset($_SESSION['Admin']);
unset($_SESSION['username']);
unset($_SESSION['mirrormx_customer_chat_pro']);

session_destroy();

header('location: ' . BASE_URL . '/views/login-reg.php');
