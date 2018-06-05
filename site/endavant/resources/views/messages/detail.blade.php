@extends('main')

@section('content')

    <div class="container">
        <div class="row"><h1>{{$item->posting->title}}</h1></div>
        <div class="row">
            <div class="col-md-3 overzicht-block text-center">
                @if(Auth::user()->hasRole('student'))
                    <div class="col-md-12">
                        <img src="{{asset('img/imgplaceholder.jpg')}}" alt="" class="rounded-circle profile-pic">
                    </div>
                    <div class="col-md-12">
                        <h2 class="name-title"><a href="#"><b> {{$item->posting->company->name}}</b></a></h2>
                    </div>
                    <div class="col-md-12">
                        <p>{{$item->posting->company->phone_number}}</p>
                    </div>
                    <div class="col-md-12">
                        <p>{{$item->posting->company->adress}}</p>
                    </div>
                    <div class="col-md-12">
                        <p>{{$item->posting->company->zip_code}} {{$item->posting->company->city}}</p>
                    </div>
                @elseif(Auth::user()->hasRole('company'))
                    <div class="col-md-12">
                        <img src="{{asset('img/imgplaceholder.jpg')}}" alt="" class="rounded-circle profile-pic">
                    </div>
                    <div class="col-md-12">
                        <h2 class="name-title"><a href="#"><b> {{$student->name}} {{$student->familyname}}</b></a></h2>
                    </div>
                    <div class="col-md-12">
                        <p>{{$student->phone_number}}</p>
                    </div>
                    <div class="col-md-12">
                        <p>{{$student->adress}}</p>
                    </div>
                    <div class="col-md-12">
                        <p>{{$student->zip_code}} {{$student->city}}</p>
                    </div>
                @if($item->posting->student_id === null)
                    <div class="col-md-12">
                            <a href="{{route('givetouser',[$item->id,$student->id])}}" class="btn col-md-12">Project toewijzen</a>
                        </div>
                    @else
                        <div class="col-md-12">
                            <a href="{{route('roundup',[$item->id,$item->posting->id,])}}" class="btn col-md-12">Project afronden</a>
                        </div>
                    @endif
                @endif
            </div>

            <div class="col-12 col-md-8 offset-md-1">
                <div class="row">
                    <div class="explain-message">
                        @if(Auth::user()->hasRole('student'))
                            <p>Hier kan je chatten met de opdrachtgever van het project. Dit is jouw kans om al je
                                vragen
                                die je hebt over het project te stellen. Dit is ook de plek waar je de opdrachtgever kan
                                overtuigen om voor jou te kiezen om het project uit te voeren.<br> <br> Uit ervaring
                                weten we dat
                                enkel chatten vaak niet voldoende is om een project tot een goed einde te brengen daarom
                                is
                                het ook aangeraden dat jullie eens <b>bellen</b> of nog beter eens <b>persoonlijk
                                    meeten</b>
                                om alle details te bespreken.</p>
                        @elseif(Auth::user()->hasRole('company'))
                            <p>Dit is de plek waar jij {{$student->name}} kan leren kennen en kan besluiten of hij een
                                geschikte kandidaat is voor het tot een goed einde brengen van jouw project. <br> <br>
                                Uit ervaring hebben we gemerkt dat chatten niet voldoende is om een project tot een goed
                                einde te brengen daarom
                                is
                                het ook aangeraden dat jullie eens <b>bellen</b> of nog beter eens <b>persoonlijk
                                    meeten</b>
                                om alle details te bespreken. </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div id="app" class="panel panel-default col-12 col-md-12">
                        <div class="panel-body">
                            <chat-messages :messages="messages"></chat-messages>
                        </div>
                        <div class="panel-footer">
                            <chat-form
                                    v-on:messagesent="addMessage"
                                    :user="{{ Auth::user() }}"
                                    :active={{$active}}
                            ></chat-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="{{$destination_id}}" class="hid" style="visibility:hidden;"></div>
@endsection