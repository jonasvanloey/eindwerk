@extends('main')
@section('content')
    <div class="wrapper big">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <h1>Portfolio vervolledigen</h1>
            </div>
        </div>
        {!! Form::open(['method'=>'PUT','route'=>['portfolio.update',$item->id]]) !!}
        @include('portfolio.partials.form')
        {!! Form::close() !!}
    </div>
@endsection

