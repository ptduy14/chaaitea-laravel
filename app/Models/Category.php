<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    protected $table = 'table_category';
    protected $primaryKey = 'category_id';
    protected $fillable  = ['category_name', 'category_desc', 'category_status'];
    public $timestamps = true;

    public function product() {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}

