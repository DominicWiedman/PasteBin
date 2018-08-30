@extends('layouts.app')
@section('content')
    <div class="container">

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
            {{--@endif--}}
    </div>
@endsection