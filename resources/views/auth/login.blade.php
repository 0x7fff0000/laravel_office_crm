@extends('layouts.app')

@section('title')
LogIn
@endsection

@section('content')
<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mx-auto w-1/4 mt-12" action="{{ route('login') }}" method="post">
    @csrf
    <div class="block text-gray-700 text-3xl font-bold mb-4 text-center">LogIn</div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Email
        </label>
        <input class="@error('email') border-red-400 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="text" placeholder="Email">
        @error('email')
        <div class="text-red-400">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Password
        </label>
        <input class="@error('email') border-red-400 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="******************">
        @error('password')
        <div class="text-red-400">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-5">
        <input class="text-gray-700 leading-tight focus:shadow-outline display-inline" id="remember" name="remember" type="checkbox" />
        <label class="text-gray-700 text-sm font-bold mb-2" for="remember">
            Remember me
        </label>
    </div>
    <div class="flex items-center justify-between">
        <a href="{{ route('register') }}" class="cursor-pointer bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Register
        </a>
        <button href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            LogIn
        </button>
    </div>
</form>
@endsection