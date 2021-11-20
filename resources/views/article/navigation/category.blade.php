@foreach ($categories as $category)
    <div>
        <a href="/articles/category/{{ $category->id }}">
            {{ $category->name }}
        </a>
    </div>
@endforeach