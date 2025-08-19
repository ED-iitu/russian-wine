@extends('layouts.app')
@section('title', '🎁 Подарочные карты «Русское Вино» — дарите вкус и эмоции!')
@section('content')
    <style>
        .gift-banner {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-top: 120px;
            padding: 40px 20px;
            background: linear-gradient(135deg, #faf4ef, #fff);
            border-radius: 20px;
        }

        .gift-banner h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #3a2c27;
        }

        .gift-banner p {
            font-size: 2rem;
            color: #6a5d58;
        }

        .gift-content {
            margin: 50px auto;
            max-width: 950px;
            text-align: center;
        }

        .gift-content h2 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #3a2c27;
        }

        .gift-content p {
            font-size: 1.5rem;
            line-height: 1.6;
            color: #4d403c;
            margin-bottom: 30px;
        }

        .gift-benefits {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .benefit {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            font-size: 1rem;
            color: #3a2c27;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .benefit span {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .gift-cards {
            margin: 50px 0;
        }

        .cards-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card-item {
            background: #fff;
            border: 2px solid #d7c5b3;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            width: 200px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .card-item:hover {
            background: #f9f5f2;
            transform: translateY(-5px);
            border-color: #c09a7e;
        }

        .card-item h3 {
            font-size: 3rem;
            margin-bottom: 10px;
            color: #3a2c27;
        }

        .card-item p {
            font-size: 1.5rem;
            color: #6a5d58;
        }

        .cta-block {
            text-align: center;
            margin: 60px 0;
        }

        .cta-block button {
            padding: 15px 40px;
            font-size: 1.1rem;
            border-radius: 30px;
            border: none;
            background: #8c2e1b;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .cta-block button:hover {
            background: #6d2314;
        }
    </style>

    <div class="container">
        <div class="gift-banner">
            <h1>🎁 Подарочные карты «Русское Вино»</h1>
            <p>Идеальный подарок для ценителей вина — от 5 000 до 20 000 рублей.</p>
        </div>

        <div class="gift-content">
            <h2>🍷 Дарите вкус, эмоции и новые открытия</h2>
            <p>
                Подарочная карта «Русское Вино» — это не просто сертификат, а настоящее винное приключение.
                Получатель сможет выбрать любое вино из нашего каталога, открыть новые вкусы и насладиться
                уникальными российскими винодельнями.
            </p>

            <div class="gift-benefits">
                <div class="benefit"><span>🍷</span> Более 200 вин на выбор</div>
                <div class="benefit"><span>⏳</span> Срок действия — 12 месяцев</div>
                <div class="benefit"><span>💌</span> Электронный формат</div>
            </div>

            <div class="gift-cards">
                <h2>Номиналы карты</h2>
                <div class="cards-grid">
                    <div class="card-item">
                        <h3>5 000 ₽</h3>
                        <p>Идеально для первого знакомства</p>
                    </div>
                    <div class="card-item">
                        <h3>10 000 ₽</h3>
                        <p>Попробовать классику и новинки</p>
                    </div>
                    <div class="card-item">
                        <h3>15 000 ₽</h3>
                        <p>Большой выбор для ценителей</p>
                    </div>
                    <div class="card-item">
                        <h3>20 000 ₽</h3>
                        <p>Лучший подарок для гурмана</p>
                    </div>
                </div>
            </div>

            <div class="cta-block">
                <button>Купить подарочную карту</button>
            </div>
        </div>
    </div>
@endsection
