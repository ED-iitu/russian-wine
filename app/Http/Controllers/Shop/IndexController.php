<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\GrapeSort;
use App\Models\Region;
use App\Models\Set;
use App\Models\Wine;
use App\Models\WineClass;
use App\Models\Winery;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Sugar;
use App\Filters\WineFilter;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\Mail\IndexController as SendMail;

class IndexController extends Controller
{
    /**
     * @param WineFilter $filters
     * @return Application|Factory|View
     */
    public function wine_list(WineFilter $filters)
    {
        $wineries = Winery::where('status', '=', 'ACTIVE')->orderBy('title', 'ASC')
            ->get();
        $mobile_wineries = $wineries->groupBy(function ($item) {
            return mb_substr($item->title, 0, 1);
        });
        $colors = Color::orderBy('title', 'ASC')->get();
        $regions = Region::orderBy('title', 'ASC')->get();
        $sugars = Sugar::orderBy('title', 'ASC')->get();
        $sorts = GrapeSort::orderBy('title', 'ASC')->get();
        $mobile_sorts = $sorts->groupBy(function ($item) {
            return mb_substr($item->title, 0, 1);
        });
        $classes = WineClass::orderBy('title', 'ASC')->get();
        $years = Wine::select('year')->where('year', '!=', null)->groupBy('year')->orderBy('year', 'DESC')->get();
        $fortresses = Wine::select('fortress')->where('fortress', '!=', null)->groupBy('fortress')->orderBy('fortress', 'DESC')->get();
        $wines = Wine::where('status', '=', 'ACTIVE')
            ->filter($filters)
            ->with('color', 'sugar', 'winery', 'manufacture', 'excerpt', 'sort', 'region')
            ->orderByRaw('-sort_id DESC')
            ->paginate(30)
            ->onEachSide(0);
        $bread_crumbs = [];
        $request_filter = \request()->input();
        if ($request_filter) {
            $bread_crumbs = $this->bread_crumbs($request_filter);
        }
        $favorite_id_list = [];
        if (Auth::guard('client')->user()) {
            $client = Auth::guard('client')->user();
            $favorite_wines = $client->wines()->get();
            foreach ($favorite_wines as $wine) {
                $favorite_id_list[] = $wine->id;
            }
        }
        if (\request()->ajax()) {
            $cookei_filter = json_encode(request()->input());
            Cookie::queue('filters', $cookei_filter, 60);
            return view('shop.wine.wine-list', [
                'wines' => $wines,
                'filters' => $request_filter,
                'favorite' => $favorite_id_list
            ]);
        }
        return view('shop.wine.wine-shop', [
            'wines' => $wines,
            'colors' => $colors,
            'regions' => $regions,
            'sugars' => $sugars,
            'wineries' => $wineries,
            'mobile_wineries' => $mobile_wineries,
            'mobile_sorts' => $mobile_sorts,
            'sorts' => $sorts,
            'classes' => $classes,
            'years' => $years,
            'fortresses' => $fortresses,
            'filters' => $request_filter,
            'favorite' => $favorite_id_list,
            'bread_crumbs' => $bread_crumbs
        ]);
    }

    /**
     * @param $slug
     * @return Application|Factory|View
     */
    public function wine_bread($slug)
    {

        $bread_crumbs = $this->bread_crumbs();
        $wine = Wine::where('slug', '=', $slug)
            ->with('color', 'sugar', 'winery', 'manufacture', 'excerpt', 'sort', 'region')
            ->where('status', '=', 'ACTIVE')
            ->firstOrFail();
        if (isset($wine->winery)) {
            $wines = Wine::where('winery_id', '=', $wine->winery->id)->where('price', '>', 0)->get();
        } else {
            $wines = Wine::where('price', '>', 0)->limit(20)->get();
        }
        if ($wine->vintage_id) {
            $vintages = Wine::where('status', '=', 'ACTIVE')
                ->where('price', '>', 0)
                ->with('color', 'sugar', 'winery', 'manufacture', 'excerpt', 'sort', 'region')
                ->where('vintage_id', '=', $wine->vintage_id)
                ->get();
        } else {
            $vintages = 0;
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
        return view('shop.wine.show', [
            'wine' => $wine,
            'wines' => $wines,
            'is_favorite' => $is_favorite,
            'bread_crumbs' => $bread_crumbs,
            'vintages' => $vintages

        ]);
    }

    /**
     * @param $slug
     * @return Application|Factory|View
     */
    public function wine_info($slug)
    {
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

    /**
     * @return Application|Factory|View
     */
    public function personal_wine()
    {
        $wineries = Winery::where('is_nominal', '=', 1)->get();
        return view('shop.wine.personal', [
            'wineries' => $wineries
        ]);
    }

    /***
     * @param Request $request
     * @return Application|Factory|View
     */
    public function personal_wine_order(Request $request)
    {
        $saveRequest = new Order();

        if (filter_var($request['contact'], FILTER_VALIDATE_EMAIL)) {
            $saveRequest->email = $request['contact'];
        } else {
            $saveRequest->phone = $request['contact'];
        }
        $saveRequest->name = $request['name'];
        $saveRequest->type = Order::TYPE_NOMINAL_WINE;
        $saveRequest->message = $request['message'];
        $saveRequest->save();
        $message = 'Мы забранировали для вас именное вино. В ближайшее время свяжемся с Вами';
        return view('shop.checkout.success', [
            'message' => $message
        ]);
    }

    /**
     * @param int $product_id
     * @param int $qty
     * @param string $type
     * @return mixed
     */
    protected function add_to_cart(string $type, int $product_id, int $qty)
    {
        if ($type == 'wine') {
            $checkProduct = Wine::where('id', '=', $product_id)->firstOrFail();
        } elseif ($type == 'set') {
            $checkProduct = Set::where('id', '=', $product_id)->firstOrFail();
        }
        $countItem = $checkProduct->count;
        if ($qty > $countItem) {
            return response()->json(['error' => trans('shop.error.many-item')], 400, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
        }
        $item = ['product_id' => $product_id, 'qty' => $qty, 'type' => $type, 'price' => $checkProduct->price];
        $sessionItems = session()->get('cart');
        if ($sessionItems and count($sessionItems) > 0) {
            $status = array_search($product_id, array_column($sessionItems, 'product_id'));
            $status_type = array_search($type, array_column($sessionItems, 'type'));
            if ($status === false or $status_type === false) {
                array_push($sessionItems, $item);
                session()->put('cart', $sessionItems);
            } else {
                $results = [];
                for ($i = 0; $i < count($sessionItems); $i++) {
                    $sum = ($sessionItems[$i]['product_id'] == $product_id and $sessionItems[$i]['type'] == $type) ? $sessionItems[$i]['qty'] + $qty : $sessionItems[$i]['qty'];

                    if ($sum > $countItem) {
                        return response()->json(['error' => trans('shop.error.many-item')], 400, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
                    }
                    $newArray = [
                        'product_id' => $sessionItems[$i]['product_id'],
                        'qty' => $sum,
                        'type' => $sessionItems[$i]['type'],
                        'price' => $sessionItems[$i]['price'],
                    ];
                    array_push($results, $newArray);
                }
                session()->put('cart', $results);
            }
        } else {
            session()->push('cart', $item);
        }
        return response()->json(['success' => trans('shop.success.add-cart')], 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param string $type
     * @param int $product_id
     * @param int $qty
     * @return mixed
     */
    protected function remove_to_cart(string $type, int $product_id, int $qty = 0)
    {
        if ($type == 'wine') {
            $checkProduct = Wine::where('id', '=', $product_id)->firstOrFail();
        } elseif ($type == 'set') {
            $checkProduct = Set::where('id', '=', $product_id)->firstOrFail();
        }
        $countItem = $checkProduct->count;
        if ($qty > $countItem) {
            return response()->json(['error' => trans('shop.error.many-item')], 400, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
        }
        $sessionItems = session()->get('cart');

        if ($sessionItems) {
            $itemIndex = array_search($product_id, array_column($sessionItems, 'product_id'));
            $typeIndex = array_search($type, array_column($sessionItems, 'type'));
            if ($itemIndex !== false and $typeIndex !== false) {
                session()->forget('cart');
                if ($qty == 0) {
                    foreach ($sessionItems as $key => $item) {
                        if ($item['product_id'] == $product_id and $item['type'] == $type) {
                            unset($sessionItems[$key]);
                        }
                    }
                } else {
                    $results = [];
                    for ($i = 0; $i < count($sessionItems); $i++) {
                        $newQty = ($sessionItems[$i]['product_id'] == $product_id) ? $qty : $sessionItems[$i]['qty'];
                        $newArray = [
                            'product_id' => $sessionItems[$i]['product_id'],
                            'qty' => $newQty,
                            'type' => $sessionItems[$i]['type'],
                            'price' => $checkProduct->price,
                        ];
                        $results[$i] = $newArray;
                    }
                    foreach ($results as $result) {
                        session()->push('cart', $result);
                    }
                    return response()->json(['success' => trans('shop.success.remove-cart')], 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
                }
                if ($sessionItems) {
                    foreach ($sessionItems as $item) {
                        session()->push('cart', $item);
                    }
                }
            }
            return response()->json(['success' => trans('shop.success.remove-cart')], 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
        } else {
            return response()->json(['success' => trans('shop.success.no-cart')], 404, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    protected function count_cart()
    {
        $count = 0;
        $countCartItems = session()->get('cart');
        if ($countCartItems != false) {
            foreach ($countCartItems as $item) {
                $count += $item['qty'];
            }
        }
        return response()->json(['count' => $count], 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    protected function get_car_wines()
    {
        $total_sum = 0;
        $countProduct = 0;
        $cart_products = [];
        $countCartItems = session()->get('cart');
        if ($countCartItems != false) {
            foreach ($countCartItems as $item) {
                if ($item['type'] == 'wine') {
                    $product = Wine::select('title', 'price', 'image', 'id')->where('id', '=', $item['product_id'])->first();
                    $price = (int)$product->price * $item['qty'];
                } elseif ($item['type'] == 'set') {
                    $product = Set::select('title', 'price', 'image', 'id')->where('id', '=', $item['product_id'])->first();
                    if ($item['qty'] >= 12) {
                        $price = (int)$product->price * $item['qty'] - ((int)$product->price * $item['qty'] * 0.2);
                    } else {
                        $price = (int)$product->price * $item['qty'];
                    }
                }
                if ($product) {
                    $product_array = [
                        'count' => $item['qty'],
                        'type' => $item['type'],
                        'product_id' => $product->id,
                        'title' => $product->title,
                        'price' => $product->price,
                        'image' => Voyager::image($product->image),
                        'total' => $price
                    ];
                    array_push($cart_products, $product_array);
                    $total_sum += (int)$product->price * $item['qty'];
                    $countProduct += 1;
                }
            }
        }
        $wines = ['products' => $cart_products];
        $count_wine_array = ['count_products' => $countProduct];
        $total_sums = ['total_sum' => $total_sum];
        $result = array_merge($wines, $count_wine_array, $total_sums);
        return response()->json($result, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return Application|Factory|\Illuminate\Http\RedirectResponse|View
     */
    public function checkout()
    {
        $countCartItems = session()->get('cart');

        if ($countCartItems != false) {
            $total_sum = 0;
            foreach ($countCartItems as $item) {
                if ($item['type'] == 'set') {
                    $product = Set::select('title', 'price', 'image', 'id')->where('id', '=', $item['product_id'])->first();
                } elseif ($item['type'] == 'wine') {
                    $product = Wine::select('title', 'price', 'image', 'id')->where('id', '=', $item['product_id'])->first();
                }
                if ($product) {
                    $total_sum += (int)$product->price * $item['qty'];
                }
            }
            if ($total_sum == 0) {
                return redirect()->back();
            } else {
                $form_url = route('checkout_order');
                return view('shop.checkout.index', [
                    'total_price' => $total_sum,
                    'form_url' => $form_url,
                ]);
            }
        } else {
            return redirect()->back();
        }
    }

    /***
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkout_order(Request $request)
    {
        $cart_session = session()->get('cart');
        if ($cart_session != false) {
            $cart_info = '';
            $total_sum = 0;
            $orders = [];
            foreach ($cart_session as $item) {
                if ($item['type'] == 'set') {
                    $product = Set::select('title', 'price', 'image', 'id', 'in_subscription', 'model')->where('id', '=', $item['product_id'])->first();
                    if ($product->in_subscription) {
                        $product_type = 'Подписка на сеты';
                    } else {
                        $product_type = 'Сеты';
                    }

                } elseif ($item['type'] == 'wine') {
                    $product = Wine::select('title', 'price', 'image', 'id', 'model')->where('id', '=', $item['product_id'])->first();
                    $product_type = 'Вино';

                }
                $order_product = [
                    'title' => $product->title,
                    'model' => $product->model,
                    'type' => $product_type,
                    'qty' => $item['qty'],
                    'price' => (int)$product->price,
                    'total_price' => (int)$product->price * $item['qty'],
                ];
                array_push($orders, $order_product);
                if ($product) {
                    $total_sum += (int)$product->price * $item['qty'];
                    $cart_info .= 'Название: <b>' . $product->title . '</b> Тип продуката: <b>' . $product_type . '. </b>Количество: <b>' . $item['qty'] . '</b> штук <br>  ';
                }
            }
            $cart_info .= 'Общая сумма: <b>' . $total_sum . '</b>';
            $saveRequest = new Order();
            $saveRequest->name = $request['name'];
            $saveRequest->phone = $request['phone'];
            $saveRequest->email = $request['email'];
            $saveRequest->type = Order::TYPE_CART;
            $saveRequest->message = $cart_info;
            $saveRequest->request = json_encode($cart_session);
            $saveRequest->save();
//            session()->forget('cart');
            $request['orders'] = $orders;
            $request['total'] = $total_sum;
            $request['order_id'] = $saveRequest->id;
            SendMail::order($request);

            return redirect()->route('checkout_success');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function checkout_success()
    {
        $message = 'Мы забронировали для Вас<br> лучшее вино и в ближайшее время<br> свяжемся с Вами';
        return view('shop.checkout.success', [
            'message' => $message
        ]);
    }

    /**
     * @param $model_name
     * @param $type
     * @param $array_value
     * @param $bread_crumbs
     * @return mixed
     */
    protected function set_array_with_model($model_name, $type, $array_value, $bread_crumbs)
    {
        $values = $model_name::whereIn('id', $array_value)->get();
        foreach ($values as $value) {
            $value_info = ['title' => $value->title, 'type' => $type, 'id' => $value->id];
            array_push($bread_crumbs, $value_info);
        }
        return $bread_crumbs;
    }

    /**
     * @param $array_value
     * @param $type
     * @param $bread_crumbs
     * @return mixed
     */
    protected function set_simple_array($array_value, $type, $bread_crumbs)
    {
        foreach ($array_value as $value) {
            $value_info = ['title' => $value, 'type' => $type, 'id' => $value];
            array_push($bread_crumbs, $value_info);
        }
        return $bread_crumbs;
    }

    protected function bread_crumbs($requests=null)
    {
        if ($requests) {
            $filters = $requests;
        }else {
            $filters = json_decode(Cookie::get('filters'));

        }
        $bread_crumbs = [];
        if ($filters) {
            foreach ($filters as $key => $values) {
                switch ($key) {
                    case 'title';
                        if (($values)) {
                            $wine_title = ['title' => $values, 'type' => 'title', 'id' => $values, ''];
                            array_push($bread_crumbs, $wine_title);
                        }
                        break;
                    case 'color';
                        if (($values)) {
                            $bread_crumbs = $this->set_array_with_model(new Color(), 'color[]', $values, $bread_crumbs);
                        }
                        break;
                    case 'sugar';
                        if (($values)) {
                            $bread_crumbs = $this->set_array_with_model(new Sugar(), 'sugar[]', $values, $bread_crumbs);
                        }
                        break;
                    case 'winery';
                        if (($values)) {
                            $bread_crumbs = $this->set_array_with_model(new Winery(), 'winery[]', $values, $bread_crumbs);
                        }
                        break;
                    case 'sort';
                        if (($values)) {
                            $bread_crumbs = $this->set_array_with_model(new GrapeSort(), 'sort[]', $values, $bread_crumbs);
                        }
                        break;
                    case 'region';
                        if (($values)) {
                            $bread_crumbs = $this->set_array_with_model(new Region(), 'region[]', $values, $bread_crumbs);
                        }
                        break;
                    case 'year';
                        if (($values)) {
                            $bread_crumbs = $this->set_simple_array($values, 'year[]', $bread_crumbs);
                        }
                        break;
                    case 'wine_class';
                        if (($values)) {
                            $bread_crumbs = $this->set_array_with_model(new WineClass(), 'wine_class[]', $values, $bread_crumbs);
                        }
                        break;

                    case 'price';
                        if (($values)) {
                            $bread_crumbs = $this->set_simple_array($values, 'price[]', $bread_crumbs);
                        }
                        break;
                    case 'fortress';
                        if (($values)) {
                            $bread_crumbs = $this->set_simple_array($values, 'fortress[]', $bread_crumbs);
                        }
                        break;
                }
            }
        }
        return $bread_crumbs;
    }
}
