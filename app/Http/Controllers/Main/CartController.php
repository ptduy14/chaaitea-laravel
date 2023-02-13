<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    public function addNewcartItemGET($id) {
        $product = Product::find($id);

        // lấy cart cũ ra nếu có
        $oldCart = Session()->has('cart') ? Session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addCartItem($id, $product);
        
        Session()->put('cart', $cart);
        Session()->save();

        
        return ([
            'viewCartFixed' => view('main.layouts.cartlist')->render(),
            'viewCartDetailTable' => view('main.pages.cart-table-component')->render(),
            'viewCartDetailInfo' => view('main.pages.cart-info-component')->render(),
            'quantity' =>  Session()->get('cart')->totalQuantity
        ]);
    }

    public function addNewcartItemPOST($id, Request $request) {
        $product = Product::find($id);
        $quantinty = $request->input('quantity');
        // lấy cart cũ ra nếu có
        $oldCart = Session()->has('cart') ? Session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addCartItem($id, $product, $quantinty);
        
        Session()->put('cart', $cart);
        Session()->save();
        
        return redirect('/cart-detail');
    }

    public function delCartItem($id) {

        $oldCart = Session()->has('cart') ? Session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->deleteCartItem($id);
        
        Session()->put('cart', $cart);

        Session()->save();

        return ([
            'viewCartFixed' => view('main.layouts.cartlist')->render(),
            'viewCartDetailTable' => view('main.pages.cart-table-component')->render(),
            'viewCartDetailInfo' => view('main.pages.cart-info-component')->render(),
            'quantity' =>  Session()->get('cart')->totalQuantity
        ]);

    }

    public function editCartItem($id, $quantity) {

        $oldCart = Session()->has('cart') ? Session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateCartItem($id, $quantity);

        Session()->put('cart', $cart);

        Session()->save();

        return ([
            'viewCartFixed' => view('main.layouts.cartlist')->render(),
            'viewCartDetailTable' => view('main.pages.cart-table-component')->render(),
            'viewCartDetailInfo' => view('main.pages.cart-info-component')->render(),
            'quantity' =>  Session()->get('cart')->totalQuantity
        ]);
    }

    public function indexCart() {
        return ([
            'viewCartFixed' => view('main.layouts.cartlist')->render(),
            'viewCartDetailTable' => view('main.pages.cart-table-component')->render(),
            'viewCartDetailInfo' => view('main.pages.cart-info-component')->render(),
            'quantity' => Session()->has('cart') ? Session()->get('cart')->totalQuantity : 0
        ]);
    }
}
