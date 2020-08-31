<?php


function validationResetPassword($post)
{   
    $crud = new CRUD();
    $errorResetPassword = array();
    $checkEmail = $crud->selectOne('users', ['email' => $post['email']]);
   
    if(empty($post['email'])){
        array_push($errorResetPassword, 'email is required');
    }
   
    elseif(!$checkEmail){
        array_push($errorResetPassword, 'this email does not exist');
    }
    $checkExistingReset = $crud->selectOne('password_reset', ['email' => $post['email'] ]);
    if($checkExistingReset == true){
        array_push($errorResetPassword, 'Please you have already reset your password, check you email!');
    }
  
   
    return $errorResetPassword;
}