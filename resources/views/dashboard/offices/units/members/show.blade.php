@extends('layouts.dashboard')

@section('title')
Member
@endsection

@section('dashboard_title')
<span class="uppercase">Unit - {{ $member->unit->title }}</span>
@endsection

@section('dashboard_content')
<div>
    <div class="mb-4">
        <div class="font-bold">Name:</div>
        <div class="w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            {{ $member->name }}
        </div>
    </div>
    <div class="mb-4">
        <div class="font-bold">Email:</div>
        <div class="w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            {{ $member->email }}
        </div>
    </div>
    <div class="mb-4">
        <div class="font-bold">Office unit:</div>
        <div class="w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <a href="{{ route('units.show', $member->unit) }}">{{ $member->unit->title }}</a>
        </div>
    </div>
    <div>
        <a href="{{ route('members.index', $member->unit) }}" class="px-6 py-2 bg-red-700 rounded shadow-md text-white hover:bg-red-600">Cancel</a>
    </div>
</div>
@endsection