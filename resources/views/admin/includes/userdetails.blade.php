@section('userimg')

<img src="{{ asset(Auth::user()->profile->avatar) }}" alt="Profile Pic" width="50" class="rounded-circle mr-3">

@endsection

@section('username')

{{ Auth::user()->name }}

@endsection
