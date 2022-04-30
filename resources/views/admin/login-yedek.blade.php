@extends('admin.layout')
@section('title', 'Login Page')
@section('content')

    <div class="login">
        <div class="login-container ">
            <div class="login-header">
                <img src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                     alt="Workflow">
                <h2>Hesabınıza giriş yapın</h2>
            </div>
            <form class="login-form" action="{{ route('admin.login') }}" method="POST">
                <input type="hidden" name="remember" value="true">
                @csrf
                <div class="input-group">
                    <div class="input-container">
                        <label for="email-address">E-Mail </label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                               placeholder="mail@example.com">
                    </div>
                    <div class="input-container">
                        <label for="password">Şifre</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               placeholder="Şifreniz">
                    </div>
                </div>
                <div class="actions">
                    <div class="renember">
                        <input id="remember-me" name="remember-me" type="checkbox">
                        <label for="remember-me"> Beni hatırla </label>
                    </div>
                    <div class="text-sm">
                        <a href="{{ route('admin.forgot') }}"> Şifrenizi mi unuttunuz? </a>
                    </div>
                </div>
                <div class="w-full py-2">
                    @if($errors->any())
                        <h4 class="text-red-500">{{$errors->first()}}</h4>
                    @endif
                </div>
                <div class="submit-btn">
                    <button type="submit">
                    <span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </span>
                        Giriş Yap
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
