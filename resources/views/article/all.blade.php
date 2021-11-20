@extends('layouts.base')

@section('content')
<div class="main-page">
    <div class="flex w-full">
        <div class="w-1/4 pr-4  text-sm">
            @include('article.navigation.category')
        </div>
        <div class="w-3/4">
            @if ($user->hasRole('manager'))
                @if (!$articles->isEmpty())
                    @foreach ($articles as $article)
                        @include('article.article.manager') 
                    @endforeach
                @else
                    <div>
                        Ваши сотрудники еще не добавили ни одной статьи
                    </div>
                @endif            
            @else
                <div class="mb-4">
                    <div>
                        <a href="/articles/create" class="button-default blue">
                            <div>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div>
                                Добавить статью
                            </div>
                        </a>
                    </div>
                </div>
                <div>
                    @if (!$articles->isEmpty())
                        @foreach ($articles as $article)
                            @include('article.article.employee')   
                        @endforeach
                    @else
                        <div>Вы еще не создали ни одной статьи</div>
                    @endif
                </div>                
            @endif
            <div>
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection