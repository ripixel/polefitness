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

<div>
{!! Form::label('members_only','Members Only') !!}
{!! Form::checkbox('members_only') !!}
</div>

<div>
{!! Form::label('location_id','Location') !!}
{!! Form::select('location_id', $locations, null, ['id' => 'location_id', 'class' => 'select2 pure-input-1']) !!}
</div>

{!! Form::submit($submit_text, ['class' => 'button button-green']) !!}