@extends('layouts.app')
@section('title', '🎁 Подарочные карты «Русское Вино» — дарите вкус и эмоции!')
@section('content')
    <style>
        .banner {
            display: flex;
            margin-top: 130px;
            flex-direction: column;
            text-align: center;
            padding: 20px;
        }

        .header {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .subHeader {
            font-size: 20px;
            color: #555;
            margin-bottom: 40px;
        }

        .content {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 20px;
            background: #fffaf5;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .description {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
            color: #333;
        }

        ul {
            text-align: left;
            margin: 0 auto 30px auto;
            max-width: 600px;
            padding-left: 20px;
            font-size: 16px;
            line-height: 1.6;
        }

        ul li {
            margin-bottom: 10px;
        }

        .cards-section {
            text-align: center;
            margin-top: 50px;
        }

        .card-options {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .gift-card {
            background: #fff;
            border: 2px solid #d4af37;
            border-radius: 12px;
            padding: 20px 30px;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .gift-card:hover {
            background: #d4af37;
            color: #fff;
        }

        .buy-btn {
            margin-top: 40px;
            display: inline-block;
            padding: 15px 40px;
            background: #8b0000;
            color: #fff;
            font-size: 18px;
            font-weight: 600;
            border-radius: 10px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .buy-btn:hover {
            background: #a52a2a;
        }

        .faq {
            margin-top: 60px;
            padding: 40px 20px;
            background: #f8f8f8;
            border-radius: 16px;
        }

        .faq h3 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 700;
        }

        .faq p {
            margin-bottom: 15px;
            font-size: 16px;
            line-height: 1.6;
        }
    </style>

    <div class="col-lg-12">
        <div class="banner">
            <h1 class="header">
                🎁 Подарочные карты «Русское Вино» — дарите вкус и эмоции!
            </h1>
            <p class="subHeader">
                Идеальный подарок для ценителей вина — от 5 000 до 20 000 рублей.
            </p>
        </div>

        <div class="content">
            <h2 class="description">
                Подарочная карта «Русское Вино» — это не просто сертификат, а целое винное приключение. Получатель сможет выбрать любое вино из нашего каталога, попробовать новые вкусы и открыть для себя уникальные российские винодельни.
                <br><br>
                Выберите номинал карты и мы отправим её в электронном виде или в подарочной упаковке.
            </h2>

            <p><strong>Преимущества:</strong></p>
            <ul>
                <li>📦 Доставка по всей России</li>
                <li>🍷 Более 200 позиций вина на выбор</li>
                <li>⏳ Срок действия — 12 месяцев</li>
                <li>💌 Электронный и физический формат</li>
            </ul>
        </div>

        <div class="cards-section">
            <h2>Выберите номинал карты</h2>
            <div class="card-options">
                <div class="gift-card">5 000 ₽</div>
                <div class="gift-card">10 000 ₽</div>
                <div class="gift-card">15 000 ₽</div>
                <div class="gift-card">20 000 ₽</div>
            </div>

            <a href="#" class="buy-btn">Купить подарочную карту</a>
        </div>

        <div class="faq">
            <h3>Часто задаваемые вопросы</h3>
            <p><strong>Как получить карту?</strong><br>Мы отправим её вам на email или доставим курьером в подарочной упаковке.</p>
            <p><strong>Можно ли использовать частями?</strong><br>Да, карта действует до полного исчерпания баланса.</p>
            <p><strong>Сколько действует карта?</strong><br>12 месяцев с момента покупки.</p>
        </div>
    </div>
@endsection
