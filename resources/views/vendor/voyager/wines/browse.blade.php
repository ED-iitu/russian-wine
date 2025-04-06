@extends('voyager::bread.browse')

@section('actions')
    @parent
    @can('browse', app(App\Models\Wine::class))
        <a href="{{ route('admin.wines.duplicate', $data->id) }}" title="Копировать" class="btn btn-sm btn-warning">
            <i class="voyager-document"></i> <span class="hidden-xs hidden-sm">Копировать</span>
        </a>
    @endcan
@endsection