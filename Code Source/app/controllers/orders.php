<?php 

$crud = new CRUD();
$order = new Order();




//showing orders in backoffice 
$allOrderBackOffice = $order->getDiffNumOrder('orders', 'orderNumber');
$allOrderOnequantity = $order->getOneProductQte('orders', 'orderNumber');
$zipCode = '';
if(isset($_GET['orderNum'])){
  $orderDetail = $crud->selectAll('orders', ['orderNumber' => $_GET['orderNum']]);
  $zipCode = $orderDetail[0]['zip'];
  $timeOrder = date('F j, Y', strtotime($orderDetail[0]['created_at']));
}


if(isset($_GET['invoice'])){
  $dataForinvoice = $crud->selectOne('orders', ['orderNumber' => $_GET['invoice']]);
  function productMpdf(){
    $crud = new CRUD();
    $line = '';
    $total = 0;
    $productForInvoice = $crud->selectAll('orders', ['orderNumber' => $_GET['invoice']]);
    foreach($productForInvoice as $productM){
        $productNamePdf = $crud->selectOne('product_history', ['idP' => $productM['idP']]);
        $amount = 0;
        $amount = $productNamePdf['Price'] * $productM['qte'];
        $total = $total + $amount;
        $line .= '<tr>
        <td align="center">'.$productM['orderNumber'].'</td></tr>';
        $line .= '<td align="center">'. $productM['qte'] .'</td>';
        $line .= '<td>'. $productNamePdf['nameProduct'] .'</td>';
        $line .= '<td align="center">&#36;'. $productNamePdf['Price'] .'</td>';
        $line .= '<td align="center">&#36;'. $amount .'</td>';
    }
    $line .= '<tr>
    <td class="blanktotal" colspan="3" rowspan="6"></td>
    <td class="totals">Subtotal:</td>
    <td class="totals cost">&#36;'. $total .'</td>
    </tr>';
    $line .= '<tr>
    <td class="totals">Shipping:</td>
    <td class="totals cost">&#36;0</td>
    </tr>';
    $line .= '<tr>
    <td class="totals"><b>TOTAL:</b></td>
    <td class="totals cost"><b>&#36;'. $total .'</b></td>
    </tr>';
    return $line;
  }



  $html = '
  <html>
  
  <head>
      <style>
          body {
              font-family: sans-serif;
              font-size: 10pt;
          }
  
          p {
              margin: 0pt;
          }
  
          table.items {
              border: 0.1mm solid #000000;
          }
  
          td {
              vertical-align: top;
          }
  
          .items td {
              border-left: 0.1mm solid #000000;
              border-right: 0.1mm solid #000000;
          }
  
          table thead td {
              background-color: #EEEEEE;
              text-align: center;
              border: 0.1mm solid #000000;
              font-variant: small-caps;
          }
  
          .items td.blanktotal {
              background-color: #EEEEEE;
              border: 0.1mm solid #000000;
              background-color: #FFFFFF;
              border: 0mm none #000000;
              border-top: 0.1mm solid #000000;
              border-right: 0.1mm solid #000000;
          }
  
          .items td.totals {
              text-align: right;
              border: 0.1mm solid #000000;
          }
  
          .items td.cost {
              text-align: "."center;
          }
      </style>
  </head>
  
  <body>
      <!--mpdf
  <htmlpageheader name="myheader">
  <table width="100%">
    <tr>
      <td width="50%" style="color:#0000BB; ">
      <span style="font-weight: bold; font-size: 14pt;">Maria shop
      </span>
          <br />Av hassan 2<br />SAFI<br /><span
          style="font-family:dejavusanscondensed;">&#9742;</span> +212649118803</td>
      <td width="50%" style="text-align: right;">Invoice No.<br /><span
          style="font-weight: bold; font-size: 12pt;">'. $_GET['invoice'] . '</span></td>
    </tr>
    <tr>
    <td width="50%" style="text-align: right;">Status of order : <b>'. $dataForinvoice['status'] .'</b></td>

    </tr>
  </table>
  </htmlpageheader>
  <htmlpagefooter name="myfooter">
  <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
  Page {PAGENO} of {nb}
  </div>
  </htmlpagefooter>
  <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
  <sethtmlpagefooter name="myfooter" value="on" />
  mpdf-->
      <div style="text-align: right">Date: '. date('F j, Y', strtotime($dataForinvoice['created_at'])) .'</div>
      <table width="100%" style="font-family: serif;" cellpadding="10">
          <tr>
              <td width="45%" style="border: 0.1mm solid #888888;">
              <span
                      style="font-size: 7pt; color: #555555; font-family: sans;">SHIP TO:</span>
                      <br />
                      <label>Full name : </label>
                      <span>'.$dataForinvoice['firstname'].' '. $dataForinvoice['lastname'].'</span>
                      <br/>
                      <label>Address : </label>
                      <span>'. $dataForinvoice['address'].'</span>
                      <br/>
                      <label>Zip code : </label>
                      <span>'.$dataForinvoice['zip'].'</span>
              </td>
          </tr>
      </table>
      <br />
      <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
          <thead>
              <tr>
                  <td width="15%">Ref. No.</td>
                  <td width="10%">Quantity</td>
                  <td width="45%">Description</td>
                  <td width="15%">Unit Price</td>
                  <td width="15%">Amount</td>
              </tr>
          </thead>
          <tbody>
              <!-- ITEMS HERE -->
              '.productMpdf().'
             
             
             
             
             
              
             
          </tbody>
      </table>
      <div style="text-align: center; font-style: italic;">Payment terms: payment due in 30 days</div>
  </body>
  
  </html>
  ';
  
  $path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
  require_once $path . '../../../vendor/autoload.php';
  
  $mpdf = new \Mpdf\Mpdf([
    'margin_left' => 20,
    'margin_right' => 15,
    'margin_top' => 48,
    'margin_bottom' => 25,
    'margin_header' => 10,
    'margin_footer' => 10
  ]);
  
  $mpdf->SetProtection(array('print'));
  $mpdf->SetWatermarkText("MARIA-SHOP");
  $mpdf->showWatermarkText = true;
  $mpdf->watermark_font = 'DejaVuSansCondensed';
  $mpdf->watermarkTextAlpha = 0.1;
  $mpdf->SetDisplayMode('fullpage');
  
  $mpdf->WriteHTML($html);
  
  $mpdf->Output(''.$_GET["invoice"].'.pdf', 'I');
}




// send the order to costumer backoffice
if(isset($_GET['change_status'])){
   $checkTheOrder =  $crud->selectAll('orders', ['orderNumber' => $_GET['change_status']]);
   $newStatus = '';
   $changeStatus = $checkTheOrder[0]['status'];
   foreach($checkTheOrder as $orderStatus):
   
   
   if($changeStatus === "pending"){
      $newStatus = "shipped";
   }
  
   $orderStatus['status'] = $newStatus;
   $crud->update('orders', $orderStatus['idOrder'], $orderStatus, 'idOrder');
   endforeach;
   header('location:index.php');
   exit();
}


// info to costumer the order is shipped backoffice

if(isset($_GET['delivred'])){
  $checkDelivred = $crud->selectAll('orders', ['orderNumber' => $_GET['delivred']]);
  $Delivred = '';
  $actualStatus = $checkDelivred[0]['status'];
  foreach($checkDelivred as $deliv):
    if($actualStatus === "shipped"){
      $Delivred = "Delivred";
    }
    $deliv['status'] = $Delivred;
    $crud->update('orders', $deliv['idOrder'], $deliv, 'idOrder');
  endforeach;
    header('location:index.php');
    exit();
 
}

//payment COD 
$cardOfProductCart = $crud->selectAll('cart', ['idU' => $_SESSION['idU']]);

$errorCheckout = array();
if (isset($_POST['cod'])) {
    $errorCheckout = validateCheckout($_POST);
    if (count($errorCheckout) == 0) {
        $orderId =  $order->getOrderId('orders', '', 'idOrder');
        $orderNumber = $orderId['idOrder'];
        $orderIdF = $orderId['idOrder'];

        foreach ($cardOfProductCart as $cart) :
            $_POST['orderNumber'] =  'Mshop' . $orderIdF;
            $_POST['idP'] = $cart['idP'];
            $_POST['qte'] = $cart['qte'];
            $_POST['idU'] = $cart['idU'];
            $productDetail = $crud->selectOne('product', ['idP' => $cart['idP']]);
            $_POST['price'] = $cart['qte'] * $productDetail['Price'];
            unset($_POST['checkout'],  $_POST['paypal'], $_POST['state'], $_POST['country']);
            $_POST['cod'] = 1;
            $crud->create('orders', $_POST);
            $idCartTodelete = $cart['idCart'];
            $crud->delete('cart', 'idCart', $idCartTodelete);
        endforeach;

        header("location:thankyou.php?idOrder=Mshop$orderNumber");
        exit();
    }
}


//My account detail order 
$orderUserGroup = $order->getDiffNumOrderForUser('orders', 'orderNumber', $_SESSION['idU']);
$orderUserOne = $order->getOneProductQteForUser('orders', 'orderNumber', $_SESSION['idU']);