<?php 

$crud = new CRUD();
function validateAddTocart($post){
    $errorAddToCart = array();
    if(!isset($_SESSION['idU'])){
        array_push($errorAddToCart, 'Please login or register first <a href="login-reg.php">here</a>');
    }
    return $errorAddToCart;
} 
//adding to cart
$errorAddToCart = array();
if(isset($_POST['addToCart'])){
    $errorAddToCart = validateAddTocart($_POST);
    if(count($errorAddToCart) == 0){
        unset($_POST['addToCart']);
        if(!isset($_POST['idSize'])){
            $_POST['idSize'] = "";
        }
        $crud->create('cart', $_POST);
        $nameProductFlash = $crud->selectOne('product', ['idP' => $_POST['idP']]);
        $_SESSION['addToCart'] = "Product added to cart: '".$nameProductFlash['nameProduct']."'";
        
    }
   
}

//count cart user
if(isset($_SESSION['idU'])){
    $getCountCart = $crud->selectAll('cart', ['idU' => $_SESSION['idU']]);
    $countCart = count($getCountCart);
}


//Update product from cart
if(isset($_POST['updateCart'])){
    $idCart = $_POST['idCart'];
    unset($_POST['idCart'], $_POST['updateCart'], $_POST['idP']);
    $crud->update('cart', $idCart, $_POST, 'idCart');
    header('location:cart2.php');
    exit();
}

//delete product from cart 
if(isset($_GET['del_id'])){
    $idCartDel = $_GET['del_id'];
    $crud->delete('cart', 'idCart', $idCartDel);
    header('location:cart2.php');
    exit();
}
