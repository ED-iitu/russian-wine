<?php
namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GiftCardPurchase;
use Illuminate\Support\Str;

class GiftCardController extends Controller
{
    public function index()
    {
        $amounts = [5000, 10000, 15000, 20000];
        return view('page.giftcards.index', compact('amounts'));
    }

    public function buy(Request $request)
    {
        $request->validate([
            'amount' => 'required|in:5000,10000,15000,20000',
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|max:255',
            'phone'  => 'nullable|string|max:20',
        ]);

        $cardNumber = implode(' ', str_split(str_pad(mt_rand(0, 9999999999999999), 16, '0', STR_PAD_LEFT), 4));
        $purchase   = GiftCardPurchase::create([
            'amount'      => $request->amount,
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'card_number' => $cardNumber,
            'status'      => 'new',
        ]);

        // TODO: интеграция с платёжкой
        // redirect на страницу оплаты
        return redirect()->route('giftcards.success')->with('success', 'Заказ создан! (MVP)');
    }

    public function success()
    {
        return view('page.giftcards.success', [
            'message' => 'Заявка на покупку подарочной карты успешно отправлена!'
        ]);
    }
}
