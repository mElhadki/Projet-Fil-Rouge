<?php
function validateCategory($post)
{
    $crud = new CRUD();
    $errors = array();
    //Require name category  
    if (empty($post['nameCategory'])) {
        array_push($errors, 'Category name is required');
    }

    //checking if there is an exist category 
    $existingCategory  = $crud->selectOne('category', ['nameCategory' => $post['nameCategory']]);
    // LET S BLOCK THE PROCESS
    if ($existingCategory == true) {
        if (isset($post['addCategory'])) {
            array_push($errors, 'Category with that name already exists');
        }
    }

    $maxCategory = $crud->selectAll('category');
    if (count($maxCategory) >= 3) {
        array_push($errors, 'You are reached the max of categories');
    }

    return $errors;
}

function validateEditCategory($post)
{
    $cruds = new CRUD();
    $errorsEdit = array();
    //Require name category  
    if (empty($post['nameCategory'])) {
        array_push($errorsEdit, 'Category name is required');
    }
  
  
    //checking if there is an exist category 
    $existingCategory  = $cruds->selectOne('category', ['nameCategory' => $post['nameCategory']]);
    // LET S BLOCK THE PROCESS
    if ($existingCategory == true) {
        if (isset($post['editCategory']) && $existingCategory['idC'] != $post['idC']) {
            array_push($errorsEdit, 'Category with that title already exists');
        }
    }
    return $errorsEdit;
}
