<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index() {

        $category = Category::where('category_status','=', 1)->get();
        $products = Product::where('product_status','=', 1)->get();

        return view('main.pages.home', compact('category', 'products'));
    }

    public function indexProductDetail($id) {
        $category = Category::where('category_status','=', 1)->get();
        $all_products = Product::where('product_status','=', 1)->get();
        $product = Product::find($id);
        $random_products = Product::where('product_status','=', 1)->inRandomOrder()->get();
        $product_photo = $product->productPhotos;
        $product_detail = $product->productDetail;

        return view('main.pages.product-detail', compact('category', 'product', 'all_products', 'product_photo', 'product_detail', 'random_products'));
    }
}
