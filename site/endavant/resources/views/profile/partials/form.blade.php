<div class="row no-gutters">
    <div class="col-12 col-md-3">

    </div>
    <div class="col-12 col-md-9">
        <div class="row">
            <div class="col-12 col-md-4 col-sm-12 col-xs-12">
                @include('partials.text',['label'=>'Voornaam','name'=>'data[user][name]','value'=>$item->user->name])
            </div>
            <div class="col-12 col-md-8">
                @include('partials.text',['label'=>'Familienaam','name'=>'data[user][familyname]','value'=>$item->user->familyname])
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Email adres','name'=>'data[user][email]','value'=>$item->user->email])
            </div>
            <div class="col-12 col-md-6">
                <label for="date_of_birth">Geboortedatum</label>
                <input id="txtDate" name="data[user][date_of_birth]" type="text" placeholder="DD/MM/YYYY" class="form-control" value="{{$item->user->date_of_birth}}">
            </div>
            <div class="col-12 col-md-6">
                @include('partials.text',['label'=>'Telefoonnummer','name'=>'data[user][phone_number]','value'=>$item->user->phone_number])
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Adres','name'=>'data[user][adress]','value'=>$item->user->adress])
            </div>
            <div class="col-12 col-md-8 col-sm-12 col-xs-12">
                @include('partials.text',['label'=>'Gemeente','name'=>'data[user][city]','value'=>$item->user->city])
            </div>
            <div class="col-12 col-md-4">
                @include('partials.text',['label'=>'Postcode','name'=>'data[user][zip_code]','value'=>$item->user->zip_code])
            </div>
            <div class="col-12 col-md-12">
                <label for="decsription"> beschrijving</label>
                <div id="description">{!! $item->description !!}</div>
            </div>

            <div class="col-12 col-md-12 mb-5 mt-2">
                {!! Form::submit('Save',['class'=>'btn big']) !!}
            </div>
        </div>

    </div>
</div>