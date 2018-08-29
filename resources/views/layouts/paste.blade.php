@section('content')
    <div class="container">
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
    </div>
@endsection