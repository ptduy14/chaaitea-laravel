<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;

class CartDetailController extends Controller
{
    public function index() {
        $category = Category::where('category_status','=', 1)->get();
        $products = Product::where('product_status','=', 1)->get();

        return view('main.pages.cart-detail-container', compact('category', 'products'));
    }
}
