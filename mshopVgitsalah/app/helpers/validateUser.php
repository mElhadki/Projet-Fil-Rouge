<?php
function validateUserRegister($post)
{
    $crud = new CRUD();
    $errorRegister = array();


    //Require name   
    if (empty($post['fullname'])) {
        array_push($errorRegister, 'full name is required');
    }

    //Require email  
    if (empty($post['email'])) {
        array_push($errorRegister, 'email is required');
    }
    //Require password  
    if (empty($post['password'])) {
        array_push($errorRegister, 'password is required');
    }
    elseif(strlen($post['password']) < 6){
        array_push($errorRegister, 'please put 6 characters in password');
    }
    //Require phone number 
    if (empty($post['phone_number'])) {
        array_push($errorRegister, 'phone number is required');
    }

    //checking if there is an exist email 
    $existingMailR  = $crud->selectOne('users', ['email' => $post['email']]);
    // LET S BLOCK THE PROCESS
    if ($existingMailR == true) {
        if (isset($post['register'])) {
            array_push($errorRegister, 'this email already sign up');
        }
    }
    return $errorRegister;
}

function validateUserLogin($post)
{
    $crud = new CRUD();
    $errorLogin = array();

    //Require email  
    if (empty($post['email'])) {
        array_push($errorLogin, 'email is required');
    }
    //Require password  
    if (empty($post['password'])) {
        array_push($errorLogin, 'password is required');
    }

    $ifBanned = $crud->selectOne('users', ['email' => $post['email'],'ban' => 1]);

    if($ifBanned == true){
        array_push($errorLogin, 'you are banned ! PLEASE CALL US IN +212649118803');
    }

    return $errorLogin;
}

function validateAdminLogin($post)
{
    $crud = new CRUD();
    $errorLoginAdmin = array();

    //Require email  
    if (empty($post['username'])) {
        array_push($errorLoginAdmin, 'username is required');
    }
    //Require password  
    if (empty($post['password'])) {
        array_push($errorLoginAdmin, 'password is required');
    }


    return $errorLoginAdmin;
}

function validateUserRegisterBackoffice($post)
{
    $crud = new CRUD();
    $errorRegisterBack = array();


    //Require name   
    if (empty($post['fullname'])) {
        array_push($errorRegisterBack, 'full name is required');
    }

    //Require email  
    if (empty($post['email'])) {
        array_push($errorRegisterBack, 'email is required');
    }
    //Require password  
    if (empty($post['password'])) {
        array_push($errorRegisterBack, 'password is required');
    }
    elseif(strlen($post['password']) < 6){
        array_push($errorRegister, 'please put 6 characters in password');
    }
    //Require phone number 
    if (empty($post['phone_number'])) {
        array_push($errorRegisterBack, 'phone number is required');
    }

    //checking if there is an exist email 
    $existingMailR  = $crud->selectOne('users', ['email' => $post['email']]);
    // LET S BLOCK THE PROCESS
    if ($existingMailR == true) {
        if (isset($post['registerBackoffice'])) {
            array_push($errorRegisterBack, 'this email already sign up');
        }
    }
    return $errorRegisterBack;
}
function validateUserEditBackoffice($post)
{
    $crud = new CRUD();
    $errorEditUser = array();


    //Require name   
    if (empty($post['fullname'])) {
        array_push($errorEditUser, 'full name is required');
    }

    //Require email  
    if (empty($post['email'])) {
        array_push($errorEditUser, 'email is required');
    }
    //Require password  
    if (empty($post['password'])) {
        array_push($errorEditUser, 'password is required');
    }
    elseif(strlen($post['password']) < 6){
        array_push($errorRegister, 'please put 6 characters in password');
    }
    //Require phone number 
    if (empty($post['phone_number'])) {
        array_push($errorEditUser, 'phone number is required');
    }

    //checking if there is an exist email 
    $existingMailR  = $crud->selectOne('users', ['email' => $post['email']]);
    // LET S BLOCK THE PROCESS
    if ($existingMailR == true) {
        if (isset($post['editUserBackoffice']) && $existingMailR['idU'] != $post['idU']) {
            array_push($errorEditUser, 'this email already sign up');
        }
    }
    return $errorEditUser;
}