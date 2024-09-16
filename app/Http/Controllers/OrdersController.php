<?php

namespace App\Http\Controllers;

use App\Models\OrdersModel;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $orders = OrdersModel::with('products')->get();
        $total = $orders->sum('price_total');

        return view('orders/index', [
            'orders' => $orders,
            'price_total' => $total
        ]);
    }
}
