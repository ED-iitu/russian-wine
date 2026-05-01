<?php


namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class SetController extends Controller
{
    public function index()
    {
        $sets = Cache::remember('sets.index.active', 3600, function () {
            return Set::where('status', '=', 'ACTIVE')
                ->where('in_main', '=', 1)
                ->orderBy('title', 'ASC')
                ->get();
        });
        return view('sets.index', [
            'sets' => $sets
        ]);
    }

    public function show(Request $request, $slug)
    {
        $page_type = $request->get('type');
        $set = Cache::remember("sets.show.{$slug}", 3600, function () use ($slug) {
            return Set::where('status', '=', 'ACTIVE')
                ->where('slug', '=', $slug)
                ->with([
                    'wines.color',
                    'wines.sugar',
                    'wines.winery',
                    'wines.excerpt',
                    'wines.sort',
                    'nextSet:id,slug,title',
                    'prevSet:id,slug,title',
                ])
                ->firstOrFail();
        });
        $wine_count = count($set->wines);
        return view('sets.show', [
            'set' => $set,
            'wine_count' => $wine_count,
            'page_type' => $page_type
        ]);
    }
}
