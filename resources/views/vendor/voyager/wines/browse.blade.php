@extends('voyager::bread.browse')

@section('page_title', 'Все Вина')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-archive"></i> Все Вина
    </h1>
    <a href="{{ route('voyager.wines.create') }}" class="btn btn-success">Добавить новое вино</a>
@endsection

@section('content')
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <!-- Начало панели поиска -->
                        <form action="{{ route('voyager.wines.index') }}" method="GET" class="form-inline">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" placeholder="Поиск по товарам" value="{{ request('search') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Поиск</button>
                        </form>
                        <!-- Конец панели поиска -->

                        <table id="dataTable" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Картинка</th>
                                <th>Цена</th>
                                <th>Модель</th>
                                <th>Год</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($dataTypeContent->items() as $data)
                                <tr>
                                    <td>{{ $data->title }}</td>
                                    <td><img src="{{ asset ("/storage/" . $data->image) }}" style="width: 70px; height: 150px;"></td>

                                    <td>{{ $data->price }}</td>
                                    <td>{{ $data->model }}</td>
                                    <td>{{ $data->year }}</td>
                                    <td>
                                        <!-- Кнопка "Посмотреть" -->
                                        <a href="{{ route('voyager.wines.show', $data->id) }}" class="btn btn-sm btn-info">
                                            <i class="voyager-eye"></i> Посмотреть
                                        </a>

                                        <!-- Кнопка "Редактировать" -->
                                        <a href="{{ route('voyager.wines.edit', $data->id) }}" class="btn btn-sm btn-primary">
                                            <i class="voyager-edit"></i> Редактировать
                                        </a>

                                        <!-- Кнопка "Удалить" -->
                                        <form action="{{ route('voyager.wines.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">
                                                <i class="voyager-trash"></i> Удалить
                                            </button>
                                        </form>

                                        <!-- Кнопка "Копировать" -->
                                        <a href="{{ route('admin.wines.duplicate', $data->id) }}" class="btn btn-sm btn-warning">
                                            <i class="voyager-document"></i> Копировать
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <!-- Пагинация -->
                        <div class="pagination-wrapper">
                            {{ $dataTypeContent->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
