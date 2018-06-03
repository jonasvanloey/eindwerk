@extends('main')
@section('content')
    <div class="wrapper small">
        <div class="row">
            <div class="col-12 col-md-3 overzicht-block text-center">
                <div class="col-md-12">
                    <img src="{{asset('img/imgplaceholder.jpg')}}" alt="" class="rounded-circle profile-pic">
                </div>
                <div class="col-md-12">
                    <h2 class="name-title"><a href="#"><b>{{$item->user->name}} {{$item->user->familyname}}</b></a></h2>
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
                    <p>mapje hier</p>
                </div>
            </div>
            <div class="col-12 col-md-9 profile-info">
                <div class="row ">
                    <div class="col-12 col-md-4">
                        <h2>Info over {{$item->user->name}}</h2>
                    </div>
                    <div class="col-12 col-md-8 text-right">
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
                    <div class="col-12 col-md-6">
                        @include('partials.job',['title'=>'Dit is de titel van de job.','name'=>'de naam','company'=>'bedrijf x','adress'=>'bist 9','city'=>'Wilrijk','item'=>'profile','id'=>1])
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <h2>Rating</h2>
                </div>
                <div class="col-12 col-md-12">
                    <p>{{count($item->ratings)}} reviews</p>
                </div>
            </div>
        </div>
    </div>
@endsection