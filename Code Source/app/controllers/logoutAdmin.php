<?php
include('../database/connect.php');
include('../database/db.php');
session_start();
unset($_SESSION['idU']);
unset($_SESSION['message']);
unset($_SESSION['type']);
unset($_SESSION['Admin']);


session_destroy();

header('location: ' . BASE_URL . '/backoffice/index.php');

