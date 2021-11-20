@extends('layouts.base')

@section('content')
<div class="main-page">
    <div class="mb-4">
        <a href="/employees/create" class="button-default blue">
            <div>
                <i class="fas fa-plus"></i>
            </div>
            <div>
                Добавить сотрудника
            </div>
        </a>
    </div>
    <div>
        @foreach ($employees as $employee)
            <div class="p-2 rounded bg-gray-200 text-center mb-2 text-sm">
                <a href="/articles/employee/{{ $employee->id }}">
                    {{ $employee->email }}
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection