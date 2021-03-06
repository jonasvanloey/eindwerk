@extends('main')
@section('content')
    <div class="wrapper small">
        <div class="row no-gutters ">
            <div class="col-12 col-md-3 text-center">
                <div class="overzicht-block">
                    <div class="col-md-12">
                        @if($item->user->image === null)
                            <img src="{{asset('img/imgplaceholder.jpg')}}" alt="" class="rounded-circle profile-pic">
                        @else
                            <img src="{{$item->user->image}}" alt="" class="rounded-circle profile-pic">
                        @endif
                    </div>
                    <div class="col-md-12">
                        <h2 class="name-title"><b>{{$item->user->name}} {{$item->user->familyname}}</b></h2>
                    </div>
                    <div class="col-md-12">
                        <p>{{$item->user->phone_number}}</p>
                    </div>
                    <div class="col-md-12">
                        <p>{{$item->user->email}}</p>
                    </div>
                    <div class="col-md-12">
                        <p>{{$item->user->adress}}</p>
                    </div>
                    <div class="col-md-12">
                        <p>{{$item->user->zip_code}} {{$item->user->city}}</p>
                    </div>
                    <div class="col-md-12">
                        <div style="width: 100%; height:200px;">
                            {!! Mapper::render() !!}
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12 ">
                        @if(Auth::check()&& Auth::user()->hasRole('company'))
                            @if(!$favorites->contains($item->id))
                                {!!  Form::open(['url' => route('addStudToFave',$item->id),'method' => 'POST']) !!}
                                {!! Form::submit('Toevoegen aan favorieten',array('class' => 'btn col-md-12')) !!}
                                {!! Form::close() !!}
                            @else
                                {{ Form::open(['method' => 'DELETE', 'url' => route('addStudToFave',$item->id)]) }}
                                {{ Form::submit('Verwijder uit favorieten', ['class' => 'btn btn-red col-md-12']) }}
                                {{ Form::close() }}
                            @endif
                        @endif
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-12 col-md-9 profile-info">
                <div class="row ">
                    <div class="col-12 col-md-6">
                        <h1>Info over {{$item->user->name}}</h1>
                    </div>
                    <div class="col-12 col-md-6 text-right">
                        @if(Auth::check()&& $item->user->id===Auth::user()->id )
                            <a href="{{route('profile.edit',$item->id)}}" class="btn-grey btn"><span
                                        class="fa fa-edit"></span>profiel aanpassen</a>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    @if($item->description)
                        {!!  $item->description!!}
                    @else
                        @if(Auth::check()&& $item->user->id===Auth::user()->id )
                            <div class="col-12 col-md-12 text-center add-description">
                                <span class="fa fa-edit"></span>
                                <a href="{{route('profile.edit',$item->id)}}">Beschrijving toevoegen</a>
                            </div>
                        @else
                            <p>Er is nog geen informatie toegevoegd over {{$item->user->name}}</p>
                        @endif
                    @endif
                </div>
                <div class="col-12 col-md-12">
                    <h2>Portfolio</h2>
                </div>
                <div class="col-12 col-md-12">
                    <div class="row">
                        @if(!$item->portfolios->isEmpty())
                            @foreach($item->portfolios as $port)
                                <div class="col-12 col-md-6">
                                    @include('partials.portfolio',['title'=>$port->posting->title,'name'=>$port->posting->company->users[0]->name.' '.$port->posting->company->users[0]->familyname,'company'=>$port->posting->company->name,'adress'=>$port->posting->company->adress,'city'=>$port->posting->company->zip_code,'port_id'=>$port->id,'id'=>$item->id])
                                </div>
                            @endforeach
                        @else
                            <p>{{$item->name}} heeft nog geen portfolio. Maar zou wel graag een kans krijgen van u.</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <h2>Rating</h2>
                </div>
                <div id="app" class="col-12 col-md-12">
                    <star-rating :rating="{{$avg}}" :read-only="true" :increment="0.01"></star-rating>
                    <p>{{count($item->ratings)}} reviews</p>
                </div>
            </div>
        </div>
    </div>
@endsection