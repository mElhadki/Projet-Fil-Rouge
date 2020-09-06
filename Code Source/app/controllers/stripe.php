<?php 

$crud = new CRUD();
$orderDB = new Order();
//Payment with stripe Credit card
$productCart = $crud->selectAll('cart', ['idU' => $_SESSION['idU']]);

require '../vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51HOViXL0RN1zXroUxig08g4BkMAmfo401W82WKPGjQ7rEke3Im3UH3uqmGFafS0ZYOUhulr3eX4AXuOdjGgv67mF00lud9Xx5Z');
if(isset($_POST['stripe'])){
    $errorCheckout = validateCheckout($_POST);
    if (count($errorCheckout) == 0) {
        
        $orderIdStripe =  $orderDB->getOrderId('orders', '', 'idOrder');
        $orderNumberStripe = $orderIdStripe['idOrder'];
        $orderIdFStripe = $orderIdStripe['idOrder'];
        $amount = 0;
        $stripeTKN = $_POST['stripeToken'];
        foreach ($productCart as $cart) :
            $_POST['orderNumber'] =  'Mshop' . $orderIdFStripe;
            $_POST['idP'] = $cart['idP'];
            $_POST['qte'] = $cart['qte'];
            $_POST['idU'] = $cart['idU'];
            $productDetail = $crud->selectOne('product', ['idP' => $cart['idP']]);
            $_POST['price'] = $cart['qte'] * $productDetail['Price'];
            $amount = $amount + ($cart['qte'] * $productDetail['Price']);
            unset($_POST['checkout'],  $_POST['paypal'], $_POST['state'], $_POST['country'], $_POST['stripeToken']);
            $_POST['stripe'] = 1;
            $crud->create('orders', $_POST);
            $idCartTodelete = $cart['idCart'];
            $crud->delete('cart', 'idCart', $idCartTodelete);
        endforeach;

        
            $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            $email = $POST['email'];
            $name = $POST['firstname'];
            $token = $stripeTKN;
            $customer = \Stripe\Customer::create(array(
                "email" => $email,
                "source" => $token,
                "name" => $name
            ));
            
            $amount = number_format(($amount*100) , 0, '', ''); 
            // Charge Customer
            $charge = \Stripe\Charge::create(array(
                "amount" => $amount,
                "currency" => "usd",
                "description" => "payment from MARI2SHOP and Order number is #Mshop$orderNumberStripe",
                "customer" => $customer->id
            ));
       
        header("location:thankyou.php?idOrder=Mshop$orderNumberStripe");
        exit();
        
    }

}

