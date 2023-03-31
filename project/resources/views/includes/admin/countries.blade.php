
	<option value="">{{ __('Select Country') }}</option>

	@foreach (DB::table('countries')->get() as $cdata)
		<option value="{{ $cdata->name }}" {{ $data->country == $cdata->name ? 'selected' : '' }}>{{ $cdata->name }}</option>
	@endforeach
