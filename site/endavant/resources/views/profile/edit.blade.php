@extends('main')
@section('content')
    <div class="wrapper big">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <h1>
                    Profiel aanpassen
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                {!! Form::open(['method'=>'PUT','route'=>['profile.update',$item->id]]) !!}
                @include('profile.partials.form')
                {!! Form::close() !!}            </div>
        </div>
    </div>
@endsection