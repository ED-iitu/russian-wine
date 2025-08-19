@extends('layouts.app')
@section('title', '🎁 Подарочные карты «Русское Вино» — дарите вкус и эмоции!')
@section('content')
    <style>
        body {
            font-family: 'Proxima Nova', sans-serif;
        }

        .gift-banner {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 130px;
            text-align: center;
            padding: 40px 20px;
            background: linear-gradient(135deg, #faf5f0, #fdfdfd);
            border-radius: 20px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        }

        .gift-banner h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .gift-banner p {
            font-size: 22px;
            color: #555;
            max-width: 800px;
            line-height: 1.6;
        }

        .gift-content {
            margin-top: 60px;
            padding: 20px;
        }

        .gift-content h2 {
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
            line-height: 1.6;
        }

        .gift-benefits {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .gift-benefit {
            background: #fff;
            padding: 25px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s ease-in-out;
            font-size: 20px;
        }

        .gift-benefit:hover {
            transform: translateY(-5px);
        }

        .gift-benefit span {
            display: block;
            font-size: 42px;
            margin-bottom: 15px;
        }

        .gift-cards {
            margin-top: 70px;
            text-align: center;
        }

        .gift-cards h3 {
            font-size: 28px;
            margin-bottom: 30px;
        }

        .gift-card-options {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 25px;
        }

        .gift-card {
            background: #faf5f0;
            padding: 30px;
            border-radius: 18px;
            font-size: 22px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 5px 14px rgba(0, 0, 0, 0.07);
            min-width: 180px;
        }

        .gift-card:hover {
            background: #f0e6de;
            transform: translateY(-4px);
        }

        .cta-section {
            margin-top: 80px;
            text-align: center;
        }

        .cta-button {
            display: inline-block;
            background: #7c2f24;
            color: #fff;
            font-size: 22px;
            font-weight: 600;
            padding: 18px 40px;
            border-radius: 50px;
            text-decoration: none;
            transition: background 0.3s ease-in-out;
        }

        .cta-button:hover {
            background: #5a1f18;
        }
    </style>

    <div class="container">
        <div class="gift-banner">
            <h1>🎁 Подарочные карты «Русское Вино»</h1>
            <p>Идеальный подарок для ценителей вина — от <strong>5 000</strong> до <strong>20 000</strong> рублей. Дарите вкус и эмоции!</p>
        </div>

        <div class="gift-content">
            <h2>
                Подарочная карта «Русское Вино» — это не просто сертификат, а целое винное приключение.
                Получатель сможет выбрать любое вино из нашего каталога, попробовать новые вкусы и открыть для себя уникальные российские винодельни.
            </h2>

            <div class="gift-benefits">
                <div class="gift-benefit">
                    <span>📦</span>
                    Доставка по всей России
                </div>
                <div class="gift-benefit">
                    <span>🍷</span>
                    Более 200 позиций вина на выбор
                </div>
                <div class="gift-benefit">
                    <span>⏳</span>
                    Срок действия — 12 месяцев
                </div>
                <div class="gift-benefit">
                    <span>💌</span>
                    Электронный и физический формат
                </div>
            </div>
        </div>

        <div class="gift-cards">
            <h3>Выберите номинал карты</h3>
            <div class="gift-card-options">
                <div class="gift-card">5 000 ₽</div>
                <div class="gift-card">10 000 ₽</div>
                <div class="gift-card">15 000 ₽</div>
                <div class="gift-card">20 000 ₽</div>
            </div>
        </div>

        <div class="cta-section">
            <a href="#" class="cta-button">Купить подарочную карту</a>
        </div>
    </div>
@endsection
