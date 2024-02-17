<?php
namespace Card;

use db\Queries;

class CartController
{
    private static $context;
    public function __construct()
    {
        self::$context = new Queries;
    }

    public function addCartOrItem($product_id)
    {
        $user_id = $_COOKIE['user_id'];
        $cart = self::$context->select(table: 'carts', where: ['user_id'=>$user_id], fetch: true);
        if ($cart['user_id'] == $user_id) {
            $quantityofitem = self::$context->select(table: 'items', where: ['product_id'=>$product_id], fetch: true);
            if ($quantityofitem != null) {
                $qoi = ($quantityofitem['quantity'] + 1);
                $item_result = slef::$context->update('items', ['quantity'=>$qoi], 'product_id=' . $product_id);
                return $item_result ? true : false;
            } else {
                $product_result = slef::$context->insert('items', ['quantity', 'product_id', 'cart_id'], [1, $product_id, $cart['cart_id']]);
                return $product_result ? true : false;
            }
        } else {
            $cart_result = slef::$context->insert('carts', ['user_id'], [$user_id]);
            if ($cart_result) {
                $item_result = slef::$context->insert('items', ['quantity', 'product_id', 'cart_id'], [1, $product_id, $cart['cart_id']]);
                return $item_result ? true : false;
            } else
                return false;
        }
    }

    public function show_product($product_id) {
        $show = self::$context->select(table: "products", where: ["product_id"=>$product_id], fetch: true);
        return $show;
    }

    public function show_items()
    {
        $user_id = $_COOKIE['user_id'];
        $cart = self::$context->select(table: 'carts', where: ['user_id'=>$user_id], fetch: true);
        $cart_id = $cart['cart_id'];
        $items = self::$context->select(table: 'items', where: ['cart_id'=>$cart_id]);
        return $items;
    }

    public function delete($item_id)
    {
        $items_array = self::$context->select(table: 'items');
        $quantity = $items_array['quantity'];

        if ($quantity > 0) {
            $qoi = ($items_array['quantity'] - 1);
            $result = self::$context->update('items', ['quantity'=>$qoi], "item_id=" . $item_id);
            return $result ? true : false;
        } else if ($quantity == 0) {
            self::$context->delete('items', 'item_id', $item_id);
            $result = self::$context->delete('carts', 'user_id', $_COOKIE['user_id']);
            return $result ? true : false;
        }
    }
}