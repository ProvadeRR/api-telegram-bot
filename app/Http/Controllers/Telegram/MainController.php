<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;

class MainController extends Controller
{

    /**
     * @return View
     */
    public function index(){
        return view('welcome');
    }
}
