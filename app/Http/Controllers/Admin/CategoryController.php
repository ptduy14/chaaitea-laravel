<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();

        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storagOrderManagerControllere.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        $request->validated();

        $category = Category::create([
            'category_name' => $request->input('category_name'),
            'category_desc' => $request->input('category_desc'),
            'category_status' => $request->input('category_status')
        ]);
        $category->save();

        // this func will redirect to route(/admin/category) with session flag data "toast_msg";
        // after reload session flag data with be delete, very useful !!
        return redirect('/admin/category')->with('toast_msg', 'New category has been added successfully');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // show products in category
        $category = Category::find($id);
        $product_of_cate = $category->product;
        
        if ($product_of_cate->count() == 0) {
            return redirect('/admin/category')->with('toast_msg', 'There arent any products in this category, please go to the products tab to add more products');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        
        return view('admin.category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormRequest $request, $id)
    {
        $request->validated();

        Category::where('category_id', $id)->update([
            'category_name' => $request->input('category_name'),
            'category_desc' => $request->input('category_desc'),
            'category_status' => $request->input('category_status'),
        ]);

        return redirect('/admin/category')->with('toast_msg', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $product = $category->product;

        if ($product->count() > 0) {
            return redirect('/admin/category')->with('toast_msg', 'this category cannot be deleted, there are some products still in the category');
        } else {
            $product = Category::where('category_id', $id)->delete();
            return redirect('/admin/category')->with('toast_msg', 'Delete successfully');
        }
    }

    public function indexProductInCate($id){
        $category = Category::find($id);
        $products = $category->product;

        return view('admin.category.index-product', compact('products'));
    }
}
