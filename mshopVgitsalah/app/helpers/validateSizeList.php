<?php 
function validateAddSizeList($post){
    $errorsAddSizeList = array();
    if(empty($post['nameSize'])){
        array_push($errorsAddSizeList, 'name size required');
    }
    $crud = new CRUD();
    $sizeAlreadyExistAdd = $crud->selectOne('size', ['nameSize' => $post['nameSize']]);
    if($sizeAlreadyExistAdd == true){
        array_push($errorsAddSizeList, 'size already exist');
    }
    return $errorsAddSizeList;
}




function validateEditSizeList($post){
    $errorsEditSizeList = array();
    $crud = new CRUD();

    if(empty($post['nameSize'])){
        array_push($errorsEditSizeList, 'size name required');
    }
    $sizeAlreadyExist = $crud->selectOne('size', ['nameSize' => $post['nameSize']]);
    if($sizeAlreadyExist == true && $post['idSize'] != $sizeAlreadyExist['idSize']){
        array_push($errorsEditSizeList, 'size already exist');
    }
    return $errorsEditSizeList;
}