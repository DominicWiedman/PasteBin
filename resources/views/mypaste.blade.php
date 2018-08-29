@extends('layouts.app')
@section('content')
    <div class="container">
        {{--@if(Auth::id() === \App\Paste::all()->get(user_id))--}}
        @foreach($pastes as $paste)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header">{{ $paste->title }}</div>

                        <div class="card-body">
                            <textarea type="text" name="content">{{ $paste->content }}</textarea>

                        </div>
                    </div>
                </div>
            </div><br>
        @endforeach
            {{--@endif--}}
    </div>
@endsection