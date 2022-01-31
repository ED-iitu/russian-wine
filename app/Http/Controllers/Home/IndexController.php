<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Set;
use App\Models\Tasting;
use App\Models\Wine;
use App\Models\Winemaker;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function index()
    {
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

        $favorite_wine_id = [];
        if (Auth::guard('client')->user()) {
            $client = Auth::guard('client')->user();
            $favorite_wines = $client->wines()->get();
            foreach ($favorite_wines as $wine) {
                $favorite_wine_id[] = $wine->id;
            }
        }
        $winemakers = Winemaker::where('status', '=', 'ACTIVE')
            ->where('main_image', '!=', null)
            ->with('wines', 'region', 'winery')
            ->limit(7)
            ->get();
        $home_set = Set::where('in_home', true)->first();
        $home_tasting = Tasting::where('in_home', true)->first();
        session()->forget('filters');
        return view('home.index', [
            'new_wines' => $new_wines,
            'popular_wines' => $popular_wines,
            'winemakers' => $winemakers,
            'home_set'  => $home_set,
            'home_tasting'  => $home_tasting,
            'favorite' => $favorite_wine_id,
        ]);
    }
}
