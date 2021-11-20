<div class="flex items-center w-full justify-between bg-gray-200 rounded mb-2 p-2">
    <div class="w-2/4">
        <div>
            <a href="/articles/category/{{ $article->category_id }}" class="text-sm">
                {{ App\Http\Controllers\Article\ArticleController::get_category_name($article->category_id) }}
            </a>
        </div>
        <a href="/articles/edit/{{ $article->id }}" class="font-bold">
            {{ $article->title }}
        </a>
    </div>   
    <div class="w-1/4 text-center">
        <a href="">{{ $article->email }}</a>
    </div> 
    <div>
        <form  method="POST" action={{ route('delete-article', ['id' => $article->id]) }}>
            @csrf
            <button class="button-default red">
                <div><i class="far fa-trash-alt"></i></div>
                <div>Удалить</div>
            </button>
        </form>
    </div>  
</div> 