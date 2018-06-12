<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        @include('partials.text',['name'=>'title','label'=>'Titel','value'=> isset($item->title)? $item->title : ''])
        @if ($errors->has('title'))
            <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <h2 class="accent">Geef een rede voor dit project</h2>
    </div>
    <div class="col-12 col-md-8 offset-md-2">
        <div id="reason">
            @if(isset($item->reason))
                {!!$item->reason!!}
            @endif
        </div>
        @if ($errors->has('reason'))
            <span class="help-block">
                        <strong>{{ $errors->first('reason') }}</strong>
                    </span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <h2 class="accent">Geef een zo gedetailleerd mogelijke beschrijving van het project</h2>
    </div>
    <div class="col-12 col-md-8 offset-md-2">
        <div id="description">
            @if(isset($item->description))
                {!!  $item->description !!}
            @endif
        </div>
        @if ($errors->has('description'))
            <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
        @endif
    </div>
</div>
<br>
<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <h2 class="accent">Duid de categorieën aan waartoe jouw project hoort</h2>
    </div>
    @foreach($tags as $tag)
        <div class="col-12 col-md-2 offset-md-2">
            {{ Form::checkbox('tags[]',$tag->id,isset($item->tags) && $item->tags()->pluck('tag_id')->contains($tag->id)? true: false)}} {{$tag->tag}}
        </div>
    @endforeach
</div>
<br>
<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        {!! Form::submit('Save', array('class' => 'btn big')) !!}
    </div>
</div>
