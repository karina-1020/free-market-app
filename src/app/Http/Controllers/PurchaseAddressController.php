<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;   
use App\Models\Product;

class PurchaseAddressController extends Controller
{
    public function edit(Product $product)
    {
        return view('purchases.address', compact('product'));
    }
}