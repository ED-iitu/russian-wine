<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\GrapeSort;
use App\Models\Region;
use App\Models\Sugar;
use App\Models\Wine;
use App\Models\WineClass;
use Illuminate\Http\Request;

class WineController extends Controller
{
    public function index(Request $request)
    {
        $query = Wine::query();

        // Загрузка всех связанных моделей
        $query->with(['color', 'region', 'sugar']);

        foreach ($request->all() as $field => $value) {
            if (in_array($field, ['color', 'type', 'year', 'author'])) { // только разрешённые поля
                $query->where($field, $value);
            }
        }

        return response()->json($query->paginate(20));
    }

    public function filters()
    {
        $colors = Color::orderBy('title', 'ASC')->get();
        $regions = Region::orderBy('title', 'ASC')->get();
        $sugars = Sugar::orderBy('title', 'ASC')->get();
        $sorts = GrapeSort::orderBy('title', 'ASC')->get();
        $classes = WineClass::orderBy('title', 'ASC')->get();
        $years = Wine::select('year')->where('year', '!=', null)->groupBy('year')->orderBy('year', 'DESC')->get();
        $fortresses = Wine::select('fortress')->where('fortress', '!=', null)->groupBy('fortress')->orderBy('fortress', 'DESC')->get();

        return response()->json([
            'colors'     => $colors,
            'regions'    => $regions,
            'sugars'     => $sugars,
            'sorts'      => $sorts,
            'classes'    => $classes,
            'years'      => $years,
            'fortresses' => $fortresses,
        ]);
    }

    public function show($id)
    {
        $wine = Wine::findOrFail($id);

        return response()->json($wine);
    }
}