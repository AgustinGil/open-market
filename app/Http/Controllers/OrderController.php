<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreated;
use App\Mail\OrderMail;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $id)
    {

        return view('order/create', ['product' => Product::with(['images', 'reviews', 'category'])->find($id)]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderAttributes = $request->validate([
            'user_id' => ['required'],
            'product_id' => ['required'],
            'amount' => ['required'],
            'street_address' => ['required'],
            'city' => ['required'],
            'phone' => ['required'],
        ]);


        $order = Order::create($orderAttributes);
        Mail::to($order->user->email)->send(
            new OrderCreated($order)
        );
        flash('Su orden se ha realizado con exito, consulte su email para mas informacion.');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
