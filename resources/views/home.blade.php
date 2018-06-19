@extends('layouts.app')

@section('content')
    <div class="container jumbotron text-center m-t-20">
        @if(session('user') && session('visitor'))
            <h1>Welcome {{ session('user')->first_name }}</h1>
            <div class="container m-t-20 m-b-20">
                <h5>This is your {{ session('user')->frequency }}-th visit.</h5>
                <h6>(Your last visit at {{ session('visitor')->created_at }} with {{ session('visitor')->last_ip }})</h6>
            </div>
        @else

        @endif
    </div>
@endsection
