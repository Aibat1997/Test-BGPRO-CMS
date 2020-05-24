@php
    $role = App\Models\Role::all();
@endphp
    <option label="Выберите"></option>
@foreach ($role as $item)
    <option value="{{ $item->role_id }}">{{ $item->role_name_ru }}</option>
@endforeach