<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Notifications\TelegramAboutNotification;
use App\Notifications\TelegramStartNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class TelegramController extends Controller
{
    protected $chat_id;

    public function __construct(){
        Auth::loginUsingId(1);
        $this->chat_id = Auth::user()->telegram->chat_id;;
    }

    public function index(){
        return Notification::route('telegram', $this->chat_id)->notify(new TelegramStartNotification($this->chat_id));
    }

    public function user(){
        return Notification::route('telegram', $this->chat_id)->notify(new TelegramAboutNotification($this->chat_id));
    }
}
