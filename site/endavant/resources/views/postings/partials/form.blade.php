<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        @include('partials.text',['name'=>'title','label'=>'Titel'])
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <h2 class="accent">Geef een rede voor dit project</h2>
    </div>
    <div class="col-12 col-md-8 offset-md-2">
        <div id="reason"></div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <h2 class="accent">Geef een zo gedetailleerd mogelijke beschrijving van het project</h2>
    </div>
    <div class="col-12 col-md-8 offset-md-2">
        <div id="description"></div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        {!! Form::submit('Save', array('class' => 'btn big')) !!}
    </div>
</div>
