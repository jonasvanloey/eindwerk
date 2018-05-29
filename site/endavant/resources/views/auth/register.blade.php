@extends('main')

@section('content')
<div class="wrapper small">
    <div class="row">
        <div class="col-12">
            <h1>Registratie</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2 class="accent">Persoonlijke gegevens</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            {!! Form::open(['url' =>route('register'), 'method' => 'post']) !!}
            @include('auth.partials.form');
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
