@extends('main')
@section('content')
    <div class="wrapper big">
        <div class="row">
            <div class="col-12 col-md-12">
                <h1>Favorieten</h1>
            </div>
            <div class="col-12 col-md-12">
                <p>Sorteer op: <a href="?date">Datum toegevoegd</a> | <a href="?newwest">Nieuwste</a> | <a
                            href="?oldest">Oudste</a></p>
            </div>
        </div>
        @if(isset($jobs))
            <div class="row">
                <div class="col-12 col-md-12">
                    <h2 class="accent">Jobs</h2>
                </div>
            </div>
            <div class="row">
                @if(!$jobs->isEmpty())
                    @foreach($jobs as $job)
                        <div class="col-12 col-md-3">
                            @include('partials.job',['title'=>$job->posting->title,'name'=>$job->posting->company->users[0]->name.' '.$job->posting->company->users[0]->familyname,'company'=>$job->posting->company->name,'adress'=>$job->posting->company->adress,'city'=>$job->posting->company->zip_code,'item'=>'jobs','id'=>$job->posting->id,'favitem'=>$job])
                        </div>
                    @endforeach
                @else
                    <div class="col-12 col-md-3">
                        <p>Er zijn nog geen jobs toegevoegd aan favorieten</p>
                    </div>
                @endif
            </div>
        @endif
        @if(isset($companies))
            <div class="row">
                <div class="col-12 col-md-12">
                    <h2 class="accent">Bedrijven</h2>
                </div>
            </div>
            <div class="row">
                @if(!$companies->isEmpty())
                    @foreach($companies as $company)
                        <div class="col-12 col-md-3">
                            @include('partials.user',['image'=>$company->company->image,'name'=>$company->company->name,'item'=>'company','id'=>$company->company->id,'favitem'=>$company])
                        </div>
                    @endforeach
                @else
                    <div class="col-12 col-md-3">
                        <p>Er zijn nog geen bedrijven toegevoegd aan favorieten</p>
                    </div>
                @endif
            </div>
        @endif
        @if(isset($students))
            <div class="row">
                <div class="col-12 col-md-12">
                    <h2 class="accent">Studenten</h2>
                </div>
            </div>
            <div class="row">
                @if(!$students->isEmpty())
                    @foreach($students as $student)
                        <div class="col-12 col-md-3">
                            @include('partials.user',['image'=>$student->student->user->image,'name'=>$student->student->user->name,'familyname'=>$student->student->user->familyname,'item'=>'profile','id'=>$student->student->id,'favitem'=>$student])
                        </div>
                    @endforeach
                @else
                    <div class="col-12 col-md-3">
                        <p>Er zijn nog geen studenten toegevoegd aan favorieten</p>
                    </div>
                @endif
            </div>
        @endif
    </div>
@endsection
