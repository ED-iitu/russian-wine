@extends('layouts.app')

@section('title', 'Подарочные карты — Русское Вино')

@section('content')
    <style>
        :root{
            --brand:#2C2030;          /* ваш основной цвет */
            --ink:#1f171f;            /* текст тёмный */
            --surface:#F4F1F3;        /* светлая поверхность */
            --muted:#7F6F86;          /* приглушённый текст */
            --line:#E6E0E9;           /* тонкая линия */
            --accent:#5D4A64;         /* вторичный акцент */
            --white:#fff;
        }

        .gc *{box-sizing:border-box}
        .gc{background:var(--surface); color:var(--ink); font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";}

        /* HERO — полноширинный, спокойный */
        .gc-hero{
            position:relative; width:100%; min-height:56vh; display:flex; align-items:flex-end;
            background:
                    linear-gradient(180deg, rgba(244,241,243,0.00) 0%, rgba(244,241,243,0.85) 60%, var(--surface) 100%),
                    url('/images/giftcards/hero-min.jpg') center/cover no-repeat;
        }
        .gc-wrap{max-width:1280px; margin:0 auto; padding: clamp(16px, 3vw, 40px)}
        .gc-hero h1{
            font-weight:750; letter-spacing:.2px;
            font-size: clamp(30px, 5vw, 58px); line-height:1.04; margin:0 0 10px; color:var(--brand)
        }
        .gc-hero p{max-width:820px; color:var(--accent); font-size: clamp(16px, 1.6vw, 20px)}
        .gc-cta{display:flex; gap:12px; margin:22px 0 8px; flex-wrap:wrap}
        .btn{
            display:inline-flex; align-items:center; justify-content:center; gap:10px;
            border:1px solid var(--brand); color:var(--white); background:var(--brand);
            padding:12px 18px; border-radius:12px; font-weight:700; cursor:pointer; text-decoration:none
        }
        .btn:hover{filter:brightness(0.96)}
        .btn.outline{background:transparent; color:var(--brand)}
        .btn.outline:hover{background:rgba(44,32,48,.06)}

        /* Номиналы */
        .gc-section{padding: clamp(26px, 4vw, 60px) 0; border-top:1px solid var(--line)}
        .gc-headline{display:flex; align-items:flex-end; justify-content:space-between; gap:16px; margin-bottom:18px; padding:0 var(--page-pad)}
        :root{--page-pad: clamp(14px, 3vw, 40px)}
        .gc-h2{font-size: clamp(22px, 3vw, 34px); color:var(--brand); margin:0}
        .gc-h2-sub{color:var(--muted); max-width:820px}

        .grid{
            padding:0 var(--page-pad);
            display:grid; gap:16px;
            grid-template-columns: repeat(4, minmax(240px, 1fr));
        }
        @media (max-width: 1024px){ .grid{grid-template-columns: repeat(2, 1fr)} }
        @media (max-width: 640px){
            .grid{display:flex; overflow-x:auto; scroll-snap-type:x mandatory; gap:12px; padding-bottom:8px}
            .card{min-width: 82vw; scroll-snap-align:start}
        }

        .card{
            background:var(--white); border:1px solid var(--line); border-radius:16px; overflow:hidden;
            display:flex; flex-direction:column; transition: box-shadow .18s ease, transform .18s ease;
        }
        .card:hover{transform:translateY(-3px); box-shadow:0 10px 24px rgba(0,0,0,.06)}
        .cardTop{padding:18px 18px 0}
        .amount{font-size: clamp(22px, 2.4vw, 30px); font-weight:800; color:var(--brand)}
        .cardImg{height:120px; margin:8px 18px 0; border-radius:10px; background:
                radial-gradient(220px 80px at 30% 60%, rgba(44,32,48,.12), transparent 60%),
                linear-gradient(180deg, #faf7fa, #f0ebf2)}
        .cardBody{padding:14px 18px 18px; color:var(--accent); flex:1}
        .bullets{list-style:none; padding:0; margin:10px 0 14px}
        .bullets li{margin:6px 0}
        .card .buy{margin-top:auto; width:100%}

        /* Шаги */
        .steps{
            padding:0 var(--page-pad); margin-top:16px;
            display:grid; gap:12px; grid-template-columns: repeat(4, 1fr);
        }
        .step{background:var(--white); border:1px solid var(--line); border-radius:12px; padding:14px; color:var(--accent)}
        .step b{color:var(--brand)}
        @media (max-width: 900px){ .steps{grid-template-columns: repeat(2, 1fr)} }
        @media (max-width: 560px){ .steps{grid-template-columns: 1fr} }

        /* FAQ */
        .faq{padding:0 var(--page-pad); max-width:980px}
        .faqItem{border-top:1px solid var(--line)}
        .faqQ{width:100%; background:transparent; border:0; padding:16px 0; text-align:left; font-weight:700; color:var(--brand); cursor:pointer}
        .faqA{max-height:0; overflow:hidden; transition:max-height .22s ease; color:var(--accent)}
        .faqItem.active .faqA{max-height:220px; padding-bottom:10px}

        /* Модалка */
        .modal{position:fixed; inset:0; display:none; align-items:center; justify-content:center; z-index:50}
        .modal.show{display:flex}
        .backdrop{position:absolute; inset:0; background:rgba(0,0,0,.35)}
        .dialog{
            position:relative; z-index:1; width:min(760px, 92vw); background:var(--white); border:1px solid var(--line);
            border-radius:16px; overflow:hidden; box-shadow:0 24px 60px rgba(0,0,0,.18)
        }
        .dialogHead{display:flex; align-items:center; justify-content:space-between; padding:14px 16px; background: #FBFAFB; border-bottom:1px solid var(--line)}
        .dialogTitle{margin:0; font-weight:800; color:var(--brand)}
        .x{background:transparent; border:0; font-size:22px; cursor:pointer; color:var(--accent)}
        .dialogBody{display:grid; grid-template-columns: 1.2fr 1fr; gap:16px; padding:16px}
        @media (max-width: 720px){ .dialogBody{grid-template-columns: 1fr} }

        label{display:block; font-size:13px; color:var(--muted); margin:10px 0 6px}
        .input, .select{
            width:100%; padding:12px; border-radius:10px; border:1px solid var(--line); outline:none; background:#fff; color:var(--ink)
        }
        .radio{display:flex; gap:10px; align-items:center; margin:6px 0; color:var(--accent)}

        .submit{
            width:100%; margin-top:10px; padding:14px 16px; border-radius:12px; border:1px solid var(--brand);
            background:var(--brand); color:#fff; font-weight:800; cursor:pointer
        }
        .submit:hover{filter:brightness(0.96)}

        /* Липкий CTA для мобилки */
        .sticky{
            position:sticky; bottom:0; left:0; right:0; z-index:30; display:none;
            background: linear-gradient(180deg, rgba(244,241,243,0), rgba(244,241,243,.96));
            padding:10px var(--page-pad) 14px;
            border-top:1px solid var(--line)
        }
        @media (max-width:640px){ .sticky{display:block} }

        /* уведомления */
        .flash{max-width:980px; margin:0 auto 14px; padding:12px 14px; border-radius:10px; border:1px solid var(--line); background:#fff; color:var(--accent)}
    </style>

    <div class="gc" id="gc">
        {{-- FLASH --}}
        @if(session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="flash">Проверьте поля формы.</div>
        @endif

        {{-- HERO --}}
        <section class="gc-hero" aria-label="Подарочные карты">
            <div class="gc-wrap">
                <h1>Подарочные карты «Русское Вино»</h1>
                <p>Электронные и физические сертификаты номиналом 5 000, 10 000, 15 000 и 20 000 ₽. Минимум формальностей — максимум эмоций. Срок действия — 12 месяцев, баланс можно тратить по частям.</p>
                <div class="gc-cta">
                    <button class="btn" data-open-modal data-default-amount="10000">Купить на 10 000 ₽</button>
                    <a class="btn outline" href="#denoms">Выбрать другой номинал</a>
                </div>
            </div>
        </section>

        {{-- НОМИНАЛЫ --}}
        <section id="denoms" class="gc-section" aria-label="Выбор номинала">
            <div class="gc-headline">
                <div>
                    <h2 class="gc-h2">Выберите сумму</h2>
                    <div class="gc-h2-sub">Сертификат приходит на e-mail сразу после оплаты. Физическую карту доставим отдельно.</div>
                </div>
            </div>

            @php($amounts = [5000, 10000, 15000, 20000])
            <div class="grid">
                @foreach($amounts as $amount)
                    <article class="card" aria-label="Карта на {{ number_format($amount,0,',',' ') }} ₽">
                        <div class="cardTop">
                            <div class="amount">{{ number_format($amount,0,',',' ') }} ₽</div>
                        </div>
                        <div class="cardImg" aria-hidden="true"></div>
                        <div class="cardBody">
                            <ul class="bullets">
                                <li>• Срок действия — 12 месяцев</li>
                                <li>• Можно использовать частями</li>
                                <li>• Доступ ко всему каталогу</li>
                            </ul>
                            <button class="btn buy" data-open-modal data-default-amount="{{ $amount }}">Купить</button>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="steps">
                <div class="step"><b>1.</b> Выберите сумму и формат карты</div>
                <div class="step"><b>2.</b> Оплатите картой или СБП</div>
                <div class="step"><b>3.</b> Получите код сертификата</div>
                <div class="step"><b>4.</b> Используйте сейчас или позже</div>
            </div>
        </section>

        {{-- FAQ --}}
        <section class="gc-section" aria-label="Частые вопросы">
            <div class="gc-headline"><h2 class="gc-h2">FAQ</h2></div>
            <div class="faq">
                <div class="faqItem">
                    <button class="faqQ" type="button">Как приходит электронная карта?</button>
                    <div class="faqA"><p>Сразу после оплаты — письмо с PDF-сертификатом и уникальным кодом на ваш e-mail.</p></div>
                </div>
                <div class="faqItem">
                    <button class="faqQ" type="button">Можно ли потратить частями?</button>
                    <div class="faqA"><p>Да. Остаток сохраняется до конца срока действия (12 месяцев).</p></div>
                </div>
                <div class="faqItem">
                    <button class="faqQ" type="button">Физические карты доставляете?</button>
                    <div class="faqA"><p>Да. По России — курьером/почтой. Упаковка лаконичная, в стиле «Русское Вино».</p></div>
                </div>
            </div>
        </section>

        {{-- Липкий CTA для мобилки --}}
        <div class="sticky">
            <div style="display:flex; gap:10px">
                <button class="btn" data-open-modal data-default-amount="5000" style="flex:1">Купить от 5 000 ₽</button>
                <a class="btn outline" href="#denoms" style="flex:1; text-align:center">Выбрать сумму</a>
            </div>
        </div>

        {{-- MODAL --}}
        <div class="modal" id="gcModal" aria-modal="true" role="dialog" aria-labelledby="gcModalTitle" aria-hidden="true">
            <div class="backdrop" data-close-modal></div>
            <div class="dialog">
                <header class="dialogHead">
                    <h3 class="dialogTitle" id="gcModalTitle">Оформление подарочной карты</h3>
                    <button class="x" aria-label="Закрыть" data-close-modal>×</button>
                </header>
                <div class="dialogBody">
                    <div>
                        <form method="POST" action="{{ route('giftcards.buy') }}" novalidate>
                            @csrf
                            <input type="hidden" name="amount" id="amountInput" value="10000">

                            <label>Номинал</label>
                            <select class="select" id="amountSelect" aria-label="Номинал">
                                @foreach($amounts as $a)
                                    <option value="{{ $a }}">{{ number_format($a,0,',',' ') }} ₽</option>
                                @endforeach
                            </select>

                            <label>Ваше имя</label>
                            <input type="text" name="name" class="input" placeholder="Иван" required>

                            <label>E-mail для отправки сертификата</label>
                            <input type="email" name="email" class="input" placeholder="you@example.com" required>

                            <label>Телефон (необязательно)</label>
                            <input type="text" name="phone" class="input" placeholder="+7 (___) ___-__-__">

                            <label>Формат</label>
                            <div class="radio">
                                <input type="radio" id="f1" name="format" value="e-card" checked>
                                <label for="f1">Электронная (PDF на e-mail)</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="f2" name="format" value="physical">
                                <label for="f2">Физическая (доставка)</label>
                            </div>

                            <button type="submit" class="submit">Перейти к оплате</button>
                            <p style="font-size:12px; color:var(--muted); margin-top:8px">Нажимая кнопку, вы соглашаетесь с условиями оплаты и офертой.</p>
                        </form>
                    </div>

                    <aside>
                        <div style="background:#FBFAFB; border:1px solid var(--line); border-radius:12px; padding:12px">
                            <div style="font-weight:700; color:var(--brand); margin-bottom:8px">Что включено</div>
                            <ul class="bullets" style="margin:0">
                                <li>• 12 месяцев действия</li>
                                <li>• Остаток сохраняется</li>
                                <li>• Доступ ко всему каталогу</li>
                                <li>• Оплата картой / СБП</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function(){
            const modal = document.getElementById('gcModal');
            const amountInput = document.getElementById('amountInput');
            const amountSelect = document.getElementById('amountSelect');

            function openModal(defaultAmount){
                if(defaultAmount){
                    amountInput.value = defaultAmount;
                    if(amountSelect) amountSelect.value = String(defaultAmount);
                }
                modal.classList.add('show');
                modal.setAttribute('aria-hidden','false');
                document.body.style.overflow='hidden';
            }
            function closeModal(){
                modal.classList.remove('show');
                modal.setAttribute('aria-hidden','true');
                document.body.style.overflow='';
            }

            document.querySelectorAll('[data-open-modal]').forEach(btn=>{
                btn.addEventListener('click', ()=>{
                    openModal(btn.getAttribute('data-default-amount'));
                });
            });
            document.querySelectorAll('[data-close-modal]').forEach(el=> el.addEventListener('click', closeModal));
            document.addEventListener('keydown', e=>{ if(e.key==='Escape') closeModal(); });

            if(amountSelect){
                amountSelect.addEventListener('change', ()=> amountInput.value = amountSelect.value);
            }
        })();
    </script>
@endsection
