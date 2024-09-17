<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;

class ProductsController extends Controller
{
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $products = ProductsModel::paginate(25);

        return view('products/index', [
            'products' => $products
        ]);
    }
}
