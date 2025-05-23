@extends('layouts.auth')
@section('title','Login')
@section('content')
<div class="bg-red rounded-lg shadow-md p-8 w-full max-w-md">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <div class="flex items-center gap-2">
                <span class="text-canteen-red text-2xl">🍴</span>
                <h1 class="text-2xl font-medium">Kantin</h1>
            </div>
        </div>
        <!--  Form -->
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <!-- Username Field -->
            <div class="mb-6">
                <label for="username" class="block mb-2 font-medium">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="email" 
                    class="placeholder:text-red-600 w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400"
                    placeholder="{{ $errors->first('email')}}"
                    value="{{ old('email') }}"
                >
            </div>
            <!-- Password Field -->
            <div class="mb-6">
                <label for="password" class="block mb-2 font-medium">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="placeholder:text-red-600 w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400"
                    placeholder="{{ $errors->first('password')}}"
                >
            </div>
            <!-- Form Actions -->
            <div class="flex items-center justify-between pt-2">
                <button 
                    type="submit" 
                    class="bg-red-400 cursor-pointer hover:bg-canteen-red-dark text-white px-8 py-2 rounded-md font-medium"
                >
                    Login
                </button>
                <a href="#" class="text-red-400 text-sm hover:underline">Forget password?</a>
            </div>
            @if (session('Error'))
                <p class="text-red-400 text-sm">
                    {{ session('Error') }}
                </p>
             @endif
        </form>
</div>
@endsection