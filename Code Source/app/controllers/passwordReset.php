<?php
$crud = new CRUD();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
$errorResetPassword = array();
if(isset($_POST['forgot'])){
$errorResetPassword = validationResetPassword($_POST);
if(count($errorResetPassword) == 0){
    $mail = new PHPMailer();
    $checkID  = $crud->selectOne('users', ['email' => $_POST['email']]);
    $_POST['idU'] = $checkID['idU'];
    $email = $_POST['email'];
    $token = uniqid(true);
    $_POST['token'] = $token;
    unset($_POST['forgot']);
    $crud->create('password_reset', $_POST);

    try {
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'mariamshop2@gmail.com';                     
        $mail->Password   = '0646274243';                               
        $mail->SMTPSecure = 'ssl';        
        $mail->Port       = 465;                                    
    
        //Recipients
        $mail->setFrom('mariamshop2@gmail.com', 'Mariashop');
        $mail->addAddress($email, 'Joe User');     
    
    
       
    
        // Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Forget password';
        $mail->Body    = 'Reset your password this <a href="'.BASE_URL.'/views/newPassword.php?token='.$token.'"><b>Here!</b></a>';
    
        $mail->send();
        header('location:login-reg.php');
    $_SESSION['message'] = 'please check your email for more details !';
    $_SESSION['type'] = 'success';
    exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


}

if(isset($_GET['token'])){
    $checkToken = $crud->selectOne('password_reset', ['token' => $_GET['token']]);
    if(!$checkToken){
        $_SESSION['message'] = 'you are not authorized !';
        $_SESSION['type'] = 'error';
        header('location:index.php');
        exit();
    }
    else{
        $tokenEmail = $_GET['token'];
    }
}

if(isset($_POST['resetPassword'])){
    $userToReset = $crud->selectOne('password_reset', ['token' => $tokenEmail]);
    unset($_POST['resetPassword']);
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $crud->update('users', $userToReset['idU'], $_POST, 'idU');
    $crud->delete('password_reset', 'idReset', $userToReset['idReset']);
    header('location:login-reg.php');
    $_SESSION['message'] = 'you can login now with your new password';
    $_SESSION['type'] = 'success';
    exit();
}