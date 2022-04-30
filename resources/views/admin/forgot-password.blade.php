@extends('admin.layout')
@section('title', 'Login Page')
@section('content')

    <div class="login">
        <div class="login-container ">
            <div class="login-header">
                <img src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                     alt="Workflow">
                <h2>Şifre sıfırlama</h2>
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
                </div>
                <div class="actions">
                    <div class="renember">

                    </div>
                    <div class="text-sm">
                        <a href="{{ route('admin.login') }}"> Giriş yapmaya geri dön </a>
                    </div>
                </div>
                <div class="w-full">
                    @if($errors->any())
                        <h4 class="text-red-500 my-2">{{$errors->first()}}</h4>
                    @endif
                </div>
                <div class="submit-btn">
                    <button type="submit">
                        Bağlantı Gönder
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
