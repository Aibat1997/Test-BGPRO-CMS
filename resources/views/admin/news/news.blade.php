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
          <a>Новости</a>
        </h3>
      </div>
      <div class="col-md-4 col-4 align-self-center text-right">
        <a href="/admin/news/create" class="btn btn-success">Добавить</a>
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
                  <th>Название</th>
                  <th>Дата</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach ($news as $key=>$value)
                <tr>
                  <td>{{ $key+1}}</td>
                  <td><img src="{{ $value->news_image }}" alt=""></td>
                  <td>{{ $value->news_name_ru }}</td>
                  <td>{{ App\Http\Helpers::simpleDate($value->updated_at) }}</td>
                  <td>
                    <a href="javascript:void(0)" onclick="remove(this,'{{ $value->news_id }}','news')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                  <td><a href="/admin/news/{{ $value->news_id }}/edit"><i class="fas fa-pen"></i></a></td>
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