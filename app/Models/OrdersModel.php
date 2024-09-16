<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'price_total'
    ];

    public function products() {
        return $this->belongsToMany(ProductsModel::class)->withPivot('quantity')->withTimestamps();
    }
}
