@extends('layouts.base')

@section('content')
<div class="main-page">
    <div class="text-lg font-bold mb-4">{{ $employee->email }}</div>
    <div class="flex w-full">
        <div class="w-full">
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
            @endif                
            <div>
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection