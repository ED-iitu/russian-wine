<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Mail\PersonalWineMail;
use App\Mail\TourMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public static function order($request)
    {

        Log::info($request);

        $order = new \stdClass();
        $order->name = $request['name'];
        $order->phone = $request['phone'];
        $order->email = $request['email'];
        $order->order_id = $request['order_id'];
        $order->orders = $request['orders'];
        $order->total = $request['total'];
        $order->type  = $request['type'] ?? null;
        $order->sender = env('MAIL_USERNAME');

        $from = "info@russianvine.ru";
        Log::info($order->email);
        Log::info(env('MAIL_USERNAME'));
        Mail::to([$request['email'], $from] )->send(new  OrderMail($order));
        return true;
    }

    public static function tour($request)
    {
        $order = new \stdClass();
        $order->name = $request['name'];
        $order->phone = $request['phone'];
        $order->sender = env('MAIL_USERNAME');
        Mail::to(env('MAIL_USERNAME'))->send(new  TourMail($order));
        return true;
    }

    public static function personalWine($request)
    {
        $message = new \stdClass();

        $message->name    = $request['name'];
        $message->contact = $request['contact'];
        $message->message = $request['message'];

        $to = "info@russianvine.ru";
        Log::info(env('MAIL_USERNAME'));

        Mail::to($to)->send(new  PersonalWineMail($message));
    }
}
