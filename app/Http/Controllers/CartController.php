<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App;
use Cart;

class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {

      $duplicates = Cart::search(function($cartItem, $rowId) use ($request) {
        return $cartItem->id === $request->id;
      });

      if ($duplicates->isNotEmpty()) {
        return redirect()->route('main.index', App::getLocale())->with('success', 'Этот товар уже есть в корзине!');
      }

      $product = Product::find($request->id);
      echo $product->image;

      Cart::add([
        'id' => $request->id,
        'name' => $request->name,
        'qty' => 1,
          'price' => $request->price,
        'options' => [
          'unit_price' => $product->price,
          'size' => $product->size,
          'wheel_radius' => $product->wheel_radius,
          'packaging' => $product->packaging,
          'color' => $product->color,
          'material' => $product->material,
          'image' => $product->image,
          'min_quantity' => $product->min_quantity
        ]
      ])->associate('App\Models\Product');
      return redirect()->route('main.index', App::getLocale())->with('success', 'Товар был добавлен в корзину!');
     }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $language, $id)
     {
      Cart::update($id, $request->quantity);
      session()->flash('success', 'auantity was updated successfuly');
      return response()->json(['success' => true, 'rowId' => $id]);
     }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request, $language, $id) {
      Cart::remove($id);
      return response()->json(['success' => true, 'rowId' => $id]);
     }

     public function empty(){
      Cart::destroy();
      return redirect()->route('main.index', App::getLocale());
     }

     public function getInfo($language) {
      return response()->json(
        [
        'success' => true,
        'total' => Cart::total(),
        'count' => Cart::count(),
        'all' => Cart::content()
         ]);
     }
}
