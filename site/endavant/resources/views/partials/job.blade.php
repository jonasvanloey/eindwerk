<div class="job-box">
    <div class="row no-gutters ">
        @if(Auth::check() && Auth::user()->hasRole('student'))
        <div class="col-12 col-md-2">
            @if(isset($favs))

                    <a class="accent {{isset($favs) && $favs->contains($id) ? '' : 'unclicked'  }} addToFav"
                       id="{{$id}}"><span class="fa fa-star" style="font-size:2em;"></span></a>

            @else
                @if(isset($favitem))
                    {{ Form::open(['method' => 'DELETE', 'route' => ['favorite.destroy',$favitem->id]]) }}
                    {{ Form::submit('X', ['class' => 'btn btn-red']) }}
                    {{ Form::close() }}
                @endif
            @endif
        </div>
        @endif
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
                    <a href="{{route($item.'.show',$id)}}" class="btn col-md-12" target="_blank">
                        Bekijk deze job
                    </a>
                </div>
            </div>

        </div>


    </div>
</div>
