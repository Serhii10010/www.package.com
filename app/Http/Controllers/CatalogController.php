<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
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
