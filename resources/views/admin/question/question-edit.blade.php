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
                <a href="/admin/{{ $test->t_id }}/questions" class="btn btn-danger">Назад</a>
            </div>
        </div>
        <div class="row">
            @if(empty($question))
            <form class="col-lg-12 col-md-12 row" action="/admin/{{ $test->t_id }}/questions" method="POST" enctype="multipart/form-data">
            @else
            <form class="col-lg-12 col-md-12 row" action="/admin/{{ $test->t_id }}/questions/{{ $question->q_id }}" method="POST" enctype="multipart/form-data">
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
                                {{-- <nav>
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
                                            <label>Вопрос(ru)</label>
                                            <textarea id="editor" name="q_name_ru" required>{{ !empty($question) ? $question->q_name_ru : old('q_name_ru') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label>Вопрос(kz)</label>
                                            <textarea id="editor1" name="q_name_kz">{{ !empty($question) ? $question->q_name_kz : old('q_name_kz') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                        aria-labelledby="nav-contact-tab">
                                        <div class="form-group">
                                            <label>Вопрос(en)</label>
                                            <textarea id="editor2" name="q_name_en">{{ !empty($question) ? $question->q_name_en : old('q_name_en') }}</textarea>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label>Вопрос</label>
                                    <textarea id="editor" name="q_name" required>{{ !empty($question) ? $question->q_name : old('q_name') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Язык</label>
                                    <select name="q_lang" id="">
                                        <option value="kz" {{ !empty($question) && $question->q_lang == 'kz' ? 'selected' : '' }}>KZ</option>
                                        <option value="ru" {{ !empty($question) && $question->q_lang == 'ru' ? 'selected' : '' }}>RU</option>
                                        <option value="en" {{ !empty($question) && $question->q_lang == 'en' ? 'selected' : '' }}>EN</option>
                                    </select>
                                </div>
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