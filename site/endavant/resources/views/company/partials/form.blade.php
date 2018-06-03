<div class="row no-gutters">
    <div class="col-12 col-md-3">

    </div>
    <div class="col-12 col-md-9">
        <div class="row">
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Naam onderneming','name'=>'company[name]','value'=>$item->name])
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Ondernemingsnummer','name'=>'company[vat_number]','value'=>$item->vat_number])
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Telefoonnummer','name'=>'company[phone_number]','value'=>$item->phone_number])
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Adres','name'=>'company[adress]','value'=>$item->adress])
            </div>
            <div class="col-12 col-md-8">
                @include('partials.text',['label'=>'Gemeente','name'=>'company[city]','value'=>$item->city])
            </div>
            <div class="col-12 col-md-4">
                @include('partials.text',['label'=>'Postcode','name'=>'company[zip_code]','value'=>$item->zip_code])
            </div>
            <div class="col-12 col-md-12">
                <label for="description"> beschrijving</label>
                <div id="description">{!! $item->description !!}</div>
            </div>

            <div class="col-12 col-md-12 mb-5 mt-2">
                {!! Form::submit('Save',['class'=>'btn big']) !!}
            </div>
        </div>

    </div>
</div>