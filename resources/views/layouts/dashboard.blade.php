@extends('layouts.app')

@section('content')
@auth
<div class="flex flex-row h-full">
    <nav class="w-1/4 h-full bg-white shadow-md">
        <ul class="text-lg pl-4 mt-12 uppercase text-gray-500">
            <li class="text-2xl normal-case mb-2 text-black">Hi, {{ auth()->user()->name }}</li>
            <li><a href="{{ route('home') }}" class="hover:underline hover:text-blue-500">Home</a></li>
            <li><a href="{{ route('offices.index') }}" class="hover:underline hover:text-blue-500">Offices</a></li>
            <li class="mt-2">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="text-red-500 hover:underline hover:text-blue-500" type="submit">LogOut</button>
                </form>
            </li>
        </ul>
    </nav>
    <div class="w-full">
        <div class="mx-24 my-12 bg-white shadow-md rounded w-auto">
            <div class="px-6 py-3 border-b border-black font-bold flex justify-between items-center">
                @yield('dashboard_title')
            </div>
            <div class="mx-6 py-6">
                @yield('dashboard_content')
            </div>
        </div>
    </div>
</div>
@endauth
@endsection