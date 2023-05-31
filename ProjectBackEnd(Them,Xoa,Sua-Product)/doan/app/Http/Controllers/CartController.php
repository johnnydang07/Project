<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use Cart;
use Illuminate\Http\Request;
use Session;
session_start();

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('carts.show');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tt = 0;
        $productId = $request->id;
        $qty = $request->quantity;
        $size = $request->size;
        $product = Product::find($productId);
        $tt = $product->price - $product->disprice;
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $tt,
            'qty' => $qty,
            'weight' => 0,
            'options' => ['size' => $size],
        ]);
        return redirect()->route('carts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {

        return view('carts.show', ['cart' => $cart]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cart::update($id,0);
        return redirect()->route('carts.index');
    }
}
