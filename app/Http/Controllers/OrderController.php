<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()->orderBy('name')->paginate(25);
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        return view('order.create',['products' => Product::orderBy('name')->pluck('name', 'id')]);
    }


    public function store(OrderRequest $request)
    {

        $data = $request->validated();
        $order = Order::create([
            ...\Illuminate\Support\Arr::except(
            $data,
            ['products']
            )
        ]);
        $order->products()->sync(
            $data['products'] ?? []
        );
        return redirect()->route('order.show', $order);
    }

    public function show(Order $order)
    {
        return view('order.show',['order'=>$order,
        'products' => Product::pluck('name','id')]);
    }

    public function edit(Order $order)
    {
        return view('order.edit',[
        'order'=>$order,
        'products' => Product::pluck('name','id'),
        'selected'=>$order->products->pluck('id')->all()]);
    }

    public function update(
        OrderRequest $request,
        Order  $order
    ) {

        $data = $request->validated();
        $order->update(
            \Illuminate\Support\Arr::except(
            $data,
            ['products']
            )
        );
        $order->products()->sync(
        $data['products'] ?? []
        );
        return redirect()->route('order.show', $order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index');
    }
}
