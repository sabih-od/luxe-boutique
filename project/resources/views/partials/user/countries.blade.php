<option value="" disabled selected >{{ __('Select Country') }}</option>
	@foreach (App\Models\Country::where('flag',1)->get() as $data)
	<option value="{{ $data->name }}" data="{{$data->id}}" rel5="{{ Auth::check() && Auth::user()->country == $data->name ? 1 : 0 }}" rel="{{$data->states->count() > 0 ? 1 : 0}}" rel1="{{Auth::check() ? 1 : 0}}" rel2="{{Auth::check() && Auth::user()->state ?  Auth::user()->state : 0}}" {{ Auth::check() && Auth::user()->country == $data->name ? 'selected' : '' }} data-href="{{route('country.wise.state',$data->id)}}">{{ $data->name }}</option>
@endforeach
