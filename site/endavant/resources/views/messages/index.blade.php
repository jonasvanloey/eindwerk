@extends('main')

@section('content')

    <div class="wrapper big">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 offset-sm-0">
                <h1>Berichten</h1>
            </div>
        </div>
        <div class="row">
            @if($groups->isEmpty())
                <div class="col-12 col-md-8 offset-md-2 offset-sm-0 ">
                    <p>je hebt nog geen berichten gestuurd.</p>
                </div>
            @else
                @if(Auth::user()->hasRole('student'))
                    <div class="col-12 col-md-8 offset-md-2 offset-sm-0 card">
                        @foreach($groups as $group)

                            <div class="row message-row no-gutters">

                                <div class="col-12 col-md-2 text-center d-flex align-items-center justify-content-center">
                                    <div class=".row">
                                        <div class="col-12 col-md-12 ">
                                            @if($group->posting->company->image === null)
                                                <img src="{{asset('img/imgplaceholder.jpg')}}" alt=""
                                                     class="rounded-circle profile-nav">
                                            @else
                                                <img src="{{$group->posting->company->image}}"
                                                     alt="{{$group->posting->company->name}}"
                                                     class="rounded-circle profile-pic">
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-12">
                                            {{$group->posting->company->name}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <h3><a href="{{route('showmessage',$group->id)}}">{{$group->posting->title}}</a>
                                    </h3>
                                    <p>{{$group->messages->last()->message}}</p>
                                </div>
                                <div class="col-12 col-md-2 text-center d-flex align-items-center justify-content-center ">
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['deletemessage', $group->id]]) }}
                                    {{ Form::submit('delete', ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}</div>
                            </div>

                        @endforeach
                    </div>
                @elseif(Auth::user()->hasRole('company'))
                    <div class="col-12 col-md-8 offset-md-2 offset-sm-0 card">
                        @foreach($groups as $group)
                            <div class="row message-row no-gutters">

                                <div class="col-12 col-md-2 text-center d-flex align-items-center justify-content-center">
                                    <div class=".row">
                                        <div class="col-12 col-md-12 ">
                                            @if($group->users->where('id','!=',Auth::user()->id)->first()->image === null)
                                                <img src="{{asset('img/imgplaceholder.jpg')}}" alt=""
                                                     class="rounded-circle profile-nav">
                                            @else
                                                <img src=" {{$group->users->where('id','!=',Auth::user()->id)->first()->image}}"
                                                     alt=" {{$group->users->where('id','!=',Auth::user()->id)->first()->name}}"
                                                     class="rounded-circle profile-pic">
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-12">
                                            {{$group->users->where('id','!=',Auth::user()->id)->first()->name}} {{$group->users->where('id','!=',Auth::user()->id)->first()->familyname}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <h3><a href="{{route('showmessage',$group->id)}}">{{$group->posting->title}}</a>
                                    </h3>
                                    <p>{{$group->messages->last()->message}}</p>
                                </div>
                                <div class="col-12 col-md-2 text-center d-flex align-items-center justify-content-center ">
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['deletemessage', $group->id]]) }}
                                    {{ Form::submit('delete', ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}</div>
                            </div>

                        @endforeach
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection