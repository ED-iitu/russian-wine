<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Order;

class FranchiseController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $page = Page::where('slug', '=', 'franchise')->where('status', '=', 'ACTIVE')->firstOrFail();
        return view('page.franchise.index', [
            'page'  => $page
        ]);
    }

    public function order(Request $request)
    {
        $request->validate([
            'captcha' => 'required|captcha'
        ]);

        $saveRequest = new Order();
        $saveRequest->name = $request['name'];
        $saveRequest->phone = $request['phone'];
        $saveRequest->type = Order::TYPE_FRANCHISE;
        $saveRequest->save();

        $message = 'Заявка на получение Франшизы успешно создана! Мы с вами свяжемся в ближайшее время!';

        return view('shop.checkout.success', [
            'message' => $message
        ]);
       // return redirect()->back()->with('success', trans('order.success.franchise'));
    }
}
