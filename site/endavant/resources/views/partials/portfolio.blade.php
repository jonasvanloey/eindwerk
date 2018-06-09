<div class="job-box">
    <div class="row no-gutters">
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
                <a href="{{route('getportfolio',[$id,$port_id])}}" class="btn big" target="_blank">
                    Bekijk deze opdracht
                </a>
            </div>
        </div>
    </div>
</div>
