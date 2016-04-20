<div>
<h3>{{ $email->name}} Template</h3>
</div>

<div>
{!! Form::label('subject','Subject') !!}
{!! Form::text('subject', null, ['class' => 'pure-input-1']) !!}
</div>

<div>
{!! Form::label('content','Content') !!}
<p><strong>Tags Available:</strong> {{ $email->tags_available }}</p>
{!! Form::textarea('content', null, ['class' => 'tinymce']) !!}
</div>

{!! Form::submit($submit_text, ['class' => 'button button-green']) !!}