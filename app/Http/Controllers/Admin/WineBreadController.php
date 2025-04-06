<?php
namespace App\Http\Controllers\Admin;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Models\Wine;

class WineBreadController extends VoyagerBaseController
{
    public function duplicate(Request $request, $id)
    {
        $wine = Wine::findOrFail($id);

        // Копируем запись
        $newWine = $wine->replicate();
        $newWine->title = $wine->title . ' (Копия)';
        $newWine->slug = Str::slug($wine->title . '-' . time());
        $newWine->save();

        return redirect()->back()->with([
            'message' => 'Товар успешно скопирован!',
            'alert-type' => 'success'
        ]);
    }
}
