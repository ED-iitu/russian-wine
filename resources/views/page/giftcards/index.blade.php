@extends('layouts.app')

@section('title', 'Подарочные карты «Русское Вино»')

@section('content')
    <style>
        :root{
            --wine:#6f0f1a;      /* бордо, основной */
            --wine-dark:#4d0a12; /* тёмное бордо */
            --gold:#f2d694;      /* золото */
            --ink:#2b1b1b;       /* тёмный текст */
            --bg:#0a0304;        /* фоновый тёмный */
        }

        /* базовые */
        .gc *{box-sizing:border-box}
        .gc{font-family: "Georgia", "Times New Roman", serif; color:#fff; background:var(--bg); overflow:hidden}

        /* HERO full-bleed */
        .gc-hero{
            position:relative;
            width:100%;
            min-height:68vh;
            display:flex; align-items:flex-end;
            background:
                    linear-gradient(180deg, rgba(10,3,4,.25) 0%, rgba(10,3,4,.65) 60%, rgba(10,3,4,.9) 100%),
                    url('/images/giftcards/hero-wine.jpg') center/cover no-repeat;
        }
        .gc-hero-inner{
            width:100%;
            max-width:1280px;
            margin:0 auto; padding: clamp(18px, 3vw, 40px);
        }
        .gc-eyebrow{
            display:inline-block; letter-spacing:.14em; text-transform:uppercase;
            font-size:12px; padding:6px 10px; border:1px solid rgba(242,214,148,.6);
            color:var(--gold); border-radius:999px; backdrop-filter: blur(2px);
        }
        .gc-h1{
            margin:14px 0 8px; font-weight:700;
            font-size: clamp(32px, 4.2vw, 64px);
            line-height:1.05; color:#fff; text-shadow:0 2px 18px rgba(0,0,0,.45);
        }
        .gc-sub{max-width:780px; color:#f8f4ea; font-size: clamp(16px, 1.6vw, 20px); opacity:.95}
        .gc-cta-bar{display:flex; gap:12px; margin:26px 0 6px; flex-wrap:wrap}
        .gc-btn{
            background:linear-gradient(135deg,var(--wine),var(--wine-dark));
            border:1px solid rgba(242,214,148,.55);
            color:var(--gold); padding:14px 22px; border-radius:12px; font-weight:700; cursor:pointer;
            transition: transform .18s ease, box-shadow .18s ease;
        }
        .gc-btn:hover{ transform:translateY(-1px); box-shadow:0 10px 24px rgba(0,0,0,.32)}
        .gc-btn-ghost{
            background:transparent; color:#fff; border:1px solid rgba(255,255,255,.35);
        }

        /* section: номиналы (full width bg) */
        .gc-sec{
            width:100%; padding: clamp(28px, 4vw, 60px) clamp(16px, 3vw, 40px);
        }
        .gc-sec--tones{
            background:
                    radial-gradient(1200px 600px at 15% -10%, rgba(111,15,26,.25), transparent 60%),
                    radial-gradient(1000px 500px at 85% 110%, rgba(77,10,18,.25), transparent 60%),
                    url('/images/giftcards/grapes-texture.jpg') center/cover fixed;
            position:relative;
        }
        .gc-section-inner{max-width:1280px; margin:0 auto}
        .gc-sec-h2{
            font-size: clamp(26px, 3.2vw, 40px); color:var(--gold); margin:0 0 14px; font-weight:700
        }
        .gc-sec-sub{color:#e8e0d0; opacity:.95; margin-bottom:22px; max-width:900px}

        /* scroll grid mobile → grid desktop */
        .gc-denoms{
            display:grid; grid-template-columns: repeat(4, minmax(240px, 1fr)); gap:18px;
        }
        @media (max-width: 1024px){
            .gc-denoms{ grid-template-columns: repeat(2, minmax(240px, 1fr)); }
        }
        @media (max-width: 640px){
            .gc-denoms{
                display:flex; gap:14px; overflow-x:auto; padding-bottom:6px; scroll-snap-type:x mandatory;
            }
            .gc-card{ min-width: 82vw; scroll-snap-align: start;}
        }

        /* карточка номинала */
        .gc-card{
            background: #140708;
            border:1px solid rgba(242,214,148,.35);
            border-radius:18px; overflow:hidden;
            display:flex; flex-direction:column; justify-content:space-between;
            box-shadow:0 10px 24px rgba(0,0,0,.35);
            transition: transform .22s ease, box-shadow .22s ease;
        }
        .gc-card:hover{ transform: translateY(-6px); box-shadow:0 16px 34px rgba(0,0,0,.45)}
        .gc-cardTop{
            background:
                    linear-gradient(135deg, rgba(242,214,148,.16), rgba(242,214,148,.04)),
                    linear-gradient(135deg, #7f1621, #4d0a12);
            padding:20px;
            border-bottom:1px solid rgba(242,214,148,.28);
        }
        .gc-amount{ color:#fff; font-weight:700; font-size: clamp(24px, 2.6vw, 34px)}
        .gc-rub{ color:var(--gold); font-weight:700}
        .gc-cardBody{ padding:18px 20px 20px; color:#f5eee1}
        .gc-bullets{ margin:10px 0 16px; padding:0; list-style:none}
        .gc-bullets li{ margin:6px 0; display:flex; gap:10px; align-items:flex-start}
        .gc-badge{
            display:inline-flex; align-items:center; gap:8px; padding:8px 10px; border-radius:999px;
            border:1px solid rgba(242,214,148,.35); color:var(--gold); font-size:12px; white-space:nowrap
        }
        .gc-buy{
            margin-top:10px; width:100%; padding:12px 14px; border-radius:10px;
            background:linear-gradient(135deg,var(--wine),var(--wine-dark));
            border:1px solid rgba(242,214,148,.55); color:var(--gold); font-weight:700; cursor:pointer
        }
        .gc-buy:hover{ filter:brightness(1.05)}

        /* как это работает — полноширинные шаги */
        .gc-steps{
            display:grid; grid-template-columns: repeat(4, 1fr); gap:16px; margin-top:18px
        }
        .gc-step{
            background:#120608; border:1px solid rgba(242,214,148,.28);
            padding:18px; border-radius:14px; min-height:120px; color:#f6efe2
        }
        .gc-step b{ color:var(--gold)}
        @media (max-width:900px){ .gc-steps{ grid-template-columns: repeat(2, 1fr);} }
        @media (max-width:560px){ .gc-steps{ grid-template-columns: 1fr;} }

        /* FAQ (аккордеон) */
        .gc-faq-item{ border-top:1px solid rgba(242,214,148,.22) }
        .gc-faq-q{
            width:100%; text-align:left; background:transparent; color:#fff;
            padding:16px 0; font-size:18px; font-weight:600; cursor:pointer
        }
        .gc-faq-a{ max-height:0; overflow:hidden; transition:max-height .24s ease; color:#e7ded0; padding-right:4px}
        .gc-faq-item.active .gc-faq-a{ max-height:220px; padding-bottom:12px}

        /* модалка */
        .gc-modal{ position:fixed; inset:0; display:none; align-items:center; justify-content:center; z-index:60}
        .gc-modal.show{ display:flex }
        .gc-backdrop{ position:absolute; inset:0; background:rgba(0,0,0,.55); backdrop-filter: blur(2px)}
        .gc-dialog{
            position:relative; width:min(720px, 92vw); background:#0f0708; border:1px solid rgba(242,214,148,.4);
            border-radius:16px; box-shadow:0 20px 60px rgba(0,0,0,.6); overflow:hidden; z-index:1
        }
        .gc-dialogHead{
            padding:16px 18px; background:linear-gradient(135deg, #7f1621, #4d0a12);
            color:#fff; display:flex; align-items:center; justify-content:space-between
        }
        .gc-x{ background:transparent; border:0; color:#fff; font-size:22px; cursor:pointer}
        .gc-dialogBody{ padding:18px; display:grid; grid-template-columns: 1.2fr 1fr; gap:16px; color:#f2eadc}
        @media (max-width:720px){ .gc-dialogBody{ grid-template-columns: 1fr; } }

        .gc-form label{ display:block; font-size:13px; color:#e9dec9; margin:8px 0 6px}
        .gc-input, .gc-select{
            width:100%; padding:12px 12px; border-radius:10px; border:1px solid rgba(242,214,148,.28);
            background:#1a0a0c; color:#fff; outline:none
        }
        .gc-input::placeholder{ color:#bdaea2 }
        .gc-radio{ display:flex; gap:10px; align-items:center; margin:8px 0}
        .gc-submit{
            margin-top:10px; width:100%; padding:14px 16px; border-radius:12px;
            background:linear-gradient(135deg,var(--wine),var(--wine-dark));
            border:1px solid rgba(242,214,148,.55); color:var(--gold); font-weight:800; cursor:pointer
        }

        /* липкий CTA бар на мобилке */
        .gc-sticky{
            position:sticky; bottom:0; left:0; right:0; z-index:30; display:none;
            background: linear-gradient(180deg, rgba(10,3,4,.0), rgba(10,3,4,.85));
            padding:10px 14px
        }
        @media (max-width:640px){ .gc-sticky{ display:block } }

        /* helper */
        .visually-hidden{ position:absolute !important; width:1px; height:1px; overflow:hidden; clip:rect(0 0 0 0); white-space:nowrap }
    </style>

    <div class="gc" id="giftcardsApp">
        <!-- HERO -->
        <section class="gc-hero" aria-label="Подарочные карты — герой-секция">
            <div class="gc-hero-inner">
                <span class="gc-eyebrow">Подарочные карты</span>
                <h1 class="gc-h1">Дарите вкус и эмоции<br>с «Русским Вином»</h1>
                <p class="gc-sub">
                    Электронные и физические сертификаты номиналом 5 000–20 000 ₽. Стильная упаковка, 12 месяцев действия и
                    доступ к лучшим российским винам из нашего каталога.
                </p>
                <div class="gc-cta-bar">
                    <button class="gc-btn" data-open-modal data-default-amount="10000">Купить на 10 000 ₽</button>
                    <a href="#denoms" class="gc-btn gc-btn-ghost">Смотреть номиналы</a>
                </div>
            </div>
        </section>

        <!-- НОМИНАЛЫ -->
        <section id="denoms" class="gc-sec gc-sec--tones" aria-label="Выбор номинала">
            <div class="gc-section-inner">
                <h2 class="gc-sec-h2">Выберите номинал</h2>
                <p class="gc-sec-sub">Электронная карта приходит на e-mail сразу после оплаты. Физическую можем отправить курьером в подарочной упаковке.</p>

                @php($amounts = [5000, 10000, 15000, 20000])
                <div class="gc-denoms">
                    @foreach($amounts as $amount)
                        <article class="gc-card" aria-label="Карта на {{ number_format($amount,0,',',' ') }} ₽">
                            <header class="gc-cardTop">
                                <div class="gc-amount">
                                    {{ number_format($amount,0,',',' ') }} <span class="gc-rub">₽</span>
                                </div>
                            </header>
                            <div class="gc-cardBody">
                                <ul class="gc-bullets">
                                    <li>✔ Доступ ко всему каталогу</li>
                                    <li>✔ Срок действия — 12 месяцев</li>
                                    <li>✔ Можно использовать частями</li>
                                </ul>
                                <div class="gc-badge">Электронная или физическая карта</div>
                                <button class="gc-buy" data-open-modal data-default-amount="{{ $amount }}">Купить</button>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="gc-steps">
                    <div class="gc-step"><b>1.</b> Выберите номинал и формат (e-mail или упаковка)</div>
                    <div class="gc-step"><b>2.</b> Оплатите банковской картой / СБП</div>
                    <div class="gc-step"><b>3.</b> Получите сертификат и код</div>
                    <div class="gc-step"><b>4.</b> Используйте сразу или частями в течение 12 мес.</div>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section class="gc-sec" aria-label="Частые вопросы">
            <div class="gc-section-inner">
                <h2 class="gc-sec-h2">FAQ</h2>
                <div class="gc-faq">
                    <div class="gc-faq-item">
                        <button class="gc-faq-q" type="button">Как я получу электронную карту?</button>
                        <div class="gc-faq-a"><p>Сразу после оплаты мы отправим PDF-сертификат с уникальным кодом на ваш e-mail.</p></div>
                    </div>
                    <div class="gc-faq-item">
                        <button class="gc-faq-q" type="button">Можно ли использовать карту частями?</button>
                        <div class="gc-faq-a"><p>Да. Любой остаток сохраняется на балансе до даты окончания (12 месяцев).</p></div>
                    </div>
                    <div class="gc-faq-item">
                        <button class="gc-faq-q" type="button">Доставляете физические карты?</button>
                        <div class="gc-faq-a"><p>Да. По России — курьером/почтой. Упаковка премиум, можно добавить открытку.</p></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Липкий CTA (мобилка) -->
        <div class="gc-sticky">
            <div class="gc-section-inner" style="display:flex; gap:10px">
                <button class="gc-btn" data-open-modal data-default-amount="5000" style="flex:1">Купить от 5 000 ₽</button>
                <a href="#denoms" class="gc-btn gc-btn-ghost" style="flex:1;text-align:center">Выбрать сумму</a>
            </div>
        </div>

        <!-- MODAL -->
        <div class="gc-modal" id="gcModal" aria-modal="true" role="dialog" aria-labelledby="gcModalTitle" aria-hidden="true">
            <div class="gc-backdrop" data-close-modal></div>
            <div class="gc-dialog">
                <header class="gc-dialogHead">
                    <h3 id="gcModalTitle" style="font-size:18px; font-weight:700">Оформление подарочной карты</h3>
                    <button class="gc-x" title="Закрыть" aria-label="Закрыть" data-close-modal>×</button>
                </header>
                <div class="gc-dialogBody">
                    <div>
                        <form class="gc-form" method="POST" action="{{ route('giftcards.buy') }}">
                            @csrf
                            <input type="hidden" name="amount" id="gcAmountInput" value="10000">
                            <label>Номинал</label>
                            <select class="gc-select" id="gcAmountSelect" aria-label="Выберите номинал">
                                @foreach($amounts as $a)
                                    <option value="{{ $a }}">{{ number_format($a,0,',',' ') }} ₽</option>
                                @endforeach
                            </select>

                            <label>Ваше имя</label>
                            <input type="text" name="name" class="gc-input" placeholder="Иван" required>

                            <label>E-mail для отправки сертификата</label>
                            <input type="email" name="email" class="gc-input" placeholder="you@example.com" required>

                            <label>Телефон (необязательно)</label>
                            <input type="text" name="phone" class="gc-input" placeholder="+7 (___) ___-__-__">

                            <label>Формат карты</label>
                            <div class="gc-radio">
                                <input type="radio" id="fmt1" name="format" value="e-card" checked>
                                <label for="fmt1">Электронная (PDF на e-mail)</label>
                            </div>
                            <div class="gc-radio">
                                <input type="radio" id="fmt2" name="format" value="physical">
                                <label for="fmt2">Физическая (красивая упаковка)</label>
                            </div>

                            <button type="submit" class="gc-submit">Перейти к оплате</button>
                            <p style="font-size:12px; color:#bfae92; margin-top:8px">
                                Нажимая кнопку, вы соглашаетесь с условиями оплаты и офертой.
                            </p>
                        </form>
                    </div>
                    <aside style="border-left:1px solid rgba(242,214,148,.25); padding-left:16px">
                        <p style="color:#e7ddc8">Что включено:</p>
                        <ul class="gc-bullets" style="margin-top:8px">
                            <li>✔ Доступ ко всему ассортименту</li>
                            <li>✔ Срок действия — 12 месяцев</li>
                            <li>✔ Остаток сохраняется</li>
                            <li>✔ Оплата картой / СБП</li>
                        </ul>
                        <div style="margin-top:12px; color:#bfae92; font-size:13px">
                            После оплаты мы сразу отправим код и инструкцию. Физическую карту доставим отдельно.
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function(){
            const modal = document.getElementById('gcModal');
            const amountInput = document.getElementById('gcAmountInput');
            const amountSelect = document.getElementById('gcAmountSelect');

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
                btn.addEventListener('click', (e)=>{
                    const val = btn.getAttribute('data-default-amount');
                    openModal(val);
                });
            });
            document.querySelectorAll('[data-close-modal]').forEach(el=>{
                el.addEventListener('click', closeModal);
            });
            document.addEventListener('keydown', (e)=>{ if(e.key==='Escape') closeModal(); });

            if(amountSelect){
                amountSelect.addEventListener('change', ()=>{
                    amountInput.value = amountSelect.value;
                });
            }

            // FAQ accordion
            document.querySelectorAll('.gc-faq-q').forEach(q=>{
                q.addEventListener('click', ()=>{
                    const item = q.closest('.gc-faq-item');
                    item.classList.toggle('active');
                });
            });
        })();
    </script>
@endsection
