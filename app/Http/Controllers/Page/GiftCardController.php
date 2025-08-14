<?php
namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;

class GiftCardController extends Controller
{
    public function index()
    {
        return view('page.gift_card');
    }
}