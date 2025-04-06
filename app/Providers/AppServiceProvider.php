<?php

namespace App\Providers;

use App\Models\Set;
use App\Models\Wine;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Session;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_TIME, 'ru_RU.UTF-8');
        Carbon::setLocale(config('app.locale'));
        //Voyager::addAction(\App\Actions\DuplicateWine::class);
    }
}
