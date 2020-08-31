<?php


$crud = new CRUD();
$table = 'users';
$errorRegister = array();
$errorLogin = array();



//add new user
if (isset($_POST['register'])) {
    $errorRegister = validateUserRegister($_POST);
    if (count($errorRegister) == 0) {
        unset($_POST['register']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $add_user = $crud->create($table, $_POST);
        $loginUserR  = $crud->selectOne($table, ['email' => $_POST['email']]);
        loginUser($loginUserR);
    }
}
//end add new user



//login user 
if (isset($_POST['login'])) {
    $errorLogin = validateUserLogin($_POST);
    if (count($errorLogin) == 0) {
        $user = $crud->selectOne($table, ['email' => $_POST['email']]);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            loginUser($user);
        } else {
            array_push($errorLogin, 'wrong login');
        }
    }
}
function loginUser($user)
{   
    $crud = new CRUD();
    $checkReset = $crud->selectOne('password_reset', ['email' => $user['email']]);
    if($checkReset == true){
        $crud->delete('password_reset', 'idReset', $checkReset['idReset']);
    }
    $_SESSION['idU'] = $user['idU'];
    $_SESSION['username'] = $user['fullname'];
    $_SESSION['message'] = 'YOU ARE NOW LOGGED IN';
    $_SESSION['type'] = 'success';
    header('location:index.php');
    exit();
}

//end login user 




//Login admin 
function loginAdmin($user)
{
    $_SESSION['idU'] = $user['idU'];
    
    $_SESSION['Admin'] = $user['fullname'];
    $_SESSION['superAdmin'] = $user['superAdmin'];
    $_SESSION['message'] = 'YOU ARE NOW LOGGED IN';
    $_SESSION['type'] = 'success';
    header('location:dashboard.php');
    exit();
}
$errorLoginAdmin = array();
if (isset($_POST['loginAdmin'])) {
    $errorLoginAdmin = validateAdminLogin($_POST);

    if (count($errorLoginAdmin) == 0) {
        $loginAdmin = $crud->selectOne($table, ['fullname' => $_POST['username'], 'admin' => 1]);

        if ($loginAdmin && $_POST['password'] == $loginAdmin['password']) {
            loginAdmin($loginAdmin);
        }
    }
}
//End Login admin 








//manage users in backoffice 
$errorRegisterBack = array();
$manageUsers = $crud->selectAll('users');

//add user in backoffice 
if(isset($_POST['registerBackoffice'])){
    $errorRegisterBack = validateUserRegisterBackoffice($_POST);
    if(count($errorRegisterBack) == 0){
        unset($_POST['registerBackoffice']);
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $crud->create($table, $_POST);
        header('location:index.php');
        exit();
    }
    
}


//edit users in backoffice 
$idUedit = '';
$fullnameEdit = '';
$emailEdit = '';
$phoneEdit = '';
$status = '';
$errorEditUser = array();
if(isset($_GET['idU_edit'])){
    $dataEditIdU = $crud->selectOne($table, ['idU' => $_GET['idU_edit']]);
    $idUedit = $dataEditIdU['idU'];
    $fullnameEdit = $dataEditIdU['fullname'];
    $emailEdit = $dataEditIdU['email'];
    $phoneEdit = $dataEditIdU['phone_number'];
    $status = $dataEditIdU['admin'];
}
if(isset($_POST['editUserBackoffice'])){
   $errorEditUser = validateUserEditBackoffice($_POST);
   if(count($errorEditUser) == 0){
       $idUupdate = $_POST['idU'];
       $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
       unset($_POST['editUserBackoffice'], $_POST['idU']);
       $crud->update($table, $idUupdate, $_POST, 'idU');
       header('location:index.php');
       exit();
   }
}
//end edit users in backoffice 

//Ban an user 
if(isset($_GET['ban_idU'])){
    $idToBan = $_GET['ban_idU'];
    $dataToban = ['ban' => 1];
    $crud->update($table, $idToBan, $dataToban, 'idU');
    header('location:index.php');
    exit();
}
//Unban an user 
if(isset($_GET['Unban_idU'])){
    $idToBan = $_GET['Unban_idU'];
    $dataToban = ['ban' => 0];
    $crud->update($table, $idToBan, $dataToban, 'idU');
    header('location:index.php');
    exit();
}

//Account detail for customers 
if(isset($_SESSION['idU'])){
    $dataUserToEdit = $crud->selectOne('users', ['idU' => $_SESSION['idU']]);

}
//edit it 
$errorEditCustomer = array();
if(isset($_POST['editCustomer'])){
    $errorEditCustomer = editUserInFrontOffice($_POST);
    if(count($errorEditCustomer) == 0 ){
        $idUeditCustomer = $_POST['idU'];
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        unset($_POST['editCustomer'], $_POST['idU'], $_POST['passwordConf']);
        $crud->update('users', $idUeditCustomer, $_POST, 'idU');
        header('location:AccountDetail.php');
        $_SESSION['message'] = 'Your account has edit successfully';
        $_SESSION['type'] = 'success';
        exit();
    }
}