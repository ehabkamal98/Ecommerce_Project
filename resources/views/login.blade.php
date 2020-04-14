@extends('layouts.lay_index')
@section('form')
    <form method="POST" action="{{ route('login') }}" class="form_login">
        @csrf
        <div class="row form-group">
            <div class="col-md-6 form-group pr-md-1">
                <input id="username" placeholder="User Name" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                @error('username')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-md-6 form-group pl-md-1">
                <input id="password" placeholder="Password"type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <div class="text-center"><button type="submit">Login </button></div>
    </form>
    <div class="text-center form_login" style="margin-top: 30px"><a href="{{route('show_reg')}}"> <button  type="submit">Or Register </button></a></div>
@endsection
