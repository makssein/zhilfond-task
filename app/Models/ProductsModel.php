<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price'
    ];

    public function orders() {
        return $this->belongsToMany(OrdersModel::class)->withPivot('quantity')->withTimestamps();
    }
}
