<div class="row no-gutters">
    <div id="app" class="col-12 col-md-3">
        <image-cropper
                :path="'{{$item->image}}'"
                :resource="'company-pic'"
                :key-name="'image'"
                :aspect-ratio="1"
        >
        </image-cropper>
    </div>
    <div class="col-12 col-md-9">
        <div class="row">
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Naam onderneming','name'=>'company[name]','value'=>$item->name])
                @if ($errors->has('company.name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company.name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Ondernemingsnummer','name'=>'company[vat_number]','value'=>$item->vat_number])
                @if ($errors->has('company.vat_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company.vat_number') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Telefoonnummer','name'=>'company[phone_number]','value'=>$item->phone_number])
                @if ($errors->has('company.phone_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company.phone_number') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Adres','name'=>'company[adress]','value'=>$item->adress])
                @if ($errors->has('company.adress'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company.adress') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-8">
                @include('partials.text',['label'=>'Gemeente','name'=>'company[city]','value'=>$item->city])
                @if ($errors->has('company.city'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company.city') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-4">
                @include('partials.text',['label'=>'Postcode','name'=>'company[zip_code]','value'=>$item->zip_code])
                @if ($errors->has('company.zip_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company.zip_code') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-12">
                <label for="description"> beschrijving</label>
                <div id="description">{!! $item->description !!}</div>
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-12 col-md-12 mb-5 mt-2">
                {!! Form::submit('Save',['class'=>'btn big']) !!}
            </div>
        </div>

    </div>
</div>