@extends('layouts.dashboard')

@section('title')
Offices
@endsection

@section('dashboard_title')
<span class="uppercase">Offices</span>
<a href="{{ route('offices.create') }}" class="px-6 py-2 bg-green-700 rounded shadow-md text-white hover:bg-green-600">New</a>
@endsection

@section('dashboard_content')
<table class="table-auto w-full">
    @if ($offices)
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Creator</th>
            <th>Director</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($offices as $office)
        <tr class="text-center border-t border-gray">
            <td><a href="{{ route('offices.show', $office) }}">{{ $office->title }}</a></td>
            <td>{{ $office->description }}</td>
            <td>{{ $office->creator->name }}</td>
            <td>{{ $office->director->name ?? '' }}</td>
            <td class="flex flex-row justify-end">
                <a href="{{ route('offices.edit', $office) }}" class="mr-2 px-6 py-2 bg-yellow-600 rounded shadow-md text-white hover:bg-yellow-500">Edit</a>
                <form action="{{ route('offices.destroy', $office) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-2 bg-red-700 rounded shadow-md text-white hover:bg-red-600">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    {{ $offices->links() }}
    @else
    <div class="text-center text-gray-400">Office list is empty</div>
    @endif
</table>
@endsection