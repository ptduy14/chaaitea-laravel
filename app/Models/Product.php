<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductDetail;
use App\Models\Category;
use App\Models\ProductPhotos;
use App\Models\Order;


class Product extends Model
{
    use HasFactory;
    protected $table = 'table_product';
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_name', 'product_price', 'product_status', 'category_id'];
    public $timestamps = false;

    public function productDetail() {
        return $this->hasOne(ProductDetail::class, 'product_id', 'product_id');
        // select * from `product_detail` where product_id = product_id;
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function productPhotos() {
        return $this->hasOne(ProductPhotos::class, 'product_id', 'product_id');
    }

    public function order() {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')->withPivot('quantity');
        // ($model, bảng trung gian, $local_key, $order_key);
    }
}
