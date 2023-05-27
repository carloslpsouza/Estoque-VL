<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function sessionDestroy($session){
        $tmp = strval($session);
        Session::forget($tmp);
        return redirect(Session::previousUrl());
    }
}
