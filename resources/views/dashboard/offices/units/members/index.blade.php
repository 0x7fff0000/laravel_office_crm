@extends('layouts.dashboard')

@section('title')
Office unit members
@endsection

@section('dashboard_title')
<span class="uppercase">Members - {{ $unit->title }}</span>
<a href="{{ route('members.create', $unit) }}" class="px-6 py-2 bg-green-700 rounded shadow-md text-white hover:bg-green-600">Add</a>
@endsection

@section('dashboard_content')
<table class="table-auto w-full">
    @if ($units)
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
        <tr class="text-center border-t border-gray">
            <td><a href="{{ route('member.show', $member) }}">{{ $member->name }}</a></td>
            <td>{{ $member->email }}</td>
            <td class="flex flex-row justify-end">
                <form action="{{ route('members.destroy', $member) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-2 bg-red-700 rounded shadow-md text-white hover:bg-red-600">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    {{ $members->links() }}
    @else
    <div class="text-center text-gray-400">Office unit member list is empty</div>
    @endif
</table>
@endsection