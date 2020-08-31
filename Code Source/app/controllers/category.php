<?php

$crud = new CRUD();
$table = 'category';
$idName = 'idC';

//showing 
$data = $crud->selectAll($table);
$errors = array();

//add category
if (isset($_POST['addCategory'])) {
    $errors = validateCategory($_POST);
    if (count($errors) == 0) {
        unset($_POST['addCategory']);
        $crud->create($table, $_POST);
        header('location:index.php');
        exit();
    }
}
//end add category



//update category 
$idC = '';
$dataname = '';
if (isset($_GET['edit_idC'])) {
    $idC = $_GET['edit_idC'];
    $nameCategory = $crud->selectOne($table, ['idC' => $idC]);
    $dataname = $nameCategory['nameCategory'];
}

$errorsEdit = array();
if (isset($_POST['editCategory'])) {

    $errorsEdit = validateEditCategory($_POST);

    if (count($errorsEdit) == 0) {
        $id = $_POST['idC'];
        unset($_POST['editCategory'], $_POST['idC']);
        $updatecat = $crud->update($table, $id, $_POST, $idName);
        header('location:index.php');
        exit();
    }
}
//end update category


//delete category 
if (isset($_GET['delete_ctg'])) {
    $deleteItems = $crud->delete('product', 'idC', $_GET['delete_ctg']);
    $delete = $crud->delete($table, $idName, $_GET['delete_ctg']);
    header('location:index.php');
    exit();
}
//end delete category 

//showing categories in navbar 
$navbar_categories = $crud->selectAll('category');


//showing product in category page and pagination
$pagination = new Paginator();

//pagination 
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} 
else {
    $page = 1;
}

//pagination formula for category
$perPage = 12;
$start = ($perPage * $page) - $perPage;
if (isset($_GET['categoryId'])) {
    $showingProduct =  $pagination->showingItems('product', 'idC', $_GET['categoryId'], $start, $perPage);
    $row = $pagination->buttonPagination('product', 'idC', $_GET['categoryId']);
    $pages = ceil($row / $perPage);
}

//pagination formula for store.php
$allProductShow =array();
if(isset($_GET['store']))
{
    $allProductShow = $pagination->showingAllItems('product', $start, $perPage);
    $rows = $pagination->AllButtonPagination('product');
    $pageStore = ceil($rows / $perPage);
}


//serch product in store.php
if(isset($_POST['search'])){
    $searchDb = new Search();
    
    $allProductShow = $searchDb->searchProduct($_POST['search']);
    $rows = count($allProductShow);
    $pageStore = ceil($rows / $perPage);
}