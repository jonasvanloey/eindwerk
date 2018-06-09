<div class="row no-gutters">
    <div class="col-12 col-md-3">

    </div>
    <div class="col-12 col-md-9">
        <div class="row">
            <div class="col-12 col-md-4 col-sm-12 col-xs-12">
                @include('partials.text',['label'=>'Voornaam','name'=>'name'])
            </div>
            <div class="col-12 col-md-8">
                @include('partials.text',['label'=>'Familienaam','name'=>'familyname'])
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Email adres','name'=>'email'])
            </div>
            <div class="col-12 col-md-6 col-sm-12 col-xs-12">
                @include('partials.text',['label'=>'Wachtwoord','name'=>'password'])
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="password-confirm" class="col-form-label text-md-right">Bevestig wachtwoord</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <label for="date_of_birth">Geboortedatum</label>
                <input id="txtDate" name="date_of_birth" type="text" placeholder="DD/MM/YYYY" class="form-control">
            </div>
            <div class="col-12 col-md-6">
                @include('partials.text',['label'=>'Telefoonnummer','name'=>'phone_number'])
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Adres','name'=>'adress'])
            </div>
            <div class="col-12 col-md-8 col-sm-12 col-xs-12">
                @include('partials.text',['label'=>'Gemeente','name'=>'city'])
            </div>
            <div class="col-12 col-md-4">
                @include('partials.text',['label'=>'Postcode','name'=>'zip_code'])
            </div>
        </div>
    </div>
</div>
<div id="collapseBusiness" class="row no-gutters company collapse multi-collapse">
    <hr>
    @include('auth.partials.company')
</div>
<div class="row  ">
    <div class="col-12 col-md-4 offset-md-3">
        {!! Form::submit('Registreer', array('class' => 'btn big')) !!}
    </div>
    <div class="col-12 col-md-4 ">
        <a class="btn btn-grey big registerbusinessbtn" data-toggle="collapse" href="#collapseBusiness" role="button" aria-expanded="false" aria-controls="collapseBusiness">Ik ben een werkgever</a>
    </div>
</div>