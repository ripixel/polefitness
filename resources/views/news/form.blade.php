<div>
{!! Form::label('title','Title') !!}
{!! Form::text('title', null, ['class' => 'pure-input-1']) !!}
</div>

<div>
{!! Form::label('body','Body') !!}
{!! Form::textarea('body', null, ['class' => 'tinymce']) !!}
</div>

<div>
{!! Form::label('picture_link','Picture URL') !!}
{!! Form::text('picture_link', null, ['class' => 'pure-input-1']) !!}
</div>

{!! Form::submit($submit_text, ['class' => 'button']) !!}