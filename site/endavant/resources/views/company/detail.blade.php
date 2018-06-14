@extends('main')
@section('content')
    <div class="wrapper small">
        <div class="row no-gutters ">
            <div class="col-12 col-md-3  text-center">
                <div class="overzicht-block">
                    <div class="col-md-12">
                        @if($item->image === null)
                            <img src="{{asset('img/imgplaceholder.jpg')}}" alt="placeholder"
                                 class="rounded-circle profile-pic">
                        @else
                            <img src="{{$item->image}}" alt="{{$item->name}}" class="rounded-circle profile-pic">
                        @endif
                    </div>
                    <div class="col-md-12">
                        <h2 class="name-title"><b>{{$item->name}}</b></h2>
                    </div>
                    <div class="col-md-12">
                        <p>{{$item->phone_number}}</p>
                    </div>
                    <div class="col-md-12">
                        <p>{{$item->adress}}</p>
                    </div>
                    <div class="col-md-12">
                        <p>{{$item->zip_code}} {{$item->city}}</p>
                    </div>
                    <div class="col-md-12">
                        @if(Auth::check()&& Auth::user()->hasRole('company'))
                            @if($item->id===Auth::user()->companies->first()->id)
                                <a href="{{route('company.edit',$item->id)}}" class="btn-grey btn"><span
                                            class="fa fa-edit"></span>info
                                    aanpassen</a>
                            @endif
                        @endif
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <h3 class="accent">Werknemers</h3>
                    </div>
                    @foreach($item->users as $user)

                        <div class="col-md-12">
                            @if($user->image === null)
                                <img src="{{asset('img/imgplaceholder.jpg')}}" alt=""
                                     class="rounded-circle profile-pic">
                            @else
                                <img src="{{$user->image}}" alt="" class="rounded-circle profile-pic">
                            @endif
                        </div>
                        <div class="col-md-12">
                            <h3 class="name-title"><b>{{$user->name}} {{$user->familyname}}</b></h3>
                        </div>
                        <div class="col-md-12">
                            <p>{{$user->phone_number}}</p>
                        </div>
                        <div class="col-md-12">
                            <p>{{$user->email}}</p>
                        </div>
                        @if(Auth::check() && $user->id===Auth::user()->id)
                            <div class="col-md-12">
                                <a href="{{route('user.edit',$user->id)}}" class="btn-grey btn"><span
                                            class="fa fa-edit"></span>werknemer
                                    aanpassen</a>
                            </div>
                        @endif
                    @endforeach
                    <div class="col-md-12 ">
                        @if(Auth::check()&& Auth::user()->hasRole('student'))
                            @if(!$favorites->contains($item->id))
                                {!!  Form::open(['url' => route('addCompToFave',$item->id),'method' => 'POST']) !!}
                                {!! Form::submit('Toevoegen aan favorieten',array('class' => 'btn col-md-12')) !!}
                                {!! Form::close() !!}
                            @else
                                {{ Form::open(['method' => 'DELETE', 'url' => route('addCompToFave',$item->id)]) }}
                                {{ Form::submit('Verwijder uit favorieten', ['class' => 'btn btn-red col-md-12']) }}
                                {{ Form::close() }}
                            @endif
                        @endif
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-12 col-md-9 profile-info">
                <div class="col-12 col-md-12">
                    <div style="width: 100%; height:500px;">
                        {!! Mapper::render() !!}
                    </div>
                </div>
                <div class="col-12 col-md-12 post-blck">
                    <h1>Info over {{$item->name}}</h1>
                </div>
                <div class="col-12 colmd-12">
                    @if($item->description)
                        <p>
                            {!! $item->description !!}
                        </p>
                    @else
                        <div class="col-12 col-md-12 text-center add-description">
                            <span class="fa fa-edit"></span>
                            <a href="">add description</a>
                        </div>
                    @endif
                </div>
                <div class="col-12 col-md-12 post-blck">
                    <h2>Rating</h2>
                </div>
                <div id="app" class="col-12 col-md-12">
                    <star-rating :rating="{{$avg}}" :read-only="true" :increment="0.01"></star-rating>
                    <p>{{count($item->ratings)}} reviews</p>
                </div>
                <div class="col-12 col-md-12 post-blck">
                    <h2>Recente projecten</h2>
                </div>
                <div class="col-12 col-md-12">
                    <div class="row">
                        @foreach($postings as $item)
                            <div class="col-12 col-md-6">
                                @include('partials.job',['title'=>$item->title,'name'=>$item->company->users[0]->name.' '.$item->company->users[0]->familyname,'company'=>$item->company->name,'adress'=>$item->company->adress,'city'=>$item->company->zip_code,'item'=>'jobs','id'=>$item->id])
                            </div>
                        @endforeach
                        <div class="col-12 col-md-12 col-sm-7">
                            @include('pagination.default', ['paginator' => $postings])
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection