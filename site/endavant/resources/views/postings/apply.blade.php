@extends('main')
@section('content')
    <div class="wrapper big">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
                <h1>
                    Meld je aan voor dit project
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
                <div class="row no-gutters">
                    <div class="col-12 col-md-9">
                            {!! Form::open(['url' =>route('storeapply',$item->id), 'method' => 'post']) !!}
                            @include('postings.partials.apply')
                            {!! Form::close() !!}
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-12">
                                <h2 class="accent">Geplaatst door</h2>
                            </div>
                            <div class="col-12 col-md-12 overzicht-block no-gutters text-center">
                                <div class="col-md-12">
                                    <img src="{{asset('img/imgplaceholder.jpg')}}" alt="" class="rounded-circle profile-pic">
                                </div>
                                <div class="col-md-12">
                                    <h2 class="name-title"><a href="#"><b>{{$item->company->users[0]->name}} {{$item->company->users[0]->familyname}}</b></a></h2>
                                </div>
                                <div class="col-md-12">
                                    <p>{{$item->company->name}}</p>
                                </div>
                                <div class="col-md-12">
                                    <a href="#" class="accent">Bekijk dit profiel...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
