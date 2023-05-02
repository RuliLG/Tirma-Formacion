@extends('layouts.base')

@section('title', 'Create category')

@section('content')
<div class="w-full max-w-2xl bg-white shadow-xl rounded-xl p-8">
    <div>
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <label class="block">
                Nombre
                <input type="text" name="name" class="bg-white border border-gray-300 p-4 rounded w-full mt-2" placeholder="Name" value="">
                @error('name')
                {{ $message }}
                @enderror
            </label>
            <label class="block">
                ¿Está activo?
                <input type="checkbox" name="is_active">
                @error('is_active')
                {{ $message }}
                @enderror
            </label>
            <div class="flex justify-end items-center space-x-4 mt-4">
                <button type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
