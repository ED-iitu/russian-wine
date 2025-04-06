<?php

use App\Http\Controllers\Admin\WineController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('admin/wines/{id}/duplicate', 'Admin\WineController@dublicate')->name('admin.wines.duplicate');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('', 'Home\IndexController@index')->name('home');
Route::get('/wineshop', 'Shop\IndexController@wine_list')->name('wine_shop');
Route::get('/wine/bread/{slug}', 'Shop\IndexController@wine_bread')->name('wine-bread');
Route::get('/sety', 'Shop\SetController@index')->name('sets');

Route::get('/refresh-captcha', function() {
    return response()->json(['captcha' => captcha_src()]);
});

Route::get('/wineries', 'Page\WineryController@index')->name('wineries');
Route::get('/micro_winery', 'Page\WineryController@micro_winery')->name('micro_winery');
Route::get('/set-{slug}', 'Shop\SetController@show')->name('set');

Route::get('/podpiska', 'Shop\SubscriptionController@index')->name('subscription');
Route::post('/ask-question', 'Shop\SubscriptionController@save_question')->name('ask-question');

Route::get('/winemakers', 'Page\WinemakerController@index')->name('winemakers');
Route::get('/franchise', 'Page\FranchiseController@index')->name('franchise');
Route::post('/franchise/order', 'Page\FranchiseController@order')->name('franchise-order');

Route::get('/personal-wine', 'Shop\IndexController@personal_wine')->name('personal-wine');
Route::post('personal-wine/order', 'Shop\IndexController@personal_wine_order')->name('personal-wine-order');

Route::get('/degustacii', 'Shop\TastingsController@index')->name('tastings');
Route::post('/tastings/checkout', 'Shop\TastingsController@checkout')->name('tasting_checkout');
Route::post('/tasting/order', 'Shop\TastingsController@order')->name('tasting_order');
Route::post('/tasting/contact', 'Shop\TastingsController@contact')->name('tasting_contact');

Route::get('/wine-tour', 'Page\IndexController@tour')->name('wine-tour');
Route::post('/wine-tour/save', 'Page\IndexController@tour_save')->name('tour_order');

Route::get('/where-to-buy', 'Page\IndexController@where_to_by')->name('where_to_by');
Route::get('/winemaking-regions', 'Page\RegionController@index')->name('regions');
Route::get('/region-{slug}', 'Page\RegionController@show')->name('region');

// Ajax action
Route::get('/search', 'Home\SearchController@search')->name('search');
Route::get('/cart/add/{type}/{product_id}/{qty}', 'Shop\IndexController@add_to_cart');
Route::get('/cart/remove/{type}/{product_id}/{qty}', 'Shop\IndexController@remove_to_cart');
Route::get('/cart/count', 'Shop\IndexController@count_cart');
Route::get('/cart/get-wines', 'Shop\IndexController@get_car_wines');

Route::get('/checkout', 'Shop\IndexController@checkout')->name('checkout');
Route::post('/checkout/order', 'Shop\IndexController@checkout_order')->name('checkout_order');
Route::get('/checkout/success', 'Shop\IndexController@checkout_success')->name('checkout_success');

Route::get('/profile', 'Profile\IndexController@show')->name('profile');
Route::post('/profile/update', 'Profile\IndexController@update')->name('profile-update');


Route::get('/profile/add-to-favorite', 'Page\FavoriteController@addToFavorite')->name('add-to-favorite');
Route::get('/profile/delete-from-favorite', 'Page\FavoriteController@deleteFromFavorite')->name('delete-from-favorite');

Route::get('/profile/favorite', 'Profile\IndexController@favorite')->name('profile-favorite');
Route::post('/profile/favorite/order', 'Profile\IndexController@favorite_order')->name('profile-favorite-order');
Route::post('/profile/set/order', 'Profile\IndexController@set_order')->name('profile-set-order');


Route::get('/profile/orders', 'Profile\IndexController@orders')->name('profile-orders');
Route::get('/profile/order/{order_id}', 'Profile\IndexController@order');
Route::get('/profile/sets', 'Profile\IndexController@sets')->name('profile-sets');

//подписки в ЛК
Route::get('/profile/subscription', 'Profile\IndexController@subscription')->name('profile-subscription');

Route::post('/profile/reorder', 'Profile\IndexController@reorder')->name('reorder');

Route::get('/page/{slug}', 'Page\IndexController@simple_page')->name('simple_page');

//Route::get('/{slug}', 'Page\WineryController@show')
//    ->where('slug', '[a-z0-9-]+')
//    ->name('winery');
//
//Route::get('/wine/{slug}', 'Shop\IndexController@wine_info')->name('wine');

Route::get('/{slug}', 'Page\IndexController@show')->name('wine_or_winery');


