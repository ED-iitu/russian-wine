<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Set;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sets = Set::where('in_subscription', true)->limit(3)->get();
        $sale_set = Set::whereNotNull('sale')->first();
        return view('shop.subscription.index', [
            'sets' => $sets,
            'sale_set' => $sale_set
        ]);
    }

    public function save_question(Request $request)
    {
        $request->validate([
            'captcha' => 'required|captcha'
        ]);

        $saveRequest = new Order();

        if (filter_var($request['contact'], FILTER_VALIDATE_EMAIL)) {
            $saveRequest->email = $request['contact'];
        } else {
            $saveRequest->phone = $request['contact'];
        }
        $saveRequest->name = $request['name'];
        $saveRequest->type = Order::TYPE_QUESTION;
        $saveRequest->message = $request['message'];
        $saveRequest->save();
        $message = 'В ближайшее время свяжемся с Вами';
        return view('shop.checkout.success', [
            'message' => $message
        ]);
    }

}
