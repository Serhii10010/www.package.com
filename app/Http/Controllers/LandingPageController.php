<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Partner;
use Cart;
use App;

class LandingPageController extends Controller
{
  public function index()
  {
    if(App::getLocale() == 'ua'){
      $products = Product::where('language', 'ua')->get();
    } else {
      $products = Product::where('language','ru')->get();
    }
    $portfolios = Portfolio::inRandomOrder()->get();
    $reviews = Review::inRandomOrder()->get();
    $partners = Partner::inRandomOrder()->get();
    $cartItems = Cart::content();

    return view('main',
    [
      'products' => $products,
      'portfolios' => $portfolios,
      'reviews' => $reviews,
      'partners' => $partners,
      'cartItems' => $cartItems
    ]);
  }
}
