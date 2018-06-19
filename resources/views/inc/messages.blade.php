@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger text-center m-b-0">
            {{ $error }}
            <span class="lnr lnr-cross-circle pull-right"></span>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success text-center m-b-0">
        {{ session('success') }}
        <span class="lnr lnr-cross-circle pull-right"></span>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger text-center m-b-0">
        {{ session('error') }}
        <span class="lnr lnr-cross-circle pull-right"></span>
    </div>
@endif

@if(session('status'))
    <div class="alert alert-info text-center m-b-0">
        {{ session('status') }}
        <span class="lnr lnr-cross-circle pull-right"></span>
    </div>
@endif