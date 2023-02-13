<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductDetail;
use App\Models\ProductPhotos; 
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        foreach ($products as $product) {
            $product_detail = $product->productDetail;
        }

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $request->validated();

        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'product_price' => $request->input('product_price'),
            'category_id' => $request->input('category_id'),
            'product_status' => 0
        ]);
        $product->save();

        return redirect('/admin/product')->with('toast_msg', 'New product has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();

        return view('admin.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        $request->validated();
        
        $product = Product::where('product_id', $id)->update([
            'product_name' => $request->input('product_name'),
            'product_price' => $request->input('product_price'),
            'category_id' => $request->input('category_id'),
            'product_status' => $request->input('product_status') || 0,
        ]);

        return redirect('/admin/product')->with('toast_msg', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_photos = ProductPhotos::where('product_id', $id)->first();

        if ($product_photos != null) {
           File::delete('upload/imag es/product-imgs/'. $product_photos->product_photo_1st);
           File::delete('upload/images/product-imgs/'. $product_photos->product_photo_2nd);
           File::delete('upload/images/product-imgs/'. $product_photos->product_photo_3rd);
           File::delete('upload/images/product-imgs/'. $product_photos->product_photo_4th);
        }

        Product::where('product_id', $id)->delete();
        ProductDetail::where('product_id', $id)->delete();
        ProductPhotos::where('product_id', $id)->delete();

        return redirect('/admin/product')->with('toast_msg', 'Delete successfully');
    }
}
