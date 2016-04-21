@if($class->allow_guests)
	@php $guest_passes = $user->guest_passes_left()
	@if($guest_passes > 0)
		<p>If you wish to bring a guest, please enter their name below (you currently have <strong>{{ $guest_passes }}</strong> guest passes remaining):</p>
		<div>
		{!! Form::text('guest_name', null, ['class' => 'pure-input-1']) !!}
		</div>
	@else
		<p><em>You do not have any guest passes, so you can't bring a guest along, sorry!</em></p>
	@endif
@else
	<p><em>Guests are not allowed to attend this class, sorry!</em></p>
@endif