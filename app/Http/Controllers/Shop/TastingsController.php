<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Tasting;
use App\Models\TastingMethod;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\TastingMail;
use Illuminate\View\View;


class TastingsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $comments = Comment::where('status', '=', 'ACTIVE')->get();
        $methods = TastingMethod::all();
        $tastings = Tasting::where('in_home', false)->get();
        return view('shop.tasting.index', [
            'comments'  => $comments,
            'methods' => $methods,
            'tastings' => $tastings,
        ]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function checkout(Request $request)
    {
        $tasting = Tasting::where('id', $request['tasting'])->firstOrFail();
        $form_url = route('tasting_order');
        $input_hidden = $request['tasting'];
        return view('shop.checkout.index', [
            'total_price' => $tasting->price,
            'form_url' => $form_url,
            'input_hidden' => $input_hidden,
        ]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function order(Request $request)
    {
        $tasting = Tasting::where('id', '=', $request['checkout_id'])->firstOrFail();
        $message_info = 'Название: <b>' . $tasting->title . '</b> Цена: <b>' . $tasting->price;
        $request_info = ['tasting_id' => $tasting->id, 'title' => $tasting->title, 'price' => $tasting->price, 'qty' => 1];
        $saveRequest = new Order();
        $saveRequest->name = $request['name'];
        $saveRequest->phone = $request['phone'];
        $saveRequest->email = $request['email'];
        $saveRequest->type = Order::TYPE_TASTING;
        $saveRequest->message = $message_info;
        $saveRequest->request = json_encode($request_info);
        $saveRequest->save();
        $message = 'Мы забранировали для вас дегустацию. <br>В ближайшее время свяжемся с Вами';
        return view('shop.checkout.success', [
            'message' => $message
        ]);
    }

    public static function contact(Request $request)
    {
        $order = new \stdClass();
        $order->name = $request['name'];
        $order->contact = $request['contact'];
        $order->message = $request['message'];
        $order->sender = env('MAIL_USERNAME');
        Mail::to(env('MAIL_USERNAME'))->send(new  TastingMail($order));
        return true;
    }

}
