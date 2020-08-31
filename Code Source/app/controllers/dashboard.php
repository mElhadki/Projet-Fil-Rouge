<?php

$crud = new CRUD();

//counting categories 

$category = $crud->selectAll('category');

$count_category = count($category);


//counting products 

$product = $crud->selectAll('product');

$count_product = count($product);


//counting orders 
$orderCountsDash = new Order();
$orders = $orderCountsDash->getOneProductQte('orders', 'orderNumber');
$ordersDiff = $orderCountsDash->getDiffNumOrder('orders', 'orderNumber');

$count_orders = count($orders) + count($ordersDiff);


//counting users 

$users = $crud->selectAll('users');

$count_users = count($users);
