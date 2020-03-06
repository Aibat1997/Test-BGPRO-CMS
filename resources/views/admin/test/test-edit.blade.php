@extends('admin.layouts.layout')

@section('content')
<div class="page-wrapper" style="min-height: 319px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-8 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">
                    Добавить
                </h3>
            </div>
            <div class="col-md-4 col-4 align-self-center text-right">
                <a href="/admin/{{ $programm->p_id }}/tests" class="btn btn-danger">Назад</a>
            </div>
        </div>
        <div class="row">
            @if(empty($test))
            <form class="col-lg-12 col-md-12 row" action="/admin/{{ $programm->p_id }}/tests" method="POST" enctype="multipart/form-data">
            @else
            <form class="col-lg-12 col-md-12 row" action="/admin/{{ $programm->p_id }}/tests/{{ $test->t_id }}" method="POST" enctype="multipart/form-data">
                @method('PUT') 
            @endif
                @csrf
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="card-block">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="box-body">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                            href="#nav-home" role="tab" aria-controls="nav-home"
                                            aria-selected="true">Русский</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                            href="#nav-profile" role="tab" aria-controls="nav-profile"
                                            aria-selected="false">Казахский</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                            href="#nav-contact" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">Английский</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <label>Название (ru)</label>
                                            <input type="text" class="form-control" name="t_name_ru" value="{{ !empty($test) ? $test->t_name_ru : old('t_name_ru') }}" />
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label>Название (kz)</label>
                                            <input type="text" class="form-control" name="t_name_kz" value="{{ !empty($test) ? $test->t_name_kz : old('t_name_kz') }}"/>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                        aria-labelledby="nav-contact-tab">
                                        <div class="form-group">
                                            <label>Название (en)</label>
                                            <input type="text" class="form-control" name="t_name_en" value="{{ !empty($test) ? $test->t_name_en : old('t_name_en') }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Попытки</label>
                                <input type="number" class="form-control" name="t_attempts" value="{{ !empty($test) ? $test->t_attempts : old('t_attempts') }}"/>
                            </div>
                            <div class="form-group">
                                <label>Сортировка</label>
                                @php
                                    $sort_num = App\Models\Test::count();
                                @endphp
                                <input type="number" class="form-control" name="t_sort_num" value="{{ !empty($test) ? $test->t_sort_num : $sort_num+1 }}"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 text-right">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection