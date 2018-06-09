<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <h2 class="accent">Voeg de link naar het project toe (als deze bestaat)</h2>
    </div>
    <div class="col-12 col-md-8 offset-md-2">
        @include('partials.text',['name'=>'link','label'=>null,'value'=>$item->link])
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <h2 class="accent">Geef een  beschrijving van het verloop project</h2>
    </div>
    <div class="col-12 col-md-8 offset-md-2">
        <div id="description">{!! $item->description !!}</div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        {!! Form::submit('Save', array('class' => 'btn big')) !!}
    </div>
</div>
