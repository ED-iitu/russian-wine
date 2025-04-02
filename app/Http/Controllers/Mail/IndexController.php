<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
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
        $order->sender = env('MAIL_USERNAME');

        Log::info($order->email);
        Log::info(env('MAIL_USERNAME'));
        Mail::to([$request['email'], env('MAIL_USERNAME')] )->send(new  OrderMail($order));
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
}
