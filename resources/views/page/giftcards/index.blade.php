@extends('layouts.app')

@section('title', 'Подарочные карты «Русское Вино»')

@section('content')
    <div class="bg-gray-50 py-12">
        <div class="max-w-5xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-red-900 mb-4">🎁 Подарочные карты «Русское Вино»</h1>
            <p class="text-lg text-gray-700 mb-8">
                Дарите вкус и эмоции! Выберите номинал и подарите вашим близким возможность открыть мир российских вин.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                @foreach($amounts as $amount)
                    <div class="bg-white p-6 rounded-xl shadow-lg flex flex-col justify-between">
                        <div>
                            <div class="text-2xl font-bold text-red-700 mb-4">{{ number_format($amount, 0, ',', ' ') }} ₽</div>
                            <p class="text-gray-600">Электронная или физическая карта</p>
                        </div>
                        <form method="POST" action="{{ route('giftcards.buy') }}" class="mt-6">
                            @csrf
                            <input type="hidden" name="amount" value="{{ $amount }}">
                            <input type="text" name="name" placeholder="Ваше имя" required class="w-full mb-2 border p-2 rounded">
                            <input type="email" name="email" placeholder="Email" required class="w-full mb-2 border p-2 rounded">
                            <input type="text" name="phone" placeholder="Телефон" class="w-full mb-2 border p-2 rounded">
                            <button type="submit" class="w-full bg-red-700 text-white py-2 rounded-lg hover:bg-red-800">
                                Купить
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 text-left max-w-3xl mx-auto">
                <h2 class="text-2xl font-bold mb-4">Как это работает</h2>
                <ul class="list-disc pl-5 space-y-2 text-gray-700">
                    <li>Вы выбираете номинал карты</li>
                    <li>Оплачиваете онлайн</li>
                    <li>Получаете электронную или физическую карту</li>
                    <li>Дарите и радуете близких</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
