<div>
{!! Form::label('name','Name') !!}
{!! Form::text('name', null, ['class' => 'pure-input-1']) !!}
</div>

<div>
{!! Form::label('address','Address') !!}
{!! Form::text('address', null, ['class' => 'pure-input-1']) !!}
</div>

<div>
{!! Form::label('picture_link','Picture URL') !!}
{!! Form::text('picture_link', null, ['class' => 'pure-input-1']) !!}
</div>

{!! Form::submit($submit_text, ['class' => 'button button-green']) !!}