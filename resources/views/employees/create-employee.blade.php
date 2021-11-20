@extends('layouts.base')

@section('content')
<div class="small-container">
    <div class="card-header">Создать сотрудника</div>
    <div>
        <form  method="POST" action="{{ route('create-employee') }}">
            @csrf
            <div class="pb-4">
                <div>
                    <div class="text-sm pb-2 text-gray-600">E-mail</div>
                    <div>
                        <input id="email" type="email" placeholder="test@test.ru" class="w-full rounded p-2" name="email" value="{{ old('email') }}" required autocomplete="email">
                    </div>
                </div>
                <div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="pb-4">
                <div>
                    <div class="text-sm pb-2 text-gray-600">Пароль</div>
                    <div>
                        <input id="password" type="password"  class="w-full rounded p-2" name="password" required autocomplete="new-password">
                    </div>
                </div>
                <div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="pb-4">
                <div class="text-sm pb-2 text-gray-600">Подтвердите пароль</div>
                <div>
                    <input id="password-confirm" type="password"  class="w-full rounded p-2" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div>
                <button name="create" class="button-default green">
                    <div>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div>Создать</div>
                </button>
            </div>
        </form>
    </div>
</div>
    
@endsection