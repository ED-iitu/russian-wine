<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wine;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WineController extends Controller
{
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
