<div class="row no-gutters">
    <div id="app" class="col-12 col-md-3">
        <image-cropper
                :path="'{{$item->image}}'"
                :resource="'profile-pic'"
                :key-name="'image'"
                :aspect-ratio="1"
        >
        </image-cropper>
    </div>
    <div class="col-12 col-md-9">
        <div class="row">
            <div class="col-12 col-md-4 col-sm-12 col-xs-12">
                @include('partials.text',['label'=>'Voornaam','name'=>'name','value'=>$item->name])
            </div>
            <div class="col-12 col-md-8">
                @include('partials.text',['label'=>'Familienaam','name'=>'familyname','value'=>$item->familyname])
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Email adres','name'=>'email','value'=>$item->email])
            </div>
            <div class="col-12 col-md-6">
                <label for="date_of_birth">Geboortedatum</label>
                <input id="txtDate" name="date_of_birth" type="text" placeholder="DD/MM/YYYY" class="form-control" value="{{$item->date_of_birth}}">
            </div>
            <div class="col-12 col-md-6">
                @include('partials.text',['label'=>'Telefoonnummer','name'=>'phone_number','value'=>$item->phone_number])
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Adres','name'=>'adress','value'=>$item->adress])
            </div>
            <div class="col-12 col-md-8 col-sm-12 col-xs-12">
                @include('partials.text',['label'=>'Gemeente','name'=>'city','value'=>$item->city])
            </div>
            <div class="col-12 col-md-4">
                @include('partials.text',['label'=>'Postcode','name'=>'zip_code','value'=>$item->zip_code])
            </div>


            <div class="col-12 col-md-12 mb-5 mt-2">
                {!! Form::submit('Save',['class'=>'btn big']) !!}
            </div>
        </div>

    </div>
</div>