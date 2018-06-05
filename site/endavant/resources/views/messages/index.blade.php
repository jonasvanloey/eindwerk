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
                <div class="col-12 col-md-8 offset-md-2 offset-sm-0 card">
                    @foreach($groups as $group)

                        <div class="row no-gutters">

                            <div class="col-12 col-md-3">{{$group->posting->company->name}}</div>
                            <div class="col-12 col-md-7">
                                <a href="{{route('showmessage',$group->id)}}">{{$group->posting->title}}</a>
                            </div>
                            <div class="col-12 col-md-2"><span class="fa fa-trash"></span>delete</div>
                        </div>

                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection