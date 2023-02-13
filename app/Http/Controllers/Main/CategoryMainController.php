<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryMainController extends Controller
{
    public function productsOfCategory($id) {
        $category = Category::where('category_status','=', 1)->get();
        
        $products = Product::where('product_status', 1)->where('category_id', $id)->get();
        
        $cate = Category::find($id);

        $title = 'Các chuyên gia của ChaiiTea đã đi khắp các vùng trà từ Tây Bắc, Thái Nguyên đến Bảo Lộc để lựa chọn ra 12 loại trà xanh cao cấp nhất Việt Nam để tổng hợp nên bộ sản phẩm này';
        
        return view('main.category.index', compact('category', 'products', 'cate', 'title'));
    }

    public function sortProductsOfCategory($id, $type) {
        switch ($type) {
            case 'default':
                $products = Product::where('product_status','=', 1)
                                    ->where('category_id', $id)->get();
                break;
            
            case 'price-asc':
                $products = Product::where('product_status','=', 1)
                                    ->where('category_id', $id)
                                    ->orderBy('product_price', 'ASC')
                                    ->get();
                break;    
            
            case 'price-desc':
                $products = Product::where('product_status','=', 1)
                                    ->where('category_id', $id)
                                    ->orderBy('product_price', 'DESC')
                                    ->get();
                break;  
            default:
                # code...
                break;
        }

        return view('main.products.products', compact('products'));
    }

    public function seachProductsOfCategory($id, $content) {
        $products = Product::where('category_id', $id)
                            ->where('product_status', 1)
                            ->where('product_name', 'like', '%' . $content . '%')->get();
                            
        return view('main.products.products', compact('products'));                       
    }

    public function filterProductsOfCategory($id, $price_start, $price_end) {

        $price_start = (int)$price_start * 1000;
        $price_end = (int)$price_end * 1000;

        $products = Product::where('category_id', $id)
                            ->where('product_status', 1)
                            ->whereBetween('product_price', [$price_start, $price_end])->get();

        return view('main.products.products', compact('products'));                   
    }
}
