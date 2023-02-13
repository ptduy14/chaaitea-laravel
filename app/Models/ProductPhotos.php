<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductPhotos extends Model
{
    use HasFactory;
    protected $table = 'table_product_photos';
    protected $primaryKey = 'product_photos_id';
    protected $fillable = ['product_photo_1st', 'product_photo_2nd', 'product_photo_3rd', 'product_photo_4th', 'product_id'];
    public $timestamps = true;

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
