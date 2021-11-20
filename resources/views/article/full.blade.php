@extends('layouts.base')

@section('content')

<div class="main-page">
    <div class="text-lg font-bold mb-1">
        {{ $article->title }}
    </div>
    <div class="mb-4">
        <a href="/articles/category/{{ $article->category_id }}" class="text-sm">
            {{ App\Http\Controllers\Article\ArticleController::get_category_name($article->category_id) }}
        </a>
    </div>
    <div>
        <img src="{{ URL::asset('/upload/'.$article->image) }}" alt="">
    </div>
</div>
    
@endsection