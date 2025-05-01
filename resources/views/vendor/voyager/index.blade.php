@extends('voyager::master')

@section('content')

    <div class="container-fluid">
        <h1 class="page-title">Дашборд</h1>

        <div class="row">
            <!-- Панель с количеством заказов -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title">Кол-во заказов</h4>
                    </div>
                    <div class="card-body text-center">
                        <h1 class="display-4">{{ $totalOrders }}</h1>
                        <p>Всего заказов</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('css')
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            border-radius: 10px 10px 0 0;
            padding: 15px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 500;
        }

        .display-4 {
            font-size: 3rem;
            font-weight: 700;
        }

        .page-title {
            font-size: 2rem;
            margin-bottom: 30px;
        }
    </style>
@endsection
