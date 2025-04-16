@extends('layouts.app') {{-- если используешь layout --}}

@section('title', 'Страница не найдена')

@section('content')
    <div style="text-align: center; padding: 50px;">
        <h1>404</h1>
        <p>Упс! Страница не найдена.</p>
        <a href="{{ route('wine_shop') }}">Вернуться в магазин</a>
    </div>
@endsection
