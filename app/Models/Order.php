<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;
    
    protected $table = 'table_order';
    protected $primaryKey = 'order_id';
    protected $fillable = ['reciver', 'phone', 'address', 'total_money', 'order_date', 'order_status', 'method_payment', 'total_quantity','id'];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function product() {
        // nếu trong bảng trung gian có các thuột tính bổ sung thì phải sử dụng withPivot để định nghĩa nó
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withPivot('quantity');
        // ($model, bảng trung gian, $local_key, $orther_key);
    }
}
