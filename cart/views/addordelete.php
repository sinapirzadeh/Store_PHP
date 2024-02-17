<?php
use Card\CartController;

$cart = new CartController;
if (!empty($_GET['item_id'])) {
    $result = $cart->delete($_GET['item_id']);
    if ($result) {
        header('location: cart/views/cart.php');
    }
} else if (!empty($_GET['product_id'])) {
    $result = $cart->addCartOrItem($_GET['product_id']);
    if ($result) {
        header('location: cart/views/cart.php');
    }
}