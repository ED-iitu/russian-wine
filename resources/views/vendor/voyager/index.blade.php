@extends('voyager::master')

@section('content')
    <div class="page-content">
        <h1>Дашборд</h1>

        <div class="row">
            <!-- Панель с количеством заказов -->
            <div class="col-md-4">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Кол-во заказов</h3>
                    </div>
                    <div class="box-body">
                        <h1>{{ $totalOrders }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
