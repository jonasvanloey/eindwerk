@extends('main')
@section('content')
    <section class="landing d-flex justify-content-center ">
        <div class="d-flex flex-column align-self-center text-center">
            <h1 class="headline">Vindt een studentenjob die echt bij jouw studierichting past.</h1>
            <div class="d-flex flex-column flex-md-row justify-content-around">
                <a href="{{Auth::check()? url('/jobs') : route('register')}}" class="btn big "> Ik ben student</a>
                <a href="{{Auth::check()? url('/jobs') : route('register','werkgever')}}" class="btn big "> Ik ben werkgever</a>
            </div>
        </div>
    </section>
    <section class="overview">
        <div class="wrapper hw big">
            <div class="row ov-row">
                <div class="col-md-4 col-sm-12 overzicht-block mb">
                    <div class="">
                        <div class="content">
                            <div class="cont">
                                <span class="fa fa-user"></span>
                                <h2>Studenten</h2>
                                <p>Als student multimedia is het vaak moeilijk om een studentenjob te vinden in de
                                    sector
                                    waarin je studeert. Endavant is een laagdrempelig platform waar jij op zoek kan gaan
                                    naar projecten die een meerwaarde bieden voor jouw CV en je kunnen lanceren voor
                                    een
                                    prachtige carrière in de wereld van de multimedia.</p>
                            </div>
                            <div class="btnr ">
                                <a href="{{Auth::check()? url('/jobs') : route('register')}}" class="btn big "> Ik ben student</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 overzicht-block mb">
                    <div class="">
                        <div class="content">
                            <div class="cont">
                                <span class="fa fa-building"></span>
                                <h2>Werkgevers</h2>
                                <p>Als starter, KMO of kleinere onderneming is het vaak moeilijk om een website,
                                    animatiefilmpje,... te laten maken voor een degelijke prijs en ook nog eens te
                                    worden
                                    behandeld als volwaardige klant. Waarom uw project dan niet laten maken door een
                                    student
                                    die u wel zijn volle aandacht geeft en ook nog eens een waardevolle werkervaring opdoet
                                    door uw project uit te werken tot een kwaliteitsvol en vernieuwend eindproduct.</p>
                            </div>
                            <div class=" btnr">
                                <a href="{{Auth::check()? url('/jobs') : route('register','werkgever')}}" class="btn big "> Ik ben werkgever</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 overzicht-block mb">
                    <div class="">
                        <div class="content">
                            <div class=" cont">
                                <span class="fa fa-question"></span>
                                <h2>Nog vragen?</h2>
                                <p>Heb je nog vragen in verband met het Endavant platform neem dan gerust een kijkje bij
                                    onze FAQ, of stel zelf een vraag aan ons en onze community.</p>

                            </div>
                            <div class=" btnr">
                                <a href="" class="btn big "> FAQ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="how">
        <div class="wrapper hw small">
            <div class="row">
                <div class="col-md-12">
                    <h2>Hoe gaat Endavant in zijn werk?</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-5 how-box">
                    <div class="row">
                        <div class="col-md-10">
                            <p>Als onderneming kan je een zoekertje plaatsen op Endavant, hierbij is het belangrijk van
                                het
                                project zo duidelijk mogelijk te beschrijven zodat studenten weten waar ze aan toe
                                zijn. </p>
                        </div>
                        <div class="col-md-2">
                            <span class="fa fa-building"></span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-1 how-box">
                    <div class="row">
                        <div class="col-md-2">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="col-md-10">
                            <p>Als student kan je je aanmelden voor projecten die geplaatst zijn door ondernemingen. Je
                                kan
                                er zelf voor kiezen om enkel projecten voor ondernemingen in jouw buurt te doen of om
                                wat
                                verder te gaan zoeken.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 how-box">
                    <div class="row">
                        <div class="col-md-1">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="col-md-10 ">
                            <p>Als de student zich aangemeld heeft dan kunnen de student en onderneming beginnen met
                                aftasten of ze de beste combinatie zijn voor het project. Zo kan er gemaild worden of
                                gechat, er kan getelefoneerd worden en de onderneming kan het portfolio van de student
                                bekijkenen omgekeerd. Indien er beslist wordt van samen te werken dan kunnen ze aan het
                                project beginnen.</p>
                        </div>
                        <div class="col-md-1 ">
                            <span class="fa fa-building"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Na afronding van het project</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-1 how-box">
                    <div class="row">
                        <div class="col-md-2">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="col-md-10">
                            <ul>
                                <li>
                                    Heeft waardevolle ervaring opgedaan
                                </li>
                                <li>
                                    Heeft een project dat hij/zij kan
                                    toevoegen aan zijn portfolio en CV
                                </li>
                                <li>
                                    Heeft een mooi centje bij verdient
                                </li>
                                <li>
                                    Heeft dingen geleerd die hij/zij anders
                                    niet of pas later zou leren
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 offset-md-2 how-box">
                    <div class="row">
                        <div class="col-md-10">
                            <ul>
                                <li>
                                    Heeft het project waar hij/zij om vroeg
                                </li>
                                <li>
                                    Is behandeld zoals hij/zij moet
                                    behandeld worden ongeacht het budget
                                </li>
                                <li>
                                    Heeft zijn project gerealiseerd
                                    met een budget dat wel haalbaar is voor
                                    de onderneming
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <span class="fa fa-building"></span>
                        </div>
                    </div>
                </div>
            </div>
            @if(!Auth::check())
                <div class="row ">
                    <div class="col-md-12 text-center">
                        <a href="{{route('register')}}" class="btn big big-screen ">Schrijf je nu in en doe mee</a>
                        <a href="{{route('register')}}" class="btn small-screen ">Schrijf je nu in en doe mee</a>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

