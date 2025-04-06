<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;
use App\Models\Wine;
use Illuminate\Http\Request;

class DuplicateWine extends AbstractAction
{
    /**
     * Выполняется при нажатии на кнопку.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request)
    {
        // Получаем товар
        $wine = Wine::findOrFail($this->data->id);

        // Дублируем его
        $duplicateWine = $wine->replicate();
        $duplicateWine->save();  // Сохраняем новый товар

        // Редиректим на страницу со списком товаров
        return redirect()->route('voyager.wines.index')->with('success', 'Товар успешно дублирован!');
    }

    /**
     * Возвращает название действия.
     *
     * @return string
     */
    public function getTitle()
    {
        return 'Копировать';  // Название кнопки
    }

    /**
     * Возвращает иконку для кнопки действия.
     *
     * @return string
     */
    public function getIcon()
    {
        return 'voyager-copy';  // Иконка для действия
    }

    /**
     * Возвращает маршрут, на который ведет действие.
     *
     * @return string
     */
    public function getDefaultRoute()
    {
        return route('admin.wines.duplicate', ['id' => $this->data->id]);  // Маршрут для действия
    }

    /**
     * Проверка прав доступа на выполнение действия.
     *
     * @return bool
     */
    public function canSee()
    {
        return true;  // всегда показываем кнопку
    }

    /**
     * Проверка прав доступа для выполнения действия.
     *
     * @return bool
     */
    public function canAct()
    {
        return true;  // всегда разрешаем действие
    }
}
