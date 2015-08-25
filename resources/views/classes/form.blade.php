<div>
{!! Form::label('title','Title') !!}
{!! Form::text('title', null, ['class' => 'pure-input-1']) !!}
</div>

<div>
{!! Form::label('description','Description') !!}
{!! Form::textarea('description', null, ['class' => 'tinymce']) !!}
</div>

<div>
{!! Form::label('picture_link','Picture URL') !!}
{!! Form::text('picture_link', null, ['class' => 'pure-input-1']) !!}
</div>

<div>
{!! Form::label('date','Date') !!}
{!! Form::text('date', null, ['class' => 'pure-input-1 datepicker']) !!}
</div>

<div>
{!! Form::label('places_available','Places Available') !!}
{!! Form::text('places_available', null, ['class' => 'pure-input-1 spinner']) !!}
</div>

<div class="form-group">
    {!! Form::label('payment_methods_allowed', 'Payment Methods Allowed') !!}
    {!! Form::select('payment_methods_allowed[]', $payment_methods, $class->payment_methods_allowed->lists('id')->toArray(), ['id' => 'payment_methods_allowed', 'class' => 'select2 pure-input-1', 'multiple']) !!}
</div>

<div>
{!! Form::label('cost','Cost') !!}
{!! Form::text('cost', null, ['class' => 'pure-input-1 spinner-decimal']) !!}
</div>

<div>
{!! Form::label('location_id','Location') !!}
{!! Form::select('location_id', $locations, null, ['id' => 'location_id', 'class' => 'select2 pure-input-1']) !!}
</div>

{!! Form::submit($submit_text, ['class' => 'button button-green']) !!}