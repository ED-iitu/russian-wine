@extends('layouts.app')

@section('title', 'Подарочные карты «Русское Вино»')

@section('content')
    <style>
        .giftcards-page {
            background: url('/images/bg-wine.jpg') center/cover no-repeat;
            padding: 50px 20px;
            color: #fff;
            font-family: 'Georgia', serif;
        }
        .giftcards-container {
            max-width: 1200px;
            margin: 0 auto;
            background: rgba(50, 0, 0, 0.8);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0,0,0,0.6);
        }
        .giftcards-title {
            font-size: 42px;
            color: #f5d58a;
            text-align: center;
            margin-bottom: 10px;
        }
        .giftcards-subtitle {
            text-align: center;
            font-size: 18px;
            color: #fff;
            margin-bottom: 40px;
        }
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        .gift-card {
            background: #fff;
            color: #3a0d0d;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 15px rgba(0,0,0,0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .gift-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 25px rgba(0,0,0,0.6);
        }
        .gift-card-header {
            background: linear-gradient(135deg, #7a1c1c, #500d0d);
            color: #f5d58a;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }
        .gift-card-body {
            padding: 20px;
            flex: 1;
        }
        .gift-card-body p {
            font-size: 14px;
            margin-bottom: 15px;
        }
        .gift-card-body input {
            width: 100%;
            padding: 10px;
            margin-bottom: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }
        .gift-card-body button {
            background: #7a1c1c;
            color: #f5d58a;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
            width: 100%;
        }
        .gift-card-body button:hover {
            background: #5c0f0f;
        }
        .giftcards-info {
            background: rgba(255, 255, 255, 0.08);
            padding: 20px;
            border-radius: 10px;
            font-size: 15px;
            line-height: 1.6;
        }
        .giftcards-info h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #f5d58a;
        }
        .giftcards-info ul {
            padding-left: 20px;
        }
        .giftcards-info li {
            margin-bottom: 6px;
        }
    </style>

    <div class="giftcards-page">
        <div class="giftcards-container">
            <h1 class="giftcards-title">🎁 Подарочные карты «Русское Вино»</h1>
            <p class="giftcards-subtitle">
                Дарите вкус, стиль и эмоции. Выберите номинал и подарите близким незабываемое винное впечатление.
            </p>

            <div class="cards-grid">
                @foreach($amounts as $amount)
                    <div class="gift-card">
                        <div class="gift-card-header">{{ number_format($amount, 0, ',', ' ') }} ₽</div>
                        <div class="gift-card-body">
                            <p>Электронная или физическая карта. Срок действия — 12 месяцев.</p>
                            <form method="POST" action="{{ route('giftcards.buy') }}">
                                @csrf
                                <input type="hidden" name="amount" value="{{ $amount }}">
                                <input type="text" name="name" placeholder="Ваше имя" required>
                                <input type="email" name="email" placeholder="Email" required>
                                <input type="text" name="phone" placeholder="Телефон">
                                <button type="submit">Купить</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="giftcards-info">
                <h2>Как это работает?</h2>
                <ul>
                    <li>Вы выбираете номинал карты</li>
                    <li>Оформляете заказ и оплачиваете онлайн</li>
                    <li>Получаете электронную или физическую карту</li>
                    <li>Дарите и радуете близких</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
