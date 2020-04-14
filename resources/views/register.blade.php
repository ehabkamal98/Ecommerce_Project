@extends('layouts.lay_index')
@section('form')
    <form method="POST" action="{{ route('register') }}" class="form_login">
        @csrf
        <div class="form-group">
            <input id="name" placeholder="Full Name .. " type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="username" placeholder="User Name .. " type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
            @error('username')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address .." required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
        </div>
        <div class="form-group ">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password .." required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
        </div>
        <div class="text-center"><button type="submit">Register </button></div>
    </form>
@endsection
