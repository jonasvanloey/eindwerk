@extends('main')
@section('content')
    <div class="wrapper big">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
                <div class="row">
                    <h1>
                        {{$item->title}}
                    </h1>
                </div>
                <div class="row">
                    @if(Auth::check()&& Auth::user()->hasRole('company'))
                        @if($item->company->id===Auth::user()->companies->first()->id)
                            <a href="{{route('jobs.edit',$item->id)}}" class="btn-grey btn"><span
                                        class="fa fa-edit"></span> aanpassen</a>
                        @endif
                    @endif
                    @if(Auth::check()&& Auth::user()->hasRole('company'))
                        @if($item->company->id===Auth::user()->companies->first()->id)
                            {{ Form::open(['method' => 'DELETE', 'route' => ['jobs.destroy', $item->id]]) }}
                            {{ Form::submit('verwijderen', ['class' => 'btn btn-red']) }}
                            {{ Form::close() }}
                @endif
                @endif
            </div>

        </div>
        <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
            @foreach($item->tags as $tag)
                <p class="tag">{{$tag->tag}}</p>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
            <div class="row no-gutters post-blck">
                <div class="col-12 col-md-9">
                    <div class="row no-gutters">
                        <h2 class="accent">Rede voor het project</h2>
                        <div class="col-12 col-md-12 no-gutters post-txt">
                            {!! $item->reason  !!}
                        </div>

                    </div>
                    <div class="row no-gutters post-blck">
                        <h2 class="accent">Beschrijving van het project</h2>
                        <div class="col-12 col-md-12 no-gutters post-txt">
                            {!! $item->description  !!}
                        </div>
                    </div>
                    <div class="row no-gutters post-blck">
                        <h2 class="accent">Informatie over de onderneming</h2>
                        <div class="col-12 col-md-8 post-txt">
                            {!! $item->company->description  !!}
                        </div>
                        <div class="col-12 col-md-4">
                            <div style="width: 100%; height:200px;">
                                {!! Mapper::render() !!}
                            </div>
                        </div>

                    </div>
                    <div class="row no-gutters">
                        @if(Auth::check() &&!Auth::user()->hasRole('company'))
                            <a href="{{route('showapply',$item->id)}}" class="btn big col-12 col-md-12 no-gutters post-btn">Neem
                                deel aan dit project</a>
                        @endif
                        <br>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-12">
                            <h2 class="accent">Geplaatst door</h2>
                        </div>
                        <div class="col-12 col-md-12 overzicht-block no-top no-gutters text-center">
                            <div class="col-md-12">
                                @if($item->company->users[0]->image === null)
                                    <img src="{{asset('img/imgplaceholder.jpg')}}" alt="placeholder"
                                         class="rounded-circle profile-pic">
                                @else
                                    <img src="{{$item->company->users[0]->image}}" alt="{{$item->company->users[0]->name}}"
                                         class="rounded-circle profile-pic">
                                @endif
                            </div>
                            <div class="col-md-12">
                                <h2 class="name-title"><a
                                            href="{{route('company.show',$item->company->id)}}"><b>{{$item->company->users[0]->name}} {{$item->company->users[0]->familyname}}</b></a>
                                </h2>
                            </div>
                            <div class="col-md-12">
                                <p>{{$item->company->name}}</p>
                            </div>
                            <div class="col-md-12">
                                <a href="{{route('company.show',$item->company->id)}}" class="accent">Bekijk dit profiel...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
