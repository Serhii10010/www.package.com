<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMail;
use App\Models\Customer;
use App\Setters\EnvironmentSetter;


class MessageOutController extends Controller
{
  public function sendToTelegramAndEmail(Request $request){
    // $email = config('mail.from.address');
    // $emailTo = env('mail.from.address');
    // echo config('mail.from.address');
    // echo config('mail.mailers.username');
    // echo config('mail.mailers.password');
    // echo config('mail.to.address');
    // echo $email;

    // $customer_phone = $request->input('tel');
    // $customer_phone = str_replace(" ", "", $customer_phone);
    // $customer_phone = str_replace("-", "", $customer_phone);
    // $customer_phone = str_replace(")", "", $customer_phone);
    // $customer_phone = str_replace("(", "", $customer_phone);
    // $checkbox = $request->input('checkbox');
    //
    // DB::insert('insert into customers(name, phone) VALUES (\''.$request->input('name').'\',\''.$customer_phone.'\')');
    // $customer_id = DB::select('select last_insert_customer_id()');
    // foreach ($customer_id as $item) {$customer_id = $item->last_insert_customer_id;}
    // DB::insert('insert into orders(customer_id, order_type, additional_info) values ('.$customer_id.', \''.$request->message_theme.'\', \''.$checkbox.'\')');

    // $token = DB::select('select info from settings_for_site where type_info = \'telegram_bot_token\'');
    // foreach ($token as $item) {$token = $item->info;}
    // $chat_id = DB::select('select info from settings_for_site where type_info = \'telegram_chat_id_message_handler\'');
    // foreach ($chat_id as $item) {$chat_id = $item->info;}
    // $token = "1354049520:AAHYobbjyhV2O2EUcjjmgRyJF9TrnObAGCM";
    // $chat_id = '491067254';
    //
    // $txt = "<b>Message theme: </b>".$request->message_theme.".<pre language=\"php\">\r</pre><b>Customer's name: </b>".$request->name.".<pre language=\"php\">\r</pre><b>Customer's number: </b>".$request->tel.".<pre language=\"php\">\r</pre><b>Checkbox:</b>".$checkbox.".";
    // $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

    // $arr = [
    //   'theme' => 'theme',
    //   'tel' => 'tel',
    //   'name' => 'name',
    //   'email' => 'email',
    //   'checkbox' => 'checkbox'
    // ];
    //
    // Mail::to(config('mail.from.address'))
    // ->send(new SendMail($arr));

    // return redirect()->route('main.index', app()->getLocale());
  }
}
