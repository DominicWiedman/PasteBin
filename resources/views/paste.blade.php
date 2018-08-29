@extends('layouts.app')
@section('content')
<div class="container">
{{--{{ dd($paste) }}--}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ $paste->title }}</div>

                <div class="card-body">
                    <code type="text">{{ $paste->content }}</code><br>
                    <p>Ссылка на пасту</p>
                    <p>
                        <a href="{{ route('paste.show', ['hash'=> $paste->hash]) }}">
                            {{ route('paste.show', ['hash'=> $paste->hash]) }}
                        </a>
                    </p>
                    <p>Срок действия</p>
                    <p>{{ $paste->available_at ? $paste->available_at->format('d.m.Y H:i') : 'Без ограничений'}}</p>


                </div>
            </div>
        </div>
    </div><br>

</div>
@endsection