@extends('layouts.app')
@section('content')
    <div class="container">
        {{-- Заменить на цикл с условием while
        (взять id авторизованного юзера и сверить пасты с таким же значением user_id)--}}
        @foreach($pastes as $paste)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ $paste->title }}</div>
                        <div class="card-body">
                            <code type="text">{{ $paste->content }}</code>
                        </div>
                    </div>
                </div>
            </div><br>
        @endforeach
    </div>
@endsection