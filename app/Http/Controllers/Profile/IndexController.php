<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\ClientSubscription;
use App\Models\Order;
use App\Models\Set;
use DB;
use App\Models\Wine;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use TCG\Voyager\Facades\Voyager;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    /**
     * @return Application|Factory|View
     */
    public function show()
    {
        $data = $this->menu_item_count();
        return view('profile.show', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function favorite()
    {
        $data = $this->menu_item_count();
        $favorites = Auth::user()->wines()->get();
        $data['favorites'] = $favorites;
        return view('profile.favorite', $data);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function favorite_order(Request $request)
    {
        $cart_info = '';
        $total_sum = 0;
        $wine_info_array = [];
        foreach ($request->wines as $wine) {
            $wine = Wine::select('title', 'price', 'image', 'id')->where('id', '=', $wine)->first();
            if ($wine) {
                $total_sum += (int)$wine->price;
                $cart_info .= 'Название: <b>' . $wine->title . '</b>' . '. </b>Количество: <b>' . 1 . '</b> штук <br>  ';
            }
            $wine_info['product_id'] = $wine->id;
            $wine_info['qty'] = 1;
            $wine_info['type'] = 'wine';
            $wine_info['price'] = $wine->price;
            array_push($wine_info_array, $wine_info);
        }
        $cart_info .= 'Общая сумма: <b>' . $total_sum . '</b>';
        $saveRequest = new Order();
        $saveRequest->name = Auth::user()->first_name;
        $saveRequest->phone = Auth::user()->phone;
        $saveRequest->email = Auth::user()->email;
        $saveRequest->request = json_encode($wine_info_array);
        $saveRequest->type = Order::TYPE_FAVORITE;
        $saveRequest->message = $cart_info;
        $saveRequest->save();
        $message = 'Заявка успешно отправлена. <br>В ближайшее время свяжемся с Вами';

        return view('shop.checkout.success', [
            'message' => $message
        ]);

    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function set_order(Request $request)
    {
        $cart_info = '';
        $total_sum = 0;
        $wine_info_array = [];
        foreach ($request->sets as $set) {
            $set = Set::select('title', 'price', 'image', 'id')->where('id', '=', $set)->first();
            if ($set) {
                $total_sum += (int)$set->price;
                $cart_info .= 'Название: <b>' . $set->title . '</b>' . '. </b>Количество: <b>' . 1 . '</b> штук <br>  ';
            }
            $wine_info['product_id'] = $set->id;
            $wine_info['qty'] = 1;
            $wine_info['type'] = 'set';
            $wine_info['price'] = $set->price;
            array_push($wine_info_array, $wine_info);
        }
        $cart_info .= 'Общая сумма: <b>' . $total_sum . '</b>';
        $saveRequest = new Order();
        $saveRequest->name = Auth::user()->first_name;
        $saveRequest->phone = Auth::user()->phone;
        $saveRequest->email = Auth::user()->email;
        $saveRequest->request = json_encode($wine_info_array);
        $saveRequest->type = Order::TYPE_CART;
        $saveRequest->message = $cart_info;
        $saveRequest->save();

        $message = 'Заявка успешно отправлена. <br>В ближайшее время свяжемся с Вами';

        return view('shop.checkout.success', [
            'message' => $message
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function subscription()
    {
        $data = $this->menu_item_count();
        $subscriptions = ClientSubscription::where('client_id', Auth::user()->id)->with('set', 'delivery')->get();
        $active_count = 0;
        $inactive_count = 0;
        foreach ($subscriptions as $subscription)
        {
            if($subscription->status == 'ACTIVE') {
                $active_count +=1;
            }
            else {
                $inactive_count +=1;
            }
        }
        $data['subscriptions'] = $subscriptions;
        $data['active_count'] = $active_count;
        $data['inactive_count'] = $inactive_count;

        ;
        return view('profile.subscription', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function orders()
    {
        $data = $this->menu_item_count();
        $orders = Order::where('email', '=', Auth::user()->email)->whereIn('type', [Order::TYPE_CART,  Order::TYPE_FAVORITE])->where('request', '!=', null)->orderBy('created_at', 'DESC')->get();
        $order_list = [];
        foreach ($orders as $key => $value) {
            $total_price = 0;
            $request = json_decode($value->request);
            $order['id'] = $value->id;
            $order['date_created'] = date($value->created_at);
            if ($request) {
                foreach ($request as $item) {
                    $total_price += $item->price * $item->qty;
                }
            }
            $order['total_price'] = $total_price;
            array_push($order_list, $order);
        }
        $data['orders'] = $order_list;
        return view('profile.orders', $data);
    }

    public function order(int $order_id)
    {
        $order = Order::where('email', '=', Auth::user()->email)->where('request', '!=', null)->where('id', $order_id)->firstOrFail();
        $request = json_decode($order->request);
        $product_list = [];
        $total_price = 0;
        if ($request) {
            foreach ($request as $item) {
                if ($item->type == 'set') {
                    $product = Set::where('id', '=', $item->product_id)->first();
                } elseif ($item->type == 'wine') {
                    $product = Wine::where('id', '=', $item->product_id)->first();
                }
                if ($product) {
                    $item_order['title'] = $product->title;
                    $item_order['image'] = Voyager::image($product->image);
                    $item_order['class'] = $item->type;
                    $item_order['price'] = $product->price;
                    $item_order['sugar'] = isset($product->sugar) ? $product->sugar->title : '';
                    $item_order['color'] = isset($product->color) ? $product->color->title : '';
                    $item_order['year'] = isset($product->year) ? $product->year : '';
                    array_push($product_list, $item_order);
                }
                $total_price += $item->price * $item->qty;
            }
        }
        $wines = ['products' => $product_list];
        $count_wine_array = ['date_created' => date($order->created_at)];
        $total_sums = ['total_sum' => $total_price];
        $result = array_merge($wines, $count_wine_array, $total_sums);
        return response()->json($result, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return Application|Factory|View
     */
    public function sets()
    {
        $data = $this->menu_item_count();
        $orders = Order::where('email', '=', Auth::user()->email)->get();
        $set_id_array = [];
        foreach ($orders as $key => $order) {
            $requests = json_decode($order->request);
            if ($requests) {
                foreach ($requests as $request) {
                    if (isset($request->type)) {
                        $requestType = $request->type;
                        if ($requestType === 'set') {
                            $set_id_array[] = $request->product_id;
                        }

                    }

                }
            }

        }
        $sets = Set::whereIn('id', $set_id_array)->get();
        $data['sets'] = $sets;

        return view('profile.sets', $data);
    }


    public function update(Request $request)
    {
        $client = Auth::user();

        $client->first_name = $request['first_name'];
        $client->last_name = $request['last_name'];
        $client->email = $request['email'];
        $client->phone = $request['phone'];
        $client->birth_date = $request['birth_date'];

        if ($request['newpassword'] !== null && $request['oldpassword'] !== null) {
            if (!Hash::check($request['oldpassword'],$client->password)) {
                return redirect()->route('profile')->with('error', 'Старый пароль введен не верно');
            }
            $newPass = Hash::make($request['newpassword']);
            $client->password = $newPass;
        }

        $client->save();

        return redirect()->route('profile')->with('success', 'Данные успешно обновленны');
    }


    protected function menu_item_count()
    {
        $favorites_wines = Auth::user()->wines()->count();
        $menu = ['favorite_count' => $favorites_wines];
        $orders = Order::where('email', '=', Auth::user()->email)->get();
        $subscriptions = ClientSubscription::where('client_id', Auth::user()->id)->count();
        $count_sets = 0;
        foreach ($orders as $order) {
            if ($order->type == Order::TYPE_CART) {
                $request = json_decode($order->request);
                foreach ($request as $item) {
                    if (isset($item->type) and $item->type == 'set') {
                        $count_sets += $item->qty;
                    }
                }
            }
        }
        $menu['order_count'] = count($orders);
        $menu['set_count'] = $count_sets;
        $menu['subscription_count'] = $subscriptions;
        return $menu;
    }

    public function reorder(Request $request)
    {
        $message = 'Вы успешно продублировали заказ. <br>В ближайшее время свяжемся с Вами';
        $old_orders = Order::find($request['orders']);
        $new_order = $old_orders->replicate();
        $new_order->save();
        return view('shop.checkout.success', [
            'message' => $message
        ]);
    }
}
