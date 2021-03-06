@extends('main')
@section('content')
    <div class="wrapper big d-flex justify-content-center align-items-center">
        @if(Auth::user()->hasRole('company'))
            <div class="stars ">
                <div class="row">
                    <div class="starrow">
                        {!! Form::open(['url' =>route('storestudentrating',[$posting_id,$student_id]), 'method' => 'post']) !!}
                        <input class="star star-5" id="star-5" type="radio" value="5" name="star"/>
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" value="4" name="star"/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" value="3" name="star"/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" value="2" name="star"/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" value="1" name="star"/>
                        <label class="star star-1" for="star-1"></label>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-12 no-gutters col-md-12 text-center">
                        {{Form::Submit('stuur je rating door',array('class' => 'btn big center-block'))}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        @elseif(Auth::user()->hasRole('student'))
            <div class="stars">
                {!! Form::open(['url' =>route('storecompanyrating',[$posting_id,$student_id]), 'method' => 'post']) !!}
                <input class="star star-5" id="star-5" type="radio" value="5" name="star"/>
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" value="4" name="star"/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" value="3" name="star"/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" value="2" name="star"/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" value="1" name="star"/>
                <label class="star star-1" for="star-1"></label>
                {{Form::Submit('stuur je rating door',array('class' => 'btn big'))}}
                {{Form::close()}}
            </div>
        @endif
    </div>


@endsection
