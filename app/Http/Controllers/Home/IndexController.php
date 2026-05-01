<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Set;
use App\Models\Tasting;
use App\Models\Wine;
use App\Models\Winemaker;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function index()
    {
        $homeContent = Cache::remember('home.index.content', 1800, function () {
            $popular_wines = Wine::where('status', '=', 'ACTIVE')
                ->where('featured', '=', 1)
                ->where('price', '>', 0)
                ->with('color', 'sugar', 'winery', 'manufacture', 'excerpt', 'sort', 'region')
                ->orderBy('id', 'DESC')
                ->limit(20)
                ->get();
            $new_wines = Wine::where('status', '=', 'ACTIVE')
                ->with('color', 'sugar', 'winery', 'manufacture', 'excerpt', 'sort', 'region')
                ->where('price', '>', 0)
                ->orderBy('id', 'DESC')
                ->limit(20)
                ->get();

            $winemakers = Winemaker::where('status', '=', 'ACTIVE')
                ->whereNotNull('main_image')
                ->with('wines', 'region', 'winery')
                ->limit(7)
                ->get();
            $home_set = Set::where('in_home', true)->first();
            $home_tasting = Tasting::where('in_home', true)->first();

            return compact('popular_wines', 'new_wines', 'winemakers', 'home_set', 'home_tasting');
        });

        $favorite_wine_id = [];
        if (Auth::guard('client')->user()) {
            $client = Auth::guard('client')->user();
            $favorite_wine_id = $client->wines()->pluck('wines.id')->all();
        }
        session()->forget('filters');
        return view('home.index', [
            'new_wines' => $homeContent['new_wines'],
            'popular_wines' => $homeContent['popular_wines'],
            'winemakers' => $homeContent['winemakers'],
            'home_set'  => $homeContent['home_set'],
            'home_tasting'  => $homeContent['home_tasting'],
            'favorite' => $favorite_wine_id,
        ]);
    }
}
