<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    // public function show(Product $product)
    // {
    //     $product->load(['user']);
    //     return view('home.show', compact('product'));
    // }
}
