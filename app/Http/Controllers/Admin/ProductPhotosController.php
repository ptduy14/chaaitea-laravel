<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductPhotosFormRequest;
use App\Models\ProductPhotos;
use Illuminate\Support\Facades\File;

class ProductPhotosController extends Controller
{
    public function createProductPhotos($id) {
        $product = Product::find($id);

        return view('admin.product-photos.create', compact('product'));
    }

    public function storeProductPhotos(ProductPhotosFormRequest $request,$id) {
        $request->validated();

        /* nếu sử dụng method store thì tên file sẽ được tạo ngẫu nhiên => không kiểm soát được mặt
        yêu cầu tên file trong DB trùng với Local file => giải pháp: sử dụng storeAs để custom tên 
        path lưu vào DB */

        $request->file('product_photo_1st')->move('upload/images/product-imgs', $request->file('product_photo_1st')->getClientOriginalName());
        $request->file('product_photo_2nd')->move('upload/images/product-imgs', $request->file('product_photo_2nd')->getClientOriginalName());
        $request->file('product_photo_3rd')->move('upload/images/product-imgs', $request->file('product_photo_3rd')->getClientOriginalName());
        $request->file('product_photo_4th')->move('upload/images/product-imgs', $request->file('product_photo_4th')->getClientOriginalName());

        $product_photos = ProductPhotos::create([
            'product_photo_1st' => $request->file('product_photo_1st')->getClientOriginalName(),
            'product_photo_2nd' => $request->file('product_photo_2nd')->getClientOriginalName(),
            'product_photo_3rd' => $request->file('product_photo_3rd')->getClientOriginalName(),
            'product_photo_4th' => $request->file('product_photo_4th')->getClientOriginalName(),
            'product_id' => $request->input('product_id')
        ]);

        return redirect('/admin/product')->with('toast_msg', 'New photo has been added successfully');
    }

    public function indexProductPhotos($id) {
        $product = Product::find($id);

        $product_photo = $product->productPhotos;

        return view('admin.product-photos.index', compact('product_photo' ));
    }

    public function updateProductPhotos(Request $request, $id) {
        $product_photos = ProductPhotos::find($id);
        $db_field = $request->input('input-field');

        if ($request->hasFile('img-changed')) {
            $destinition_path = 'upload/images/product-imgs/'.$product_photos->$db_field;

            if (File::exists($destinition_path)) {
                File::delete($destinition_path);
            }

            // lưu new img vào local bằng method move($path, $nameFile)
            $request->file('img-changed')->move('upload/images/product-imgs', $request->file('img-changed')->getClientOriginalName());

            // update tên file vào db
            $product_photos->$db_field = $request->file('img-changed')->getClientOriginalName();
            $product_photos->save();

            $toast_msg = 'New photo has been change successfully';
            $toast_modify = 'success';

            return redirect()->back()->with(compact('toast_msg', 'toast_modify'));

        } else {

            $toast_msg = 'Something is wrong please try agian';
            $toast_modify = 'danger';

            return redirect()->back()->with(compact('toast_msg', 'toast_modify'));
        }

    }
}
