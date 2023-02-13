<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index() {
        $category = Category::where('category_status','=', 1)->get();
        $products = Product::where('product_status','=', 1)->get();

        return view('main.products.index', compact('category', 'products'));
    }

    public function sortProducts($type) {
        switch ($type) {
            case 'default':
                $products = Product::where('product_status','=', 1)->get();
                break;
            
            case 'price-asc':
                $products = Product::where('product_status','=', 1)
                                    ->orderBy('product_price', 'ASC')->get();
                break;    
            
            case 'price-desc':
                $products = Product::where('product_status','=', 1)
                                    ->orderBy('product_price', 'DESC')->get();
                break;  
            default:
                # code...
                break;
        }

        return view('main.products.products', compact('products'));
    }

    public function searchProducts($content) {
        $products = Product::where('product_name', 'like', '%' . $content . '%')->where('product_status', 1)->get();
        return view('main.products.products', compact('products'));
    }

    public function filterProductsPrice($price_start, $price_end) {
        $price_start = (int)$price_start * 1000;
        $price_end = (int)$price_end * 1000;

        $products = Product::whereBetween('product_price', [$price_start, $price_end])
                            ->where('product_status', 1)
                            ->get();

        return view('main.products.products', compact('products'));
    }
}
