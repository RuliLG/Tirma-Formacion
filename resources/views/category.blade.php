@extends('layouts.base')

@section('title', $category->name)

@section('content')
<div class="w-full max-w-2xl bg-white shadow-xl rounded-xl p-8" x-data="{
    showEdit: false
}">
    <div x-show="!showEdit" x-transition>
        @if (session()->has('success'))
        <div class="bg-green-100 rounded p-4 text-green-700 mb-4">The category has been updated</div>
        @endif
        <h1 class="text-4xl font-bold flex items-center justify-start space-x-2">
            <span>{{ $category->name }}</span>
            @if ($category->is_active)
            <svg class="text-green-500 h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            @else
            <svg class="text-red-500 h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            @endif
        </h1>
        <div class="mt-8">
            {!! $category->description !!}
        </div>
        <button type="button" x-on:click="showEdit = true">Edit</button>
    </div>

    <div x-show="showEdit" x-transition>
        <form method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}">
            @csrf
            @method('PUT')
            <label class="block">
                Nombre
                <input type="text" name="name" class="bg-white border border-gray-300 p-4 rounded w-full mt-2" placeholder="Name" value="{{ old('name', $category->name) }}">
                @error('name')
                {{ $message }}
                @enderror
            </label>
            <label class="block">
                ¿Está activo?
                <input type="checkbox" name="is_active" @checked($category->is_active)>
                @error('is_active')
                {{ $message }}
                @enderror
            </label>
            <div class="flex justify-end items-center space-x-4 mt-4">
                <button type="button" x-on:click="showEdit = false">Cancel</button>
                <button type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
