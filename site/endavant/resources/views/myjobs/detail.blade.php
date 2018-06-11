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
                            <div class="col-12 col-md-12 no-gutters">
                                {!! $item->reason  !!}
                            </div>

                        </div>
                        <div class="row no-gutters">
                            <h2 class="accent">Beschrijving van het project</h2>
                            <div class="col-12 col-md-12 no-gutters">
                                {!! $item->description  !!}
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <h2 class="accent">Informatie over de onderneming</h2>
                            <div class="col-12 col-md-8 ">
                                {!! $item->company->description  !!}
                            </div>
                            <div class="col-12 col-md-4">
                                <div style="width: 100%; height:200px;">
                                    {!! Mapper::render() !!}
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-12">
                                <h2 class="accent">Geplaatst door</h2>
                            </div>
                            <div class="col-12 col-md-12 overzicht-block no-gutters text-center">
                                <div class="col-md-12">
                                    @if($item->company->users[0]->image === null)
                                        <img src="{{asset('img/imgplaceholder.jpg')}}" alt="" class="rounded-circle profile-pic">
                                    @else
                                        <img src="{{$item->company->users[0]->image}}" alt="" class="rounded-circle profile-pic">
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <h2 class="name-title"><a
                                                href="#"><b>{{$item->company->users[0]->name}} {{$item->company->users[0]->familyname}}</b></a>
                                    </h2>
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
