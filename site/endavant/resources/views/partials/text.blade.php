<div class="form-group">
    @if($label !== null)
        {!! Form::label($name,$label) !!}
    @endif
    {!! Form::text($name,$value ?? null,['class'=>isset($class) ? 'form-control'.$class : 'form-control']) !!}
</div>
