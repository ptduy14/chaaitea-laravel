<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductDetailFormRequest;
use App\Models\ProductDetail;

class ProductDetailController extends Controller
{
    public function createProductDetail($id) {
        $product = Product::find($id);

        return view('admin.product-detail.create', compact('product'));
    }

    public function storeProductDetail(ProductDetailFormRequest $request) {
        $request->validated();
        
        $product_detail = ProductDetail::create([
            'product_detail_intro' => $request->input('product_detail_intro'),
            'product_detail_desc' => $request->input('product_detail_desc'),
            'product_detail_weight' => $request->input('product_detail_weight'),
            'product_detail_mfg' => $request->input('product_detail_mfg'),
            'product_detail_exp' => $request->input('product_detail_exp'),
            'product_detail_origin' => $request->input('product_detail_origin'),
            'product_detail_manual' => $request->input('product_detail_manual'),
            'product_id' => $request->input('product_id')
        ]);

        $product_detail->save();

        return redirect('/admin/product')->with('toast_msg', 'New product detail has been added successfully');
    }

    public function indexProductDetail($id) {
        $product = Product::find($id);
        $product_detail = $product->productDetail;
        return view('admin.product-detail.index', compact('product_detail', 'product'));
    }

    public function editProductDetail($id) {
        $product_detail = ProductDetail::find($id);

        return view('admin.product-detail.edit', compact('product_detail'));
    }

    public function updateProductDetail(ProductDetailFormRequest $request, $id) {
        $request->validated();

        ProductDetail::where('product_detail_id', $id)->update([
            'product_detail_intro' =>  $request->input('product_detail_intro'),
            'product_detail_desc' => $request->input('product_detail_desc'),
            'product_detail_weight' => $request->input('product_detail_weight'),
            'product_detail_mfg' => $request->input('product_detail_mfg'),
            'product_detail_exp' => $request->input('product_detail_exp'),
            'product_detail_origin' => $request->input('product_detail_origin'),
            'product_detail_manual' => $request->input('product_detail_manual'),
        ]);

        return redirect('/admin/product')->with('toast_msg', 'Product detail update successfully');
    }
}
