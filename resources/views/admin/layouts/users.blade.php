@php
    $user = App\Models\User::all();
@endphp
    <option selected>Выберите</option>
@foreach ($user as $item)
    <option value="{{ $item->user_id }}">{{ $item->user_name_ru }}</option>
@endforeach