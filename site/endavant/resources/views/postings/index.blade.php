@extends('main')
@section('content')
    <div class="wrapper big">
        <div class="row">
            <div class="col-12 col-md-10 ">
                <h1>jobs</h1> <a href="" class="btn big">Filter</a>
            </div>
            <div class="col-12 col-md-2 text-right">
                <a href="{{route('jobs.create')}}" class="btn big">Plaats een job</a>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-12 col-md-7">
                <div class="row">
                    @foreach($items as $item)
                        <div class="col-12 col-md-5">
                            @include('partials.job',['title'=>$item->title,'name'=>$item->company->users[0]->name.' '.$item->company->users[0]->familyname,'company'=>$item->company->name,'adress'=>$item->company->adress,'city'=>$item->company->zip_code,'item'=>'jobs','id'=>$item->id,'favs'=>$favs])
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="col-12 col-md-5">
                kaart hier
            </div>
        </div>


    </div>
@endsection
