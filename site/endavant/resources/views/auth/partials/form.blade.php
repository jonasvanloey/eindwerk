<div class="row no-gutters">
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12 col-md-4 col-sm-12 col-xs-12">
                @include('partials.text',['label'=>'Voornaam','name'=>'name'])
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-8">
                @include('partials.text',['label'=>'Familienaam','name'=>'familyname'])
                 @if ($errors->has('familyname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('familyname') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Email adres','name'=>'email'])
                 @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-6 col-sm-12 col-xs-12">
                @include('partials.text',['label'=>'Wachtwoord','name'=>'password'])
                 @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('passsword') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="password-confirm" class="col-form-label text-md-right">Bevestig wachtwoord</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <label for="date_of_birth">Geboortedatum</label>
                <input id="txtDate" name="date_of_birth" type="text" placeholder="DD/MM/YYYY" class="form-control">
                 @if ($errors->has('date_of_birth'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-6">
                @include('partials.text',['label'=>'Telefoonnummer','name'=>'phone_number'])
                 @if ($errors->has('phone_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone_number') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Adres','name'=>'adress'])
                 @if ($errors->has('adress'))
                    <span class="help-block">
                        <strong>{{ $errors->first('adress') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-8 col-sm-12 col-xs-12">
                @include('partials.text',['label'=>'Gemeente','name'=>'city'])
                 @if ($errors->has('city'))
                    <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-4">
                @include('partials.text',['label'=>'Postcode','name'=>'zip_code'])
                 @if ($errors->has('zip_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('zip_code') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div id="collapseBusiness" class="row no-gutters company collapse multi-collapse">
    <hr>
    @include('auth.partials.company')
</div>
<div class="row  ">
    <div class="col-12 col-md-4">
        {!! Form::submit('Registreer', array('class' => 'btn big')) !!}
    </div>
    <div class="col-12 col-md-4 ">
        <a class="btn btn-grey big registerbusinessbtn" data-toggle="collapse" href="#collapseBusiness" role="button"
           aria-expanded="false" aria-controls="collapseBusiness">Ik ben een werkgever</a>
    </div>
</div>