@extends('main')
@section('content')
    <div class="wrapper big">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <h1>Nieuwe Job toevoegen</h1>
            </div>
        </div>
        {!! Form::open(['url' =>route('jobs.store'), 'method' => 'post']) !!}
            @include('postings.partials.form')
        {!! Form::close() !!}
    </div>
@endsection

