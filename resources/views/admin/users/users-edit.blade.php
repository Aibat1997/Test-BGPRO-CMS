@extends('admin.layouts.layout')

@section('css')

@endsection

@section('content')
<div class="page-wrapper" style="min-height: 319px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-8 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">
                    Добавить пользователя
                </h3>
            </div>
            <div class="col-md-4 col-4 align-self-center text-right">
                <a href="/admin/users" class="btn btn-danger">Назад</a>
            </div>
        </div>
        <div class="row">
            <form class="col-lg-12 col-md-12 row" action="/admin/users" method="POST" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <label>ФИО(ru)</label>
                                    <input type="text" class="form-control" name="user_name_ru" placeholder="" />
                                </div>
                                <div class="form-group">
                                    <label>ФИО(kz)</label>
                                    <input type="text" class="form-control" name="user_name_kz" placeholder="" />
                                </div>
                                <div class="form-group">
                                    <label>ФИО(en)</label>
                                    <input type="text" class="form-control" name="user_name_en" placeholder="" />
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="" />
                                </div>
                                <div class="form-group">
                                    <label>Телефон</label>
                                    <input type="tel" class="form-control" name="phone" id="phone"
                                        placeholder="8 (000) 000-00-00" />
                                </div>
                                <div class="form-group">
                                    <label>Дата рождения</label>
                                    <input type="date" class="form-control" name="date_of_birth" max="2999-12-31"
                                        placeholder="" />
                                </div>
                                <div class="form-group">
                                    <label>Роль</label>
                                    <select name="user_role_id" class="form-control">
                                        @include('admin.layouts.role')
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Пол</label><br>
                                    <input type="radio" class="form-check-input" name="male" value="1" id="male">
                                    <label class="form-check-label" for="male">
                                        Муж
                                    </label>
                                    <input type="radio" class="form-check-input" name="male" value="0" id="female">
                                    <label class="form-check-label" for="female">
                                        Жен
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="box box-primary" style="padding: 30px; text-align: center">
                                <div style="padding: 20px; border: 1px solid #c2e2f0">
                                    <img class="image-src" id="blah" src="/media/default.jpg" style="width: 100%; " />
                                </div>
                                <div style="background-color: #c2e2f0;height: 40px;margin: 0 auto;width: 2px;"></div>
                                <label class="btn btn-primary" for="imgInp">
                                    <input id="imgInp" type="file" name="avatar" class="d-none">
                                    <i class="fa fa-plus"></i>
                                </label>
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

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script>
    $(document).ready(function () {
        $('#phone').mask('8 (000) 000-00-00');
    });
</script>
@endsection