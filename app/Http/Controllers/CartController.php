<?php

namespace App\Http\Controllers;

use App\Models\OrdersModel;
use App\Models\ProductsModel;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function render(Request $request) {
        $cart = $request->session()->get('cart', []);

        $total = array_sum(array_map(function ($product) {
            return $product['price'] * $product['quantity'];
        }, $cart));

        return view('cart/index', [
            'cart' => $cart,
            'price_total' => $total
        ]);
    }

    public function addToCart(Request $request, ProductsModel $product): \Illuminate\Http\RedirectResponse
    {
        $quantity = $request->post('quantity', 1);

        $cart = $request->session()->get('cart', []);

        $cart[] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity
        ];

        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Товар успешно добавлен в корзину.');
    }

    public function checkout(Request $request): \Illuminate\Http\RedirectResponse
    {
        $cart = $request->session()->get('cart', []);

        if(!$cart) {
            return redirect()->back()->with('error', 'В корзине нет товаров.');
        }

        $total = array_sum(array_map(function ($product) {
            return $product['price'] * $product['quantity'];
        }, $cart));

        $order = OrdersModel::create([
            'price_total' => $total
        ]);

        foreach ($cart as $product) {
            $order->products()->attach($product['id'], ['quantity' => $product['quantity']]);
        }

        $request->session()->forget('cart');

        return redirect()->back()->with('success', 'Заказ успешно создан.');

//        return redirect()->route('orders.render')->with('success', 'Заказ успешно создан.');
    }
}
