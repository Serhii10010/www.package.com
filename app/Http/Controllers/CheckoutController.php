<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderMail;
use Carbon\Carbon;

class CheckoutController extends Controller
{
  public function index(Request $request, $locale) {
    return redirect()->route('main.index', app()->getLocale())->with('order_open', 'true');
  }

  public function store(Request $request, $locale) {
    $form = $request->form;
    $cart = $request->cart;

    // get info about customer
    $name = $form['name'];
    $surname = $form['surname'];
    $phone = $form['phone'];
    $email = $form['email'];

    // get info about delivery
    $deliveryWay = $form['delivery_way'];
    $deliveryArea = $form['area'];
    $deliveryCity = $form['city'];
    $deliveryAddress = $form['address'];

    //get comment
    $comment = ($form['comment'] == null) ? "" : $form['comment'];

    //getting cart info
    $cartTotal = $request->total_price;
    $elementsCount = $request->elements_count;

    $symbols = array(" ", "-", "+", ")", "(", "'", "\"");

    //phone proccesing
    $phone = str_replace($symbols, "", $phone);

    //delivery info proccesing
    $deliveryArea = str_replace($symbols, "", $deliveryArea);
    $deliveryCity = str_replace($symbols, "", $deliveryCity);
    $deliveryAddress = str_replace($symbols, "", $deliveryAddress);

    //adding info to database
    DB::beginTransaction();

    try {
      DB::insert('insert into customers(name, surname, email, phone) VALUES (\''.$name.'\', \''.$surname.'\', \''.$email.'\',\''.$phone.'\')');
      $customerId = DB::select('select last_insert_customer_id()');
      foreach ($customerId as $item) {$customerId = $item->last_insert_customer_id;}
      DB::insert('insert into orders(customer_id, order_type, total_price, delivery_way, delivery_area, delivery_city, delivery_address, additional_info) values ('.$customerId.', \'order\','.$cartTotal.', \''.$deliveryWay.'\', \''.$deliveryArea.'\', \''.$deliveryCity.'\', \''.$deliveryAddress.'\', \''.$comment.'\')');
      $orderId = DB::select('select id from orders where customer_id = '.$customerId);
      foreach ($orderId as $item) {$orderId = $item->id;}
      foreach ($cart as $item) {
        DB::insert('insert into order_details(order_id, product_id, quantity, unit_price) values (\''.$orderId.'\',\''.$item['productId'].'\',\''.$item['count'].'\',\''.$item['price'].'\')');
      }

      DB::commit();
      // all good
    } catch (\Exception $e) {
        DB::rollback();
        // something went wrong
    }

    //sending mail to shop assistant with whole order info
    $orderInfo = [
      'theme' => 'order',
      'phone' => $phone,
      'name' => $name,
      'surname' => $surname,
      'email' => $email,
      'comment' => $comment,
      'delivery' =>
      [
        'delivery_way' => $deliveryWay,
        'area' => $deliveryArea,
        'city' => $deliveryCity,
        'address' => $deliveryAddress
      ],
      'cart' => $cart,
      'cart_total' => $cartTotal,
      'count' => $elementsCount
    ];

    Mail::to('serhii10010@gmail.com')
    ->send(new OrderMail($orderInfo));

    // sending response - ok
    return 1;
  }
}
