{{-- Сначала родные действия --}}
@include('voyager::bread.partials.actions', ['data' => $data, 'dataType' => $dataType])

{{-- Потом твоя кнопка Копировать --}}
@can('browse', app(App\Models\Wine::class))
    <a href="{{ route('admin.wines.duplicate', $data->id) }}" title="Копировать" class="btn btn-sm btn-warning">
        <i class="voyager-document"></i> <span class="hidden-xs hidden-sm">Копировать</span>
    </a>
@endcan