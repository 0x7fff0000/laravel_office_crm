@extends('layouts.dashboard')

@section('title')
Add member
@endsection

@section('dashboard_title')
<span class="uppercase">Add member - {{ $unit->title }}</span>
@endsection

@section('dashboard_content')
<form action="{{ route('members.store', $office) }}" method="post">
    @csrf
    <div class="mb-4">
        <label for="user_id">Member:</label>
        <select class="@error('user_id') border-red-400 @enderror shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="user_id" id="user_id">
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->concatNameAndEmail() }}</option>
            @endforeach
        </select>
        @error('user_id')
        <div class="text-red-400">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit" class="px-6 py-2 bg-green-700 rounded shadow-md text-white hover:bg-green-600">Add</button>
        <a href="{{ route('members.index', $unit) }}" class="px-6 py-2 bg-red-700 rounded shadow-md text-white hover:bg-red-600">Cancel</a>
    </div>
</form>
@endsection