<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Mail\IndexController as SendMail;


class IndexController extends Controller
{
    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tour()
    {
        return view('page.tour');
    }

    /**
     * @param Request $request
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tour_save(Request $request)
    {
        $saveRequest = new Order();
        $saveRequest->name = $request['name'];
        $saveRequest->phone = $request['phone'];
        $saveRequest->type = Order::TYPE_TOUR;
        $saveRequest->save();
       // SendMail::tour($request);

        $message = 'Заявка на Винный тур успешно создана! Мы с вами свяжемся в ближайшее время!';
        return view('shop.checkout.success', [
            'message' => $message
        ]);
    }


    /**
     * @param $slug
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function simple_page($slug)
    {
        $page = Page::where('slug', '=', $slug)->where('status', '=', 'ACTIVE')->firstOrFail();
        return view('page.simple-page', [
            'page'  => $page
        ]);
    }

    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function where_to_by()
    {
        $contacts = Contact::all();
        return view('page.where_to_by', [
            'contacts' => $contacts
        ]);
    }

}
