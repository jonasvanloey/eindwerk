@extends('main')
@section('content')
<div class="wrapper big">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
            <h1>
                {{$item->title}}
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
            <div class="row no-gutters">
                <div class="col-12 col-md-9">
                    <div class="row no-gutters">
                        <h2 class="accent">Rede voor het project</h2>
                        {!! $item->reason  !!}
                    </div>
                    <div class="row no-gutters">
                        <h2 class="accent">Beschrijving van het project</h2>
                        {!! $item->description  !!}
                    </div>
                    <div class="row no-gutters">
                        <h2 class="accent">Informatie over de onderneming</h2>
                        <div class="col-12 col-md-8 no-gutters">
                            {!! $item->company->description  !!}
                        </div>
                        <div class="col-12 col-md-4 no-gutters">
                            mapje hier
                        </div>

                    </div>
                    <div class="row no-gutters">
                        <a href="" class="btn big col-12 col-md-12 no-gutters">Neem deel aan dit project</a>
                        <br>
                    </div>
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
