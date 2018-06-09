@extends('main')
@section('content')
    <div class="wrapper big">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <h1>Overzicht van een jouw jobs</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <h2 class="accent">Nog niet afgewerkte jobs</h2>
            </div>
            <div class="col-12 col-md-8 offset-md-2">
                @if(!$not_finished->isEmpty())
                    @foreach($not_finished as $nf)
                        <div class="col-12 col-md-5">
                            @include('partials.job',['title'=>$nf->title,'name'=>$nf->company->users[0]->name.' '.$nf->company->users[0]->familyname,'company'=>$nf->company->name,'adress'=>$nf->company->adress,'city'=>$nf->company->zip_code,'item'=>'myjobs','id'=>$nf->id])
                        </div>
                    @endforeach
                @else
                    <p>Er zijn momenteel geen onafgewerkte jobs aan jou toegewezen</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <h2 class="accent">Afgewerkte jobs</h2>
            </div>
            <div class="col-12 col-md-8 offset-md-2">
                @if(!$finished->isEmpty())
                    <div class="row no-gutters">
                        @foreach($finished as $nf)
                            <div class="col-12 col-md-5">
                                @include('partials.job',['title'=>$nf->title,'name'=>$nf->company->users[0]->name.' '.$nf->company->users[0]->familyname,'company'=>$nf->company->name,'adress'=>$nf->company->adress,'city'=>$nf->company->zip_code,'item'=>'myjobs','id'=>$nf->id])
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>Je hebt op dit moment nog geen afgewerkte jobs</p>
                @endif
            </div>
        </div>
    </div>
@endsection
