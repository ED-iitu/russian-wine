<?php
namespace App\Providers;
use App\Actions\DuplicateWine;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Voyager;

class VoyagerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Voyager::addAction(DuplicateWine::class);
    }
}