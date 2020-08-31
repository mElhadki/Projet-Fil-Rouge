<?php
// validation adding product
function validateAddProduct($post)
{
    $crud = new CRUD();
    $errorsProduct = array();

    //Require name product  
    if (empty($post['nameProduct'])) {
        array_push($errorsProduct, 'product name is required');
    }

    //Require Price  
    if (empty($post['Price'])) {
        array_push($errorsProduct, 'price is required');
    }
    //Require quantity  
    if (empty($post['Qte'])) {
        array_push($errorsProduct, 'quantity is required');
    }

    if (empty($post['idC'])) {
        array_push($errorsProduct, 'category is required');
    }

    //checking if there is an exist category 
    $existingProduct  = $crud->selectOne('product', ['nameProduct' => $post['nameProduct']]);
    // LET S BLOCK THE PROCESS
    if ($existingProduct == true) {
        if (isset($post['addProduct'])) {
            array_push($errorsProduct, 'Category with that name already exists');
        }
    }
    return $errorsProduct;
}


// validation edit product
function validateEditProduct($post)
{
    $crud = new CRUD();
    $errorsEditProduct = array();

    //Require name product  
    if (empty($post['nameProduct'])) {
        array_push($errorsEditProduct, 'product name is required');
    }

    //Require Price  
    if (empty($post['Price'])) {
        array_push($errorsEditProduct, 'price is required');
    }
    //Require quantity  
    if (empty($post['Qte'])) {
        array_push($errorsEditProduct, 'quantity is required');
    }

    if (empty($post['idC'])) {
        array_push($errorsEditProduct, 'category is required');
    }

    //checking if there is an exist category 
    $existingProduct  = $crud->selectOne('product', ['nameProduct' => $post['nameProduct']]);
    // LET S BLOCK THE PROCESS
    if ($existingProduct == true) {
        if (isset($post['editProduct']) && $existingProduct['idP'] != $post['idP']) {
            array_push($errorsEditProduct, 'Category with that name already exists');
        }
    }
    return $errorsEditProduct;
}

























// validation adding size
function validateAddSize($post)
{
    $crud = new CRUD();
    $errorAddSize = array();

    //Require name product  
    if (empty($post['nameSize'])) {
        array_push($errorAddSize, 'Category name is required');
    }
    $existingSize = $crud->selectOne('size', ['nameSize' => $post['nameSize']]);
    if ($existingSize == true) {
        if (isset($post['addSize'])) {
            array_push($errorAddSize, 'name already exist');
        }
    }
    return $errorAddSize;
}

function validateEditSize($post)
{
    $crud = new CRUD();
    $errorsEdit = array();

    //Require name product  
    if (empty($post['nameSize'])) {
        array_push($errorsEdit, 'Category name is required');
    }
    $existingSize = $crud->selectOne('size', ['nameSize' => $post['nameSize']]);
    if ($existingSize == true) {
        if (isset($post['editSize']) && $existingSize['idSize'] != $post['idSize']) {
            array_push($errorsEdit, 'name already exist');
        }
    }
    return $errorsEdit;
}
