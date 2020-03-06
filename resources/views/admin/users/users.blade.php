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
          <a>Пользователи</a>
        </h3>
      </div>
      <div class="col-md-4 col-4 align-self-center text-right">
        <a href="/admin/users/create" class="btn btn-success">Добавить</a>
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
                  <th>Фото</th>
                  <th>ФИО</th>
                  <th>Логин</th>
                  <th>Сбросить пароль</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach ($users as $value)
                <tr>
                  <td>{{ $value->user_id }}</td>
                  <td><img src="{{ $value->avatar }}" alt=""></td>
                  <td>{{ $value->user_name_ru }}</td>
                  <td>{{ $value->email }}</td>
                  <td></td>
                  <td>
                    <a href="javascript:void(0)" onclick="remove(this,'{{ $value->user_id }}','users')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                  <td><i class="fas fa-pen"></i></td>
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