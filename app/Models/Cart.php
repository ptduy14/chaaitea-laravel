<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $products = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($cart) {
        if ($cart) {
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }


    public function addCartItem($id, $product, $quantity = 0) {
        // init cart item
        $newCartItem = ['quantity'=> 0, 'price'=>$product->product_price, 'productInfo'=>$product];

        if (array_key_exists($id, $this->products)) {
            $newCartItem = $this->products[$id];
        }

        $quantity !== 0 ? $newCartItem['quantity'] += $quantity : $newCartItem['quantity']++;
        
        $newCartItem['price'] =  $product->product_price * $newCartItem['quantity'];
        $this->products[$id] = $newCartItem;
        $quantity !== 0 ? $this->totalPrice += $product->product_price * $quantity : $this->totalPrice += $product->product_price;
        $quantity !== 0 ? $this->totalQuantity += $quantity : $this->totalQuantity++;
    }

    public function deleteCartItem($id) {
        $currentCartItem = $this->products[$id];
        $this->totalPrice -= $currentCartItem['price'];
        $this->totalQuantity -= $currentCartItem['quantity'];
        unset($this->products[$id]);
    }

    public function updateCartItem($id, $quantity) {
        // đập đi xây lại
        $this->totalPrice -= $this->products[$id]['price'];
        $this->totalQuantity -= $this->products[$id]['quantity'];

        // cập nhật giá và số lượng mới của sản phẩm
        $this->products[$id]['quantity'] = $quantity;
        $this->products[$id]['price'] = $quantity * $this->products[$id]['productInfo']->product_price;

        // cập nhật lại giỏ hàng tổng
        $this->totalPrice += $this->products[$id]['price'];
        $this->totalQuantity += $this->products[$id]['quantity'];
    
    }
}
