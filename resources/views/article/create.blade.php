@extends('layouts.base')

@section('content')
<div>
    <div class="text-lg font-bold mb-4">Создать статью</div>
    <form  method="POST" action="{{ route('create-article') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <div class="mb-4">
                <div class="text-sm pb-2 text-gray-600">Категория</div>
                <div>
                    <select name="category" id="category" class="w-full rounded p-2">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>

            </div>
        </div>
        <div class="mb-4">
            <div class="text-sm pb-2 text-gray-600">
                Название
            </div>
            <div>
                <input id="title" type="title" name="title" class="w-full rounded p-2" value="{{ old('title') }}" required autocomplete="title">
            </div>
        </div>
        <div class="mb-4">
            <div class="text-sm pb-2 text-gray-600">
                Изображение
            </div>
            <div>
                <input type="file" name="image"  accept="image/*">
            </div>
        </div>
        <div>
            <button name="create" class="button-default green">
                <div>
                    <i class="fas fa-plus"></i>
                </div>
                <div>
                    Создать
                </div>
            </button>
        </div>
    </form>
</div>
@endsection