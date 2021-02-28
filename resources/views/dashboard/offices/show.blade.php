@extends('layouts.dashboard')

@section('title')
Office create
@endsection

@section('dashboard_title')
<span class="uppercase">Office - {{ $office->title }}</span>
<a href="{{ route('units.index', $office) }}" class="px-6 py-2 bg-green-700 rounded shadow-md text-white hover:bg-green-600">Units</a>
@endsection

@section('dashboard_content')
<div>
    <div class="mb-4">
        <div class="font-bold">Description:</div>
        <div class="w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            {{ $office->description }}
        </div>
    </div>
    <div class="mb-4">
        <div class="font-bold">Director:</div>
        <div class="w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            {{ $office->director->concatNameAndEmail() ?? '' }}
        </div>
    </div>
    <div>
        <a href="{{ route('offices.edit', $office) }}" class="px-6 py-2 bg-yellow-600 rounded shadow-md text-white hover:bg-yellow-500">Edit</a>
        <a href="{{ route('offices.index') }}" class="px-6 py-2 bg-red-700 rounded shadow-md text-white hover:bg-red-600">Cancel</a>
    </div>
</div>
@endsection