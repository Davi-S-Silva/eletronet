<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Mikrotik\ApiMikrotik;

class ApiMikrotikController extends Controller
{
  public function getCountAllUserActive(){
    $Mikrotik = new ApiMikrotik();
      return $Mikrotik->getCountAllUserActive();
  }
}
