<div class="job-box">
    <div class="row no-gutters ">
        <div class="col-12 col-md-10">
            <div class="row">
                <div class="col-12 col-md-12 text-center">
                    @if($image === null)
                        <img src="{{asset('img/imgplaceholder.jpg')}}" alt=""
                             class="rounded-circle profile-pic">
                    @else
                        <img src="{{$image}}"
                             alt="{{$name}}"
                             class="rounded-circle profile-pic">
                    @endif
                </div>
                <div class="col-12 col-md-12 text-center">
                    <h3>{{$name}} {{isset($familyname)? $familyname:''}}</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12 col-md-12 text-center">
                    <a href="{{route($item.'.show',$id)}}" class="btn big" target="_blank">
                        Bekijk dit profiel
                    </a>
                </div>
            </div>

        </div>

        <div class="col-12 col-md-1">
                @if(isset($favitem))
                    {{ Form::open(['method' => 'DELETE', 'route' => ['favorite.destroy',$favitem->id]]) }}
                    {{ Form::submit('X', ['class' => 'btn btn-red']) }}
                    {{ Form::close() }}
                @endif
        </div>

    </div>
</div>
