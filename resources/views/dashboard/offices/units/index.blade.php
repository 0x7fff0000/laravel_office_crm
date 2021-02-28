@extends('layouts.dashboard')

@section('title')
Office units
@endsection

@section('dashboard_title')
<span class="uppercase">Units - {{ $office->title }}</span>
<a href="{{ route('units.create', $office) }}" class="px-6 py-2 bg-green-700 rounded shadow-md text-white hover:bg-green-600">New</a>
@endsection

@section('dashboard_content')
<table class="table-auto w-full">
    @if ($units)
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($units as $unit)
        <tr class="text-center border-t border-gray">
            <td><a href="{{ route('units.show', $unit) }}">{{ $unit->title }}</a></td>
            <td>{{ $unit->description }}</td>
            <td>{{ $unit->address }}</td>
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
    {{ $units->links() }}
    @else
    <div class="text-center text-gray-400">Office unit list is empty</div>
    @endif
</table>
@endsection