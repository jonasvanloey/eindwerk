@extends('main')
@section('content')

    <br>
    <div class="row">
        <div class="wrapper hw  big">
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
        <div class="wrapper hw big">
            <br>
            <div class="row no-gutters">
                <div class="col-12 col-md-8 no-gutters">
                    {!!  Form::open(['url' => '/jobs','method' => 'GET']) !!}
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <label for="title">Zoek op titel</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="zip-code">Adres</label>
                            <input type="text" name="zip-code" class="form-control">
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="afstand">Max afstand</label>
                            <select name="afstand" class="form-control">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="50+">50+</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        @foreach($tags as $tag)
                            <div class="col-12 col-md-2">
                                {{ Form::checkbox('tags[]',$tag->id,isset($item->tags) && $item->tags()->pluck('tag_id')->contains($tag->id)? true: false)}} {{$tag->tag}}
                            </div>
                        @endforeach
                    </div>
                    {!! Form::submit('Zoek',array('class' => 'btn btn-grey')) !!}
                    <a href="/jobs" class="btn btn-grey">Filter resetten</a>
                    {!! Form::close() !!}
                </div>
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
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            @include('partials.job',['title'=>$item->title,'name'=>$item->company->users[0]->name.' '.$item->company->users[0]->familyname,'company'=>$item->company->name,'adress'=>$item->company->adress,'city'=>$item->company->zip_code,'item'=>'jobs','id'=>$item->id,'favs'=>$favs])
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="col-12 col-md-12 align-content-center">
                    @include('pagination.default', ['paginator' => $items])
                </div>
                <br>
            </div>
        </div>
    </div>

@endsection
