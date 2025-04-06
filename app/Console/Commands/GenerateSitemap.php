<?php

namespace App\Console\Commands;

use App\Models\Winery;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Wine;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Генерация sitemap.xml для всех страниц и товаров';

    public function handle()
    {
        $this->info('🚀 Генерация sitemap.xml началась...');

        // Создаём новый sitemap
        $sitemap = Sitemap::create();

        // Главная страница
        $sitemap->add(Url::create('/')
            ->setLastModificationDate(now())
            ->setChangeFrequency('daily')
            ->setPriority(1.0));


        $sitemap->add(Url::create('/wineshop')
            ->setLastModificationDate(now())
            ->setChangeFrequency('daily')
            ->setPriority(0.9));


        $sitemap->add(Url::create('/sety')
            ->setLastModificationDate(now())
            ->setChangeFrequency('daily')
            ->setPriority(0.9));

        $sitemap->add(Url::create('/podpiska')
            ->setLastModificationDate(now())
            ->setChangeFrequency('daily')
            ->setPriority(0.9));

        $sitemap->add(Url::create('/franchise')
            ->setLastModificationDate(now())
            ->setChangeFrequency('daily')
            ->setPriority(0.9));

        $sitemap->add(Url::create('degustacii')
            ->setLastModificationDate(now())
            ->setChangeFrequency('daily')
            ->setPriority(0.9));

        $sitemap->add(Url::create('/personal-wine')
            ->setLastModificationDate(now())
            ->setChangeFrequency('daily')
            ->setPriority(0.9));

        $sitemap->add(Url::create('/winemaking-regions')
            ->setLastModificationDate(now())
            ->setChangeFrequency('daily')
            ->setPriority(0.9));

        // Добавляем товары
        $products = Wine::all();
        foreach ($products as $product) {
            $sitemap->add(Url::create(route('wine_or_winery', ['slug' => $product->slug])) // Используем общий роут
            ->setLastModificationDate($product->updated_at ?? now())
                ->setChangeFrequency('weekly')
                ->setPriority(0.8));
        }

// Добавляем винодельни
        $wineries = Winery::all();
        foreach ($wineries as $winery) {
            $sitemap->add(Url::create(route('wine_or_winery', ['slug' => $winery->slug])) // Используем общий роут
            ->setLastModificationDate($winery->updated_at ?? now())
                ->setChangeFrequency('weekly')
                ->setPriority(0.8));
        }

        // Сохраняем sitemap
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Sitemap успешно сгенерирован!');
    }
}
