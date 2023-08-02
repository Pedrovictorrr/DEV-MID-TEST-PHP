<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Questions extends Controller
{
   public function Calculator(Request $request)
   {
    $teste = $request->all();

    return true;
   }
}
