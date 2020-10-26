<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App;


class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(App::getLocale() == 'ua'){
        $catalogItems = Product::where('language', 'ua')->get();
      } else {
        $catalogItems = Product::where('language','ru')->get();
      }
      return response()->json([
          'success' => true,
          'catalogItems' => $catalogItems
        ]);
    }

    public function itemsInfo(Request $request, $language) {
      $ids =  $request->ids;
      if ($ids != []) {
        foreach ($ids as $id) {
          $product = Product::where('id', $id)->get();
          $products[$id] = $product;
        }
        return $products;
      } else {
        return null;
      }
    }

}
