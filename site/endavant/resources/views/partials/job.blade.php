<div class="job-box">
    <div class="row no-gutters ">
        <div class="col-12 col-md-10">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>{{$title}}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12">
                    <p class="job-txt">{{$name}},{{$company}}</p>
                </div>
                <div class="col-12 col-md-12">
                    <p class="job-txt">{{$adress}},{{$city}}</p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12 col-md-12">
                    <a href="{{route($item.'.show',$id)}}" class="btn big" target="_blank">
                        Bekijk deze job
                    </a>
                </div>
            </div>

        </div>

        <div class="col-12 col-md-1">
            @if(isset($favs))
            <a class="accent {{isset($favs) && $favs->contains($id) ? '' : 'unclicked'  }} addToFav" id="{{$id}}"><span class="fa fa-star"></span></a>
            @else
                @if(isset($favitem))
                    {{ Form::open(['method' => 'DELETE', 'route' => ['favorite.destroy',$favitem->id]]) }}
                    {{ Form::submit('X', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                @endif
            @endif
        </div>

    </div>
</div>
