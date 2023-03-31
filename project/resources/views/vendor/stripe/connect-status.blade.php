@extends('layouts.vendor')
@section('content')
    <div class="row w-100 text-center justify-content-center align-items-center">
        <div class="col-md-12">
            <h3>{{ $message }}</h3>
            <h4>You'll be redirected in <span id="remainingSeconds"></span> seconds</h4>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('ready', function (){
            var seconds = 5;
            $('#remainingSeconds').html(seconds);
            setInterval(function (){
                seconds--;
                $('#remainingSeconds').html(seconds);
                if (seconds == 0){
                    window.location.href = '{{ route('vendor-wt-create') }}';
                }
            }, 1000);
        })
    </script>
@endsection
