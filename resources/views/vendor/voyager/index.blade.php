@extends('voyager::master')

@section('content')

    <div class="container-fluid">
        <h1 class="page-title">Дашборд</h1>

        <div class="row">
            <!-- Панель с количеством заказов -->
            <div class="col-md-4 mb-4">
                <div class="panel panel-bordered">
                    <div class="panel-body text-center">
                        <div class="dimmer">
                            <div class="dimmer-content">
                                <h1 class="display-4">{{ $totalOrders }}</h1>
                                <p>Кол-во заказов</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="panel panel-bordered">
                    <div class="panel-body text-center">
                        <div class="dimmer">
                            <div class="dimmer-content">
                                <h1 class="display-4">{{ $totalAmount }}</h1>
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

        .dimmer-content {
            z-index: 2;
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
    </style>
@endsection
