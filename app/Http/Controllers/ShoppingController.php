<?php

namespace App\Http\Controllers;



use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // Cart::destroy();
        return view('cart');
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
       // dd($request->all());
        $product=Product::find($request->product_id);
        $cartItem=Cart::add([
            'id'=>$product->id,
            'qty'=>$request->qty,
            'price'=>$product->price,
            'name'=>$product->name,
           // 'image'=>$product->image,

        ]);

        Cart::associate($cartItem->rowId, 'App\Product');
        //dd(Cart::content());
        return redirect()->route('cart.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Cart::remove($id);
        return redirect()->back();
    }
    public function increment($id,$qty){
        Cart::update($id,$qty+1);
        return redirect()->back();
    }
    public function decrement($id,$qty){
        Cart::update($id,$qty-1);
        return redirect()->back();
    }

    public function rapidAdd($id){
        // dd($request->all());
        $product=Product::find($id);
        $cartItem=Cart::add([
            'id'=>$product->id,
            'qty'=>1,
            'price'=>$product->price,
            'name'=>$product->name,
            // 'image'=>$product->image,

        ]);

        Cart::associate($cartItem->rowId, 'App\Product');
        //dd(Cart::content());
        return redirect()->back();
    }
}
