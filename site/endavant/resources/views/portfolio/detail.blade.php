@extends('main')
@section('content')
    <div class="wrapper big">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
                <h1>
                    De opdracht
                </h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
                <h2 class="accent">
                    {{$item->posting->title}}
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
                <div class="row no-gutters">
                    <div class="col-12 col-md-9">
                        <div class="row no-gutters">
                            <h3 class="accent">Rede voor het project</h3>
                            <div class="col-12 col-md-12 no-gutters">
                                {!! $item->posting->reason  !!}
                            </div>

                        </div>
                        <div class="row no-gutters">
                            <h3 class="accent">Beschrijving van het project</h3>
                            <div class="col-12 col-md-12 no-gutters">
                                {!! $item->posting->description  !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-12">
                                <h3 class="accent">Geplaatst door</h3>
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
                                    <h3 class="name-title"><a
                                                href="#"><b>{{$item->posting->company->users[0]->name}} {{$item->posting->company->users[0]->familyname}}</b></a>
                                    </h3>
                                </div>
                                <div class="col-md-12">
                                    <p>{{$item->posting->company->name}}</p>
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
        <hr>
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
                <h1>
                    Feedback van {{$item->student->user->name}}
                </h1>
                @if(Auth::check()&& $item->student->user->id===Auth::user()->id )
                    <a href="{{route('portfolio.edit',$item->id)}}" class="btn-grey btn"><span
                                class="fa fa-edit"></span>feedback aanpassen</a>
                @endif
            </div>
            <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
                <h2 class="accent">
                    Beschrijving over het verloop van het project
                </h2>
            </div>
            <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
                @if($item->description)
                    {!!  $item->description!!}
                @else
                    @if(Auth::check()&& $item->student->user->id===Auth::user()->id )
                        <div class="col-12 col-md-12 text-center add-description">
                            <span class="fa fa-edit"></span>
                            <a href="{{route('portfolio.edit',$item->id)}}">Beschrijving toevoegen</a>
                        </div>
                    @else
                        <p>Er is nog geen beschrijving toegevoegd</p>
                    @endif
                @endif
            </div>
            <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
                @if($item->link)
                    <a href="//{{$item->link}}" class="btn big col-12 col-md-12 no-gutters" target="_blank">Neem
                        deel aan dit project</a>
                @endif
            </div>
        </div>
    </div>
@endsection
