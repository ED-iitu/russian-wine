<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Page;
use App\Models\Wine;
use App\Models\Winery;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Mail\IndexController as SendMail;
use Illuminate\Support\Facades\Auth;

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
            'message' => $message,
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
            'page'  => $page,
        ]);
    }

    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function where_to_by()
    {
        $contacts = Contact::all();
        return view('page.where_to_by', [
            'contacts' => $contacts,
        ]);
    }


    public function show($slug)
    {
        $winery = Winery::where('slug', '=', $slug)->with('images', 'wines')->firstOrFail();

        if ($winery) {
            return view('page.winery.show', [
                'winery' => $winery
            ]);
        }

        $wine = Wine::where('slug', '=', $slug)
            ->with('color', 'sugar', 'winery', 'manufacture', 'excerpt', 'sort', 'region')
            ->where('status', '=', 'ACTIVE')
            ->firstOrFail();
        if (isset($wine->winery)) {
            $wines = Wine::where('winery_id', '=', $wine->winery->id)->where('price', '>', 0)->get();
        } else {
            $wines = Wine::where('price', '>', 0)->limit(20)->get();
        }
        $is_favorite = false;
        if (Auth::guard('client')->user()) {
            $client = Auth::guard('client')->user();
            $favorite_wines = $client->wines()->get();
            foreach ($favorite_wines as $favorite_wine) {
                if ($favorite_wine->id == $wine->id) {
                    $is_favorite = true;
                }
            }
        }
        if ($wine->vintage_id) {
            $vintages = Wine::where('status', '=', 'ACTIVE')
                ->where('price', '>', 0)
                ->with('color', 'sugar', 'winery', 'manufacture', 'excerpt', 'sort', 'region')
                ->where('vintage_id', '=', $wine->vintage_id)
                ->get();
        } else {
            $vintages = null;
        }
        return view('shop.wine.show', [
            'wine' => $wine,
            'wines' => $wines,
            'is_favorite' => $is_favorite,
            'vintages' => $vintages
        ]);

    }

}
