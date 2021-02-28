@extends('layouts.dashboard')

@section('title')
Office edit
@endsection

@section('dashboard_title')
<span class="uppercase">Office edit</span>
@endsection

@section('dashboard_content')
<form action="{{ route('offices.update', $office) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="title">Title:</label>
        <input class="@error('title') border-red-400 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="title" id="title" value="{{ $office->title }}" />
        @error('title')
        <div class="text-red-400">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="description">Description:</label>
        <textarea class="@error('description') border-red-400 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" id="description" cols="30" rows="10">{{ $office->description }}</textarea>
        @error('description')
        <div class="text-red-400">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="director_id">Director:</label>
        <select class="@error('director') border-red-400 @enderror shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="director_id" id="director_id">
            @if ($office->director)
            <option value="{{ $office->director->id }}" selected="selected">{{ $office->director->concatNameAndEmail() }}</option>
            @else
            <option value="0" selected="selected"></option>
            @endif
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->concatNameAndEmail() }}</option>
            @endforeach
        </select>
        @error('director')
        <div class="text-red-400">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit" class="px-6 py-2 bg-green-700 rounded shadow-md text-white hover:bg-green-600">Save</button>
        <a href="{{ route('offices.index') }}" class="px-6 py-2 bg-red-700 rounded shadow-md text-white hover:bg-red-600">Cancel</a>
    </div>
</form>
@endsection