<div>
{!! Form::label('name','Name') !!}
{!! Form::text('name', null, ['class' => 'pure-input-1']) !!}
</div>

<div>
{!! Form::label('cost','Cost') !!}
{!! Form::text('cost', null, ['class' => 'pure-input-1 spinner-decimal']) !!}
</div>

<div>
{!! Form::label('free_classes','Free Classes') !!}
{!! Form::text('free_classes', null, ['class' => 'pure-input-1 spinner']) !!}
</div>

<div>
	{!! Form::label('includes_membership','Includes Society Membership') !!}
	{!! Form::checkbox('includes_membership') !!}
</div>

{!! Form::submit($submit_text, ['class' => 'button button-green']) !!}