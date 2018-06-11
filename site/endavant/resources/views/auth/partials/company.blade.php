<div class="col-12 col-md-12">
    <h2 class="accent">Bedrijfsgegevens</h2>
</div>
<div class="row no-gutters">
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Naam onderneming','name'=>'company[name]'])
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Ondernemingsnummer','name'=>'company[vat_number]'])
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Telefoonnummer','name'=>'company[phone_number]'])
            </div>
            <div class="col-12 col-md-12">
                @include('partials.text',['label'=>'Adres','name'=>'company[adress]'])
            </div>
            <div class="col-12 col-md-8">
                @include('partials.text',['label'=>'Gemeente','name'=>'company[city]'])
            </div>
            <div class="col-12 col-md-4">
                @include('partials.text',['label'=>'Postcode','name'=>'company[zip_code]'])
            </div>
            <div class="col-12 col-md-12">
                <label for="description">beschrijving</label>
                <div id="description"></div>
            </div>
        </div>
    </div>
</div>
