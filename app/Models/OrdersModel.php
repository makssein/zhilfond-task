<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersModel extends Model
{
    use SoftDeletes;

    protected $table = 'orders';
    protected $fillable = [
        'price_total'
    ];

    public function products() {
        return $this->belongsToMany(ProductsModel::class, 'order_product', 'order_id', 'product_id')->withPivot('quantity')->withTimestamps();
    }
}
