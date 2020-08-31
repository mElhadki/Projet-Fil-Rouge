<?php

function validateAddSize($post)
{
    $errorsAddingSizeProduct = array();
    $crud = new CRUD();
    $checkSizeExist = $crud->selectOne('size_product', ['idSize' => $post['idSize'], 'idP' => $post['idP']]);

    if ($checkSizeExist == true) {
        array_push($errorsAddingSizeProduct, 'size already exist');
    }
    return $errorsAddingSizeProduct;
}
