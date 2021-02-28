@extends('layouts.dashboard')

@section('title')
Office unit create
@endsection

@section('dashboard_title')
<span class="uppercase">Unit create - {{ $office->title }}</span>
@endsection

@section('dashboard_content')
<form action="{{ route('units.store', $office) }}" method="post">
    @csrf
    <div class="mb-4">
        <label for="title">Title:</label>
        <input class="@error('title') border-red-400 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="title" id="title" />
        @error('title')
        <div class="text-red-400">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="description">Description:</label>
        <textarea class="@error('description') border-red-400 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" id="description" cols="30" rows="10"></textarea>
        @error('description')
        <div class="text-red-400">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="address">Address:</label>
        <input class="@error('title') border-red-400 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="address" id="address" />
        @error('address')
        <div class="text-red-400">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit" class="px-6 py-2 bg-green-700 rounded shadow-md text-white hover:bg-green-600">Create</button>
        <a href="{{ route('units.index', $office) }}" class="px-6 py-2 bg-red-700 rounded shadow-md text-white hover:bg-red-600">Cancel</a>
    </div>
</form>
@endsection