@extends('layouts.base')

@section('content')
<div>
    <div class="text-lg font-bold mb-4">Редактировать: {{ $article->title }}</div>
    <form  method="POST" action={{ route('edit-article', ['id' => $article->id]) }} enctype="multipart/form-data">
        @csrf
        <div>
            <div class="mb-4">
                <div class="text-sm pb-2 text-gray-600">
                    Категория
                </div>
                <div>
                    <select name="category" class="w-full rounded p-2" id="">
                        @foreach ($categories as $category)
                            @if ($article->category_id == $category->id)
                                <option value="{{ $category->id }}" selected>
                                    {{ $category->name }}
                                </option>
                            @else
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <div class="text-sm pb-2 text-gray-600">
                Название
            </div>
            <div>
                <input type="text" class="w-full rounded p-2" name="title" value="{{ $article->title }}" required>
            </div>
        </div>
        <div class="mb-4">
            <div class="text-sm pb-2 text-gray-600">
                Изображение
            </div>
            <div class="mb-2">
                <img src="{{ URL::asset('/upload/'.$article->image) }}" alt="">
            </div>
            <div>
                <input type="file" name="image"  accept="image/*">
            </div>
        </div>
        <div>
            <button name="update" class="button-default green">
                <div>
                    <i class="fas fa-save"></i>
                </div>
                <div>
                    Сохранить
                </div>
            </button>
        </div>
    </form>
</div>
@endsection