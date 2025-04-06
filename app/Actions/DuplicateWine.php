<?php
namespace App\Actions;

use Illuminate\Support\Facades\Redirect;
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

    public function massAction($id)
    {
        return Redirect::route('admin.wines.duplicate', ['id' => $id[0]]);
    }

    public function getAttributes()
    {
        // Action button class
        return [
            'class'   => 'btn btn-sm btn-success',
        ];
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