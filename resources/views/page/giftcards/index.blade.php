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
            font-size: 1.7rem;
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
            font-size: 1.5rem;
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
            font-size: 1.5rem;
            border-radius: 30px;
            border: none;
            background: #DA224D;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .cta-block button:hover {
            background: #b81d40;
        }

        /* Модалка */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 20px;
            max-width: 500px;
            width: 90%;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        }

        .modal-content h2 {
            margin-bottom: 20px;
            font-size: 2.2rem;
            color: #3a2c27;
        }

        .modal-content input, .modal-content select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            font-size: 1.3rem;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        .modal-content button {
            margin-top: 15px;
            padding: 12px 30px;
            font-size: 1.4rem;
            border-radius: 25px;
            border: none;
            background: #DA224D;
            color: #fff;
            cursor: pointer;
        }

        .modal-content button:hover {
            background: #b81d40;
        }

        .close-btn {
            position: absolute;
            top: 20px; right: 25px;
            font-size: 2rem;
            cursor: pointer;
            color: #555;
        }

        .close-btn:hover {
            color: #000;
        }

        .faq-block {
            max-width: 800px;
            margin: 60px auto;
            padding: 20px;
        }

        .faq-block h2 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 30px;
        }

        .faq-item {
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
        }

        .faq-question {
            width: 100%;
            text-align: left;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            background: none;
            cursor: pointer;
            position: relative;
        }

        .faq-question::after {
            content: "+";
            position: absolute;
            right: 15px;
            font-size: 20px;
            transition: transform 0.3s;
        }

        .faq-item.active .faq-question::after {
            content: "-";
        }

        .faq-answer {
            display: none;
            padding: 0 15px 15px;
            font-size: 16px;
            line-height: 1.5;
        }

        .faq-item.active .faq-answer {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
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
                    <div class="card-item" data-amount="5000">
                        <h3>5 000 ₽</h3>
                        <p>Идеально для первого знакомства</p>
                    </div>
                    <div class="card-item" data-amount="10000">
                        <h3>10 000 ₽</h3>
                        <p>Попробовать классику и новинки</p>
                    </div>
                    <div class="card-item" data-amount="15000">
                        <h3>15 000 ₽</h3>
                        <p>Большой выбор для ценителей</p>
                    </div>
                    <div class="card-item" data-amount="20000">
                        <h3>20 000 ₽</h3>
                        <p>Лучший подарок для гурмана</p>
                    </div>
                </div>
            </div>

            <div class="cta-block">
                <button>Купить подарочную карту</button>
            </div>
        </div>

        <!-- How it works / FAQ Section -->
        <div class="faq-block">
            <h2>❓ Как это работает</h2>
            <div class="faq-item">
                <button class="faq-question">1. Как купить подарочную карту?</button>
                <div class="faq-answer">
                    Просто выберите номинал карты, нажмите кнопку «Купить» и оформите заказ.
                    Карту можно получить в электронном виде или в подарочной упаковке.
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">2. В каком виде я получу карту?</button>
                <div class="faq-answer">
                    Мы отправляем подарочные карты на e-mail в электронном виде.
                    По желанию можно заказать красивую физическую упаковку с доставкой.
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">3. Можно ли использовать карту частями?</button>
                <div class="faq-answer">
                    Да, баланс карты можно тратить на несколько покупок, пока сумма не будет исчерпана.
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">4. Что делать, если карта потерялась?</button>
                <div class="faq-answer">
                    Не переживайте — мы можем восстановить электронную карту, если она была активирована.
                    Обратитесь в поддержку.
                </div>
            </div>
        </div>
    </div>

    <!-- Модалка -->
    <div class="modal" id="giftModal">
        <div class="modal-content">
            <span class="close-btn" id="closeModal">&times;</span>
            <h2>Оформление подарочной карты</h2>
            <form>
                <input type="text" placeholder="Ваше имя" required>
                <input type="email" placeholder="Email" required>
                <input type="tel" placeholder="Телефон" required>
                <select id="cardAmount" required>
                    <option value="">Выберите номинал</option>
                    <option value="5000">5 000 ₽</option>
                    <option value="10000">10 000 ₽</option>
                    <option value="15000">15 000 ₽</option>
                    <option value="20000">20 000 ₽</option>
                </select>
                <button type="submit">Отправить заявку</button>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('giftModal');
        const closeModal = document.getElementById('closeModal');
        const cardItems = document.querySelectorAll('.card-item');
        const cardAmountSelect = document.getElementById('cardAmount');
        const ctaButton = document.querySelector('.cta-block button');

        // Клик по карточке — сразу открывает модалку и подставляет номинал
        cardItems.forEach(item => {
            item.addEventListener('click', () => {
                const amount = item.getAttribute('data-amount');
                cardAmountSelect.value = amount;
                modal.style.display = 'flex';
            });
        });

        // Клик по кнопке "Купить подарочную карту"
        ctaButton.addEventListener('click', () => {
            cardAmountSelect.value = ""; // сбрасываем выбор
            modal.style.display = 'flex';
        });

        // Закрытие модалки
        closeModal.onclick = () => modal.style.display = 'none';

        window.onclick = (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        };
    </script>

    <script>
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            question.addEventListener('click', () => {
                item.classList.toggle('active');
            });
        });
    </script>
@endsection
