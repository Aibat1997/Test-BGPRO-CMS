@extends('admin.layouts.layout')

@section('css')
<style>
td img{
  width: 85px;
  height: 85px;
}
</style>
@endsection

@section('content')
<div class="page-wrapper" style="min-height: 319px;">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-8 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0 d-inline-block">
          <a>Вопросы</a>
        </h3>
      </div>
      <div class="col-md-4 col-4 align-self-center text-right">
        <a href="/admin/tests" class="btn btn-danger">Назад</a>
        <a href="/admin/{{ $test->t_id }}/questions/create/excel" class="btn btn-warning">Добавить Excel файлом</a>
        <a href="/admin/{{ $test->t_id }}/questions/create" class="btn btn-success">Добавить</a>
      </div>
    </div>

    <div class="row white-bg">
      <div class="col-md-12">
        <div class="box-body">
          <div class="table-responsive">
            <table id="showed" class="table table-bordered table-striped">
              <thead>
                <tr style="border: 1px">
                  <th style="width: 30px">№</th>
                  <th>Название</th>
                  <th>Дата</th>
                  <th>Перейти к ответам</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach ($questions as $key=>$value)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  {{-- @if(!is_null($value->q_name_ru))
                    <td class="td-overflow">{!! $value->q_name_ru !!}</td>
                  @elseif(!is_null($value->q_name_kz))
                    <td class="td-overflow">{!! $value->q_name_kz !!}</td>
                  @else
                    <td class="td-overflow">{!! $value->q_name_en !!}</td>
                  @endif --}}
                  <td class="td-overflow">{!! $value->q_name !!}</td>
                  <td>{{ App\Http\Helpers::simpleDate($value->updated_at) }}</td>
                  <td>
                    <a href="/admin/{{ $value->q_id }}/answers" class="btn btn-success">Перейти</a>
                  </td>
                  <td>
                    <a href="javascript:void(0)" onclick="remove(this,'{{ $value->q_id }}','{{ $test->t_id }}/questions')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                  <td><a href="/admin/{{ $test->t_id }}/questions/{{ $value->q_id }}/edit"><i class="fas fa-pen"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
@endsection