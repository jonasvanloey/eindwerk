@extends('main')

@section('content')
    <div class="d-flex container justify-content-center">
        <div class="align-self-center">
            <div class="card">
                <div class="card-body">
                    <h1>Login</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email">Email adres</label>

                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="password">Wachtwoord</label>
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group row">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"
                                               name="remember" {{ old('remember') ? 'checked' : '' }}> Ik wil ingelogd blijven
                                    </label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                                <button type="submit" class="btn big">
                                    Login
                                </button>

                                <a class="btn-grey big" href="{{ route('password.request') }}">
                                    Ik heb nog geen account
                                </a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
