<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\OrderRequest;
use App\Mailers\OrderMail;

class MarketController extends Controller
{
    public function product(int $id = -1)
    {
        if($id != 1) return view('not-found');
        return view('product', ['cost' => 1000, 'name' => "Джинси", 'photo' => "images/product/1.jpg", 'id' => $id] );
    }

    public function productOrder(OrderRequest $request)
    {
        Mail::to($request->validated('email'))->send(
            new OrderMail($request, "Джинси", 1000, "images/product/1.jpg")
        );
        return view(
            'product-order',
            [...$request->validated(), 'product_cost' => 1000, 'product_name' => "Джинси", 'product_photo' => "images/product/1.jpg"]
        );
    }
}
