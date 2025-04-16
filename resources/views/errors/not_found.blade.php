@extends('layouts.app')

@section('title', 'Страница не найдена')

@section('content')
    <div style="
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        height: 80vh;
        text-align: center;
    ">
        <h1 style="font-size: 6rem; margin-bottom: 1rem;">404</h1>
        <p style="font-size: 1.5rem; margin-bottom: 2rem;">Упс! Страница не найдена.</p>
        <a href="{{ route('wine_shop') }}" style="
            padding: 0.75rem 1.5rem;
            background-color: #a42134;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        ">
            Вернуться в магазин
        </a>
    </div>
@endsection
