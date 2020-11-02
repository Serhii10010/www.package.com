<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Mail\OrderMail;

class CheckoutController extends Controller
{
  public function index(Request $request, $locale) {
    return redirect()->route('main.index', app()->getLocale())->with('order_open', 'order_open');
  }

  public function store(Request $request, $locale) {
    //
    // get info about customer
    // $name = $request->input('name');
    // $surname = $request->input('surname');
    // $phone = $request->input('phone');
    // $email = $request->input('email');
    //
    // if (!is_null($name) && !is_null($surname) && !is_null($phone)){
    //   $order['customer_info']['name'] = $name;
    //   $order['customer_info']['surname'] = $surname;
    //   $order['customer_info']['phone'] = $phone;
    //
    //   if (!is_null($email)) {
    //     $order['customer_info']['email'] = $email;
    //   }
    // } else {
    //   return 1; // returns error
    // }
    //
    // $order['cart']
    //
    //
    //
    //
    //
    // $isError = self::sendMessageToEmail($request);
    //
    // if ($isError == 'error'){
    //   return redirect()->route('main.index', app()->getLocale())->with('cart_error', 'cart_error');
    // }
    // self::addCartItemsToTables($request);
    // return redirect()->route('main.index', app()->getLocale());
    // return $request;
    return redirect()->route('catalog.items.info', app()->getLocale());
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

  $comment = $request->input('comment');
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
        'cart_products' => $cart_content,
        'total_price' => $cart_total,
        'count' => $cart_count,
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
