@extends('layouts.dashboard')

@section('title')
Office unit
@endsection

@section('dashboard_title')
<span class="uppercase">Unit - {{ $unit->title }}</span>
<a href="" class="px-6 py-2 bg-green-700 rounded shadow-md text-white hover:bg-green-600">Members</a>
@endsection

@section('dashboard_content')
<div>
    <div class="mb-4">
        <div class="font-bold">Description:</div>
        <div class="w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            {{ $unit->description }}
        </div>
    </div>
    <div class="mb-4">
        <div class="font-bold">Address:</div>
        <div class="w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            {{ $unit->address }}
        </div>
    </div>
    <div>
        <a href="{{ route('units.index', $unit->office) }}" class="px-6 py-2 bg-red-700 rounded shadow-md text-white hover:bg-red-600">Cancel</a>
    </div>
</div>
@endsection