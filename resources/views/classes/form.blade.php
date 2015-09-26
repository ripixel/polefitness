<div>
{!! Form::label('title','Title') !!}
{!! Form::text('title', null, ['class' => 'pure-input-1']) !!}
</div>

<div>
{!! Form::label('description','Description') !!}
{!! Form::textarea('description', null, ['class' => 'tinymce']) !!}
</div>

<div>
{!! Form::label('supervisor_id','Supervisor') !!}
{!! Form::select('supervisor_id', $supervisors, null, ['id' => 'supervisor_id', 'class' => 'select2 pure-input-1']) !!}
</div>

<div>
{!! Form::label('picture_link','Picture URL') !!}
{!! Form::text('picture_link', null, ['class' => 'pure-input-1']) !!}
</div>

<div class="pure-u-1">
	<div class="pure-g">
		<div class="pure-u-1-2" style="box-sizing: border-box; padding-right: 10px;">
			{!! Form::label('date','Start Date/Time') !!}
			{!! Form::text('date', null, ['class' => 'pure-input-1 datepicker']) !!}
		</div>
		
		<div class="pure-u-1-2">
			{!! Form::label('end_date','End Date/Time') !!}
			{!! Form::text('end_date', null, ['class' => 'pure-input-1 datepicker']) !!}
		</div>
	</div>
</div>

<div>
{!! Form::label('places_available','Places Available') !!}
{!! Form::text('places_available', null, ['class' => 'pure-input-1 spinner']) !!}
</div>

<div class="form-group">
    {!! Form::label('payment_methods_allowed', 'Payment Methods Allowed') !!}
    {!! Form::select('payment_methods_allowed[]', $payment_methods, $class->payment_methods_allowed->lists('id')->toArray(), ['id' => 'payment_methods_allowed', 'class' => 'select2 pure-input-1', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::label('memberships_allowed', 'Memberships Allowed') !!}
    {!! Form::select('memberships_allowed[]', $memberships, $class->memberships_allowed->lists('id')->toArray(), ['id' => 'memberships_allowed', 'class' => 'select2 pure-input-1', 'multiple']) !!}
</div>


<div class="pure-u-1">
	<div class="pure-g">
		<div class="pure-u-1-2" style="box-sizing: border-box; padding-right: 10px;">
			{!! Form::label('cost','Cost for Non-Members') !!}
			{!! Form::text('cost', null, ['class' => 'pure-input-1 spinner-decimal']) !!}
		</div>
		<div class="pure-u-1-2">
			{!! Form::label('cost_member','Cost for Members') !!}
			{!! Form::text('cost_member', null, ['class' => 'pure-input-1 spinner-decimal']) !!}
		</div>
	</div>
</div>

<div>
{!! Form::label('location_id','Location') !!}
{!! Form::select('location_id', $locations, null, ['id' => 'location_id', 'class' => 'select2 pure-input-1']) !!}
</div>

{!! Form::submit($submit_text, ['class' => 'button button-green']) !!}