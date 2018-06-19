@extends('layouts.app')

@section('content')
    <div class="container jumbotron text-center m-t-20">
        <h4>You will be directed to welcome page in <span id="time-left">3</span> seconds.</h4>
        <br>
        <a href="/register"><b>Click here to jump now</b></a>
    </div>

    <script type="text/javascript">
        onload = function () {
            setInterval(wait, 1000);
        };

        timeLeft = 3;
        function wait () {
            timeLeft--;
            if(timeLeft > 0){
                document.getElementById("time-left").innerHTML = timeLeft;
            }else{
                location.href='/register';
            }
        }
    </script>
@endsection