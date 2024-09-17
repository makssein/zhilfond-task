<?php

namespace App\Http\Controllers;

use App\Models\OrdersModel;

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

    public function delete(OrdersModel $order): \Illuminate\Http\RedirectResponse
    {
        $order->delete();

        return redirect()->route('orders.render')->with('success', 'Заказ успешно удалено.');
    }
}
