@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить пасту</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('paste.store') }}">
                            {{ csrf_field() }}
                            <label for="title">Название</label>
                            <input type="text" value="{{ old('title') }}" id="title" name="title"><br>
                            <label for="content">Текст</label>
                            <textarea id="content" name="content">{{ old('content') }}</textarea><br>
                            <label for="available_at">Срок действия</label>
                            <select id="available_at" name="available_at">
                                <option value="">Без ограничений</option>
                                <option value="10">10 минут</option>
                                <option value="60">1 час</option>
                                <option value="180">3 часа</option>
                                <option value="1440">1 день</option>
                                <option value="10080">1 неделя</option>
                                <option value="302400">1 месяц</option>
                            </select><br>
                            @if(isset($visibilities))
                                <label for="visibility_id">Доступность</label>
                                <select id="visibility_id" name="visibility_id">
                                    @foreach($visibilities as $visibility)
                                        <option value="{{ $visibility->id }}">{{ $visibility->show_name }}</option>
                                    @endforeach

                                </select><br>
                            @endif
                            <input type="submit" value="Опубликовать">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection