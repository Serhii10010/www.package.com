<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\SimpleMail;
use App\Models\Customer;

class MessageoutController extends Controller
{
  public function sendToTelegramAndEmail(Request $request){
    $token = "1354049520:AAHYobbjyhV2O2EUcjjmgRyJF9TrnObAGCM";
    $chatId = '491067254';

    $phone = $request->phone;
    $checkbox = $request->checkbox;
    $theme = $request->message_theme;
    $name = $request->name;

    $symbols = array(" ", "-", "+", ")", "(", "'", "\"");
    $phone = str_replace($symbols, "", $phone);

    if ($checkbox == null) {
      $txt = "<b>Message theme: </b>".$theme.".<pre language=\"php\">\r</pre><b>Customer's name: </b>".$name.".<pre language=\"php\">\r</pre><b>Customer's number: </b>".$phone.".";
    } else {
      $txt = "<b>Message theme: </b>".$theme.".<pre language=\"php\">\r</pre><b>Customer's name: </b>".$name.".<pre language=\"php\">\r</pre><b>Customer's number: </b>".$phone.".<pre language=\"php\">\r</pre><b>Checkbox:</b>".$checkbox.".";
    }

    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chatId}&parse_mode=html&text={$txt}","r");

    $arr = [
      'theme' => $theme,
      'phone' => $phone,
      'name' => $name,
      'checkbox' => $checkbox
    ];

    // Mail::to('serhii10010@gmail.com')
    // ->send(new SimpleMail($arr));

    return redirect()->route('main.index', app()->getLocale());
  }
}
