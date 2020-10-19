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

}
