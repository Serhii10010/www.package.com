<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index(Request $request, $language){
      switch ($request->type_info) {
        case 'np_api_key':
            $np_api_key = DB::select('select info from settings_for_site where type_info = \'np_api_key\'');
            foreach ($np_api_key as $item) {$np_api_key = $item->info;}
            return response()->json(
              [
              'success' => true,
              'key' => $np_api_key
               ]
            );
            break;
        default:
          return response()->json(
            [
            'success' => false,
            'info' => 'error!!!!!!!!!!!'
             ]
           );
          break;
      }
    }
}
