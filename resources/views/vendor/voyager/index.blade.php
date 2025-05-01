@extends('voyager::master')

@section('content')

    <div class="container-fluid">
        <h1 class="page-title">Дашборд</h1>

        <div class="row">
            <!-- Количество заказов -->
            <div class="col-md-4 mb-4">
                <div class="panel panel-bordered">
                    <div class="panel-body text-center">
                        <div class="dimmer">
                            <div class="dimmer-content">
                                <div class="mb-3">
                                    <i class="fa fa-shopping-cart fa-3x text-primary"></i>
                                </div>
                                <h1 class="display-4">{{ $totalOrders }}</h1>
                                <p>Кол-во заказов</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Общая сумма -->
            <div class="col-md-4 mb-4">
                <div class="panel panel-bordered">
                    <div class="panel-body text-center">
                        <div class="dimmer">
                            <div class="dimmer-content">
                                <div class="mb-3">
                                    <i class="fa fa-money-bill-wave fa-3x text-success"></i>
                                </div>
                                <h1 class="display-4">{{ number_format($totalAmount) }} Рублей</h1>
                                <p>Общая сумма</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-xh6ghhO7c7IgzvTr0tw6+NxG7GgZlEctITyGDQXLb2OE+jYjZz4HqHy2CFKqos1lJ1HLLFTRRyThwAy6AvFVyg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .dimmer {
            position: relative;
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .dimmer:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .dimmer-content h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .dimmer-content p {
            font-size: 1rem;
            color: #6c757d;
        }

        .panel {
            border-radius: 10px;
            border: none;
            background: transparent;
        }

        .panel-body {
            padding: 0;
        }

        .page-title {
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .row {
            margin-top: 20px;
        }

        .fa {
            margin-bottom: 10px;
        }
    </style>
@endsection
