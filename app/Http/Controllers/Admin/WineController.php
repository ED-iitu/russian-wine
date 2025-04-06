<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wine;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WineController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');  // Получаем параметр поиска
        $wines = Wine::search($search)->paginate(10);  // Фильтруем по поисковому запросу

        return view('voyager.wines.browse', compact('wines'));
    }

    public function duplicate($id)
    {
        $wine = Wine::findOrFail($id);

        // Создаем копию
        $newWine = $wine->replicate();
        $newWine->title = $wine->title . ' (Копия)';
        $newWine->slug = Str::slug($wine->title . '-' . time());
        $newWine->save();

        return redirect()->back()->with('success', 'Товар успешно скопирован!');
    }
}
