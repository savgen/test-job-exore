@extends('layouts.base')

@section('content')
<div class="small-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Регистрация менеджера') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf                       

                        <div class="pb-4">
                            <label for="email" class="text-sm pb-2 text-gray-600">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="w-full rounded p-2" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="test@test.ru">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="pb-4">
                            <label for="password" class="text-sm pb-2 text-gray-600">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="w-full rounded p-2" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="pb-4">
                            <label for="password-confirm" class="text-sm pb-2 text-gray-600">{{ __('Подтвердите пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="w-full rounded p-2" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="button-default green">
                                    {{ __('Регистрация') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
