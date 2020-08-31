<?php 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function validateCheckout($post){
    $errorCheckout = array();
    if(empty($post['firstname'])){
        array_push($errorCheckout, 'first name is required');
    }
    elseif(strlen($post['firstname']) < 4){
        array_push($errorCheckout, 'first name is too short');
    }
    if(empty($post['lastname'])){
        array_push($errorCheckout, 'last name is required');
    }
    elseif(strlen($post['lastname']) < 4){
        array_push($errorCheckout, 'last name is too short');
    }
    if(empty($post["email"])) {
        array_push($errorCheckout, 'email is required');
    }
    else {
        $email = test_input($post["email"]);
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errorCheckout, 'invalid format email');
        }
    }
    if(empty($post['zip'])){
        array_push($errorCheckout, 'zip code is required');
    }
    elseif(strlen($post['zip']) < 5){
        array_push($errorCheckout, 'zip code is too short');
    }
    if($post['state'] === ""){
        array_push($errorCheckout, 'please select a state');
    }
    if($post['city'] === ''){
        array_push($errorCheckout, 'please select a city');
    }
    if(empty($post['phone_number'])){
        array_push($errorCheckout, "phone number is required");
    }
    elseif(!preg_match('/^[0-9]{10}+$/', $post['phone_number'])){
        array_push($errorCheckout, "phone number is invalid");
    }
    return $errorCheckout;
}
