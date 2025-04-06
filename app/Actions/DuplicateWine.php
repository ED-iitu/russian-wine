<?php
namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;
use Illuminate\Http\Request;
use App\Models\Wine;

class DuplicateWine extends AbstractAction
{
    public function getTitle()
    {
        return 'Копировать';
    }

    public function getIcon()
    {
        return 'voyager-copy';  // Иконка для кнопки
    }

    public function getDefaultRoute()
    {
        // Ссылка на действие
        return route('admin.wines.duplicate', ['id' => $this->data->id]);
    }

    public function massAction(Request $request)
    {
        // Обработка массовых действий (если нужно)
    }

    public function getPermissions()
    {
        // Права доступа к действию
        return ['browse_wines'];  // Можете настроить права доступа по необходимости
    }

    public function shouldActionDisplayOnDataType()
    {
        // Показывать действие только для определенной модели
        return $this->dataType->slug == 'wines';
    }
}