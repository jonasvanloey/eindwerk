@extends('main')
@section('content')

    <br>
    <div class="row">
        <div class="wrapper big">
            <div class="row nogutters">
                <div class="col-12 col-md-10 ">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-1 no-gutters">
                            <h1>jobs</h1>
                        </div>
                        <div class="col-12 col-md-1 no-gutters">
                            <a class="btn" data-toggle="collapse" href="#collapseFilter" role="button"
                               aria-expanded="false" aria-controls="collapseFilter">Filter</a>
                        </div>
                    </div>
                </div>
                @if(Auth::check()&& Auth::user()->hasRole('company'))
                    <div class="col-12 col-md-2 text-right">
                        <a href="{{url('jobs/create')}}" class="btn big">Plaats een job</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div id="collapseFilter" class="row collapse filter multi-collapse">
        <div class="wrapper big">
            <br>
            <div class="col-12 col-md-2">
                <label for="search">Zoek</label>
                <input type="text" name="search" class="form-control">
            </div>
            <br>
        </div>
    </div>
    <br>
    <div class="row no-gutters">
        <div class="wrapper big">
            <div class="col-12 col-md-12">
                <div class="row">
                    @foreach($items as $item)
                        <div class="col-12 col-md-3">
                            @include('partials.job',['title'=>$item->title,'name'=>$item->company->users[0]->name.' '.$item->company->users[0]->familyname,'company'=>$item->company->name,'adress'=>$item->company->adress,'city'=>$item->company->zip_code,'item'=>'jobs','id'=>$item->id,'favs'=>$favs])
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="col-12 col-md-12">
                    @include('pagination.default', ['paginator' => $items])
                </div>
                <br>
            </div>
        </div>
    </div>

@endsection
