<?php
$crud = new CRUD();


//adding sizes to db
$errorAddSize = array();
if (isset($_POST['addSize'])) {
    $errorAddSize = validateAddSize($_POST);
    if (count($errorAddSize) == 0) {
        unset($_POST['addSize']);
        $add_size = $crud->create('size', $_POST);
        header('location:manageSize.php');
        exit();
    }
}
//end adding sizes to db 


//manage sizes 
$manage_sizes = $crud->selectAll('size');

//end manage sizes


//editing List of sizes 
$errorsEdit = array();
$sizename = '';
if (isset($_GET['editSizeId'])) {
    $getsize = $crud->selectOne('size', ['idSize' => $_GET['editSizeId']]);
    $sizename = $getsize['nameSize'];
}

if (isset($_POST['editSize'])) {
    $errorsEdit = validateEditSize($_POST);
    if (count($errorsEdit) == 0) {
        $idSize = $_POST['idSize'];
        unset($_POST['editSize'], $_POST['idSize']);
        $update_size = $crud->update('size', $idSize, $_POST, 'idSize');
        header('location:manageSize.php');
        exit();
    }
}
//end editing list of sizes


//deleting list sizes
if (isset($_GET['del_idS'])) {
    $del_cart_sizes = $crud->delete('cart', 'idSize', $_GET['del_idS']);
    $del_list_product = $crud->delete('size_product', 'idSize', $_GET['del_idS']);
    $del_size = $crud->delete('size', 'idSize', $_GET['del_idS']);
    header('location:manageSize.php');
    exit();
}

//end deleting list sizes


//giving size to product

$errorsAddingSizeProduct = array();
if (isset($_POST['addProductSize'])) {
    $errorsAddingSizeProduct = validateAddSize($_POST);
    if (count($errorsAddingSizeProduct) == 0) {
        unset($_POST['addProductSize']);
        $crud->create('size_product', $_POST);
        header('location:giveSize.php?idProductSize='.$_POST['idP']);
        exit();
    }
}
//end giving size to product


//delete 
if (isset($_GET['id_ps_del']) && isset($_GET['idProduit'])) {
    $idProduit = $_GET['idProduit'];
    $idDelSize = $_GET['id_ps_del'];
    $crud->delete('size_product', 'idPS', $idDelSize);
    header('location:giveSize.php?idProductSize='.$idProduit);
    exit();
}
