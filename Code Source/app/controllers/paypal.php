<?php 

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
if(isset($_POST['paypal'])){
    include('../start.php');    
    $orderId =  $order->getOrderId('orders', ['idU' => $_SESSION['idU']], 'idOrder');
    $orderNumber = $orderId['idOrder'];
    $orderIdF = $orderId['idOrder'];

    $shipping = 0.00;
    $payer = new Payer();
    $payer->setPaymentMethod('paypal');
    function items(){
        $crud = new CRUD();
        $cardOfProductCart = $crud->selectAll('cart', ['idU' => $_SESSION['idU']]);
        $i = 0;
        foreach($cardOfProductCart as $product){
            $productDetails = $crud->selectOne('product', ['idP' => $product['idP']]);
            $item[$i] = new Item();
            $item[$i]->setName($productDetails['nameProduct'])
                     ->setCurrency('USD')
                     ->setQuantity($product['qte'])
                     ->setPrice($productDetails['Price'] * $product['qte']);
        }
    }
    $itemList = new ItemList();
    $itemList->setItems(items());
    $total = 0.0;
    foreach($cardOfProductCart as $price){
        $productPrice = $crud->selectOne('product', ['idP' => $price['idP']]);
        $total = $total + ($price['qte'] * $productPrice);
    }
    $amount = new Amount();
    $amount->setCurrency('USD')->setTotal($total);
    $transaction = new Transaction();
    $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Maria-shop payment')
            ->setInvoiceNumber(uniqid());
            $redirect = new RedirectUrls();
        $redirect->setReturnUrl(BASE_URL . '/views/thankyou.php')
        ->setCancelUrl(BASE_URL . '/views/index.php');
        $payment = new Payment();
        $payment->setIntent('sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirect)
        ->setTransactions([$transaction]);
        try{
            $payment->create($paypal);
        }
        catch(Exception $e){
            die($e);
        }
        $approvUrl = $payment->getApprovalLink();
        header("location:$approvUrl");
    // foreach($cardOfProductCart as $cart):
    //   $_POST['orderNumber'] =  'Mshop' . $orderIdF;
    //   $_POST['idP'] = $cart['idP'];
    //   $_POST['qte'] = $cart['qte'];
    //   $_POST['idU'] = $cart['idU'];
    //   $productDetail = $crud->selectOne('product', ['idP' => $cart['idP']]);
    //   $_POST['price'] = $cart['qte'] * $productDetail['Price'];
    //   unset($_POST['checkout'],  $_POST['paypal'], $_POST['email']);
    //   $_POST['cod'] = 1;
    //   $crud->create('orders', $_POST);
    //   $idCartTodelete = $cart['idCart'];
     
    //   $crud->delete('cart', 'idCart', $idCartTodelete);
    // endforeach;
    
    // header("location:thankyou.php?idOrder=Mshop$orderNumber");
    // exit();
}