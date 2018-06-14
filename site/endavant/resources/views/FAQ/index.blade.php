@extends('main')

@section('content')

    <div class="wrapper big">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
                <h1>FAQ</h1>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-12 col-md-7 offset-md-2 offset-sm-0">
                {!!  Form::open(['url' => '/FAQ','method' => 'GET']) !!}
                <label for="question">Zoek jouw vraag</label>
                <input type="text" name="question" class="form-control">

            </div>
            <div class="col-12 col-md-1">

                {!! Form::submit('Zoek',array('class' => 'btn faqbtn')) !!}
                {!! Form::close() !!}
            </div>

        </div>
        <div class="row faqfield">
            <div class="col-12 col-md-8 offset-md-2 offset-sm-0 card">
                @foreach($questions as $q)
                    <div class="row no-gutters faq">
                        <div class="col-12 col-md-12">
                            <h2><a data-toggle="collapse" href="#collapse{{$q->id}}" role="button"
                                   aria-expanded="false"
                                   aria-controls="collapse{{$q->id}}">{{$q->question}}</a></h2>
                        </div>
                        <hr>
                        <div id="collapse{{$q->id}}" class="company collapse multi-collapse col-12 col-md-12">
                            {{$q->answers[0]->answer}}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection