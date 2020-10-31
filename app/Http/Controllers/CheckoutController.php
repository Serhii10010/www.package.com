<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Mail\SendOrderDetails;

class CheckoutController extends Controller
{
  public function index(Request $request)
  {
    return redirect()->route('main.index', app()->getLocale())->with('open_cart', 'open_cart');
  }

  public function store(Request $request)
  {
    $isError = self::sendMessageToEmail($request);
    if ($isError == 'error'){
      return redirect()->route('main.index', app()->getLocale())->with('cart_error', 'cart_error');
    }
    self::addCartItemsToTables($request);
    return redirect()->route('main.index', app()->getLocale());
  }

  public function addCartItemsToTables(Request $request) {
    $cart_content = [];
    $two_zeros  = ".00";
    $space = " ";
    $cart_total = '100000000000000000000000';
    $zeros_pos = stripos($cart_total, $two_zeros);
    $space_pos = stripos($cart_total, $space);
    if ($space_pos !== false){
      $cart_total = str_replace(" ", "", $cart_total);
    }

    if ($zeros_pos !== false){
      $cart_total = str_replace(".00", ".0", $cart_total);
    }
    $customer_phone = $request->input('tel');
    $customer_phone = str_replace(" ", "", $customer_phone);
    $customer_phone = str_replace("-", "", $customer_phone);
    $customer_phone = str_replace(")", "", $customer_phone);
    $customer_phone = str_replace("(", "", $customer_phone);

    DB::insert('insert into customers(name, surname, otchestvo, email, phone) VALUES (\''.$request->input('name').'\', \''.$request->input('surname').'\', \''.$request->input('patronimic').'\',\''.$request->input('email').'\',\''.$customer_phone.'\')');
    $customer_id = DB::select('select last_insert_customer_id()');
    foreach ($customer_id as $item) {$customer_id = $item->last_insert_customer_id;}
    DB::insert('insert into orders(customer_id, order_type, total_price, delivery_way, delivery_city, delivery_address, additional_info) values ('.$customer_id.', \'order\','.$cart_total.', \''.$request->input('delivery_method').'\', \''.$request->input('delivery_city').'\', \''.$request->input('delivery_address').'\', \''.$request->comment.'\')');
    $order_id = DB::select('select id from orders where customer_id = '.$customer_id);
    foreach ($order_id as $item) {$order_id = $item->id;}
    foreach ($cart_content as $item) {
      DB::insert('insert into order_details(order_id, product_id, quantity, unit_price) values (\''.$order_id.'\',\''.$item->id.'\',\''.$item->qty.'\',\''.$item->options->unit_price.'\')');
    }
  }

  public function sendMessageToEmail(Request $request) {
    $patronymic = $request->input('patronimic');
    $name = $request->input('name');
    $surname = $request->input('surname');
    $tel = $request->input('tel');
    $email = $request->input('email');
    $comment = $request->comment;
    $delivery = $request->input('delivery_method');
    if($delivery == 'null'){
      return 'error';
    }
    switch ($delivery) {
      case 'NP':
          if($request->area_name == 'null' || $request->delivery_city == 'null' || $request->delivery_address == 'null'){
            return 'error';
          }
          $arr = [
            'success' => true,
            'theme' => 'order',
            'tel' => $tel,
            'name' => $name,
            'surname' => $surname,
            'patronymic' => $patronymic,
            'email' => $email,
            'comment' => $comment,
            'delivery' =>
            [
              'delivery_way' => 'NovaPoshta',
              'area_name' => $request->area_name,
              'city_name' => $request->delivery_city,
              'warehouse' => $request->delivery_address
            ],
            'cart_products' => Cart::content(),
            'total_price' => Cart::total(),
            'count' => Cart::count(),
          ];

          // Mail::to(config('mail.from.address', ''))
          Mail::to('serhii10010@gmail.com')
          ->send(new SendOrderDetails($arr));
          break;
      case 'Pickup':
          echo "Pickup";
          break;
      case 'Delivery':
          echo "Delivery";
          break;
      case 'CAT':
          echo "CAT";
          break;
      case 'ukrPoshta':
          echo "ukrPoshta";
          break;
    }
  }
}
