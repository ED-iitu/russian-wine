@extends('layouts.app')
@section('title', '🎁 Подарочные карты «Русское Вино» — дарите вкус и эмоции!')
@section('content')
    <style>
        .gift-banner {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 130px;
            text-align: center;
            padding: 50px 20px;
            background: linear-gradient(135deg, #fff5f5, #fce8e8);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .gift-banner h1 {
            font-size: 44px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #6b0f1a;
            line-height: 1.3;
        }

        .gift-banner p {
            font-size: 22px;
            max-width: 800px;
            color: #444;
            line-height: 1.6;
        }

        .gift-content {
            margin-top: 70px;
            text-align: center;
        }

        .gift-content h2 {
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #333;
            line-height: 1.6;
        }

        .advantages {
            margin: 40px auto;
            max-width: 800px;
            padding: 20px;
            text-align: left;
            font-size: 20px;
            line-height: 1.8;
        }

        .advantages ul {
            list-style: none;
            padding: 0;
        }

        .advantages li {
            background: #fff;
            padding: 15px 20px;
            margin: 15px 0;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            font-size: 20px;
        }

        .nominals {
            margin-top: 60px;
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        .nominal-card {
            background: #fff;
            border-radius: 15px;
            padding: 25px 40px;
            font-size: 26px;
            font-weight: bold;
            color: #6b0f1a;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .nominal-card:hover {
            transform: scale(1.05);
            background: #6b0f1a;
            color: #fff;
        }

        .cta {
            margin-top: 80px;
            text-align: center;
        }

        .cta button {
            background: #6b0f1a;
            color: #fff;
            padding: 20px 40px;
            font-size: 22px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .cta button:hover {
            background: #8e1c28;
        }

        @media (max-width: 768px) {
            .gift-banner h1 {
                font-size: 32px;
            }

            .gift-banner p {
                font-size: 18px;
            }

            .gift-content h2 {
                font-size: 22px;
            }

            .advantages li {
                font-size: 18px;
            }

            .nominal-card {
                font-size: 22px;
                padding: 20px 30px;
            }

            .cta button {
                font-size: 20px;
                padding: 15px 30px;
            }
        }
    </style>

    <div class="gift-banner">
        <h1>🎁 Подарочные карты «Русское Вино»</h1>
        <p>Дарите вкус и эмоции! Идеальный подарок для ценителей вина — от 5 000 до 20 000 рублей.</p>
    </div>

    <div class="gift-content">
        <h2>
            Подарочная карта «Русское Вино» — это не просто сертификат, а целое винное приключение.
            Получатель сможет выбрать любое вино из нашего каталога, попробовать новые вкусы и открыть для себя уникальные российские винодельни.
        </h2>

        <div class="advantages">
            <strong>Преимущества:</strong>
            <ul>
                <li>📦 Доставка по всей России</li>
                <li>🍷 Более 200 позиций вина на выбор</li>
                <li>⏳ Срок действия — 12 месяцев</li>
                <li>💌 Электронный и физический формат</li>
            </ul>
        </div>

        <h2>Выберите номинал:</h2>
        <div class="nominals">
            <div class="nominal-card">5 000 ₽</div>
            <div class="nominal-card">10 000 ₽</div>
            <div class="nominal-card">15 000 ₽</div>
            <div class="nominal-card">20 000 ₽</div>
        </div>

        <div class="cta">
            <button>🛒 Купить подарочную карту</button>
        </div>
    </div>
@endsection
