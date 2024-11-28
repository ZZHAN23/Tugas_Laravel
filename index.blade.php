@extends('layouts.app')

@section('content')
<!-- component -->
<div class="max-w-3xl mx-auto py-12 px-4 sm:py-8 lg:py-16">

    <!-- Header Section -->
    <div class="flex justify-between items-center mb-5">
        <div>
            <h3 class="text-lg font-semibold text-gray-800">Data Users</h3>
            <p class="text-gray-500">A list of all the users account.</p>
        </div>
        <div class="w-full max-w-xs relative">
            <input
                type="text"
                class="bg-white w-full pr-10 h-10 pl-3 py-2 border border-gray-200 rounded text-gray-700 text-sm placeholder-gray-400 focus:outline-none focus:border-gray-400 shadow-sm transition duration-200 ease-in-out"
                placeholder="Search for user data..."
            />
            <button class="absolute inset-y-0 right-0 flex items-center pr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Table Section -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-3 border-b border-gray-200 bg-gray-50 text-gray-500 text-left text-sm font-normal">No</th>
                    <th class="px-4 py-3 border-b border-gray-200 bg-gray-50 text-gray-500 text-left text-sm font-normal">Id User</th>
                    <th class="px-4 py-3 border-b border-gray-200 bg-gray-50 text-gray-500 text-left text-sm font-normal">Nama</th>
                    <th class="px-4 py-3 border-b border-gray-200 bg-gray-50 text-gray-500 text-left text-sm font-normal">Username</th>
                    <th class="px-4 py-3 border-b border-gray-200 bg-gray-50 text-gray-500 text-left text-sm font-normal">Password</th>
                    <th class="px-4 py-3 border-b border-gray-200 bg-gray-50 text-gray-500 text-left text-sm font-normal">Level</th>
                    <th class="px-4 py-3 border-b border-gray-200 bg-gray-50 text-gray-500 text-left text-sm font-normal">Edit</th>
                    <th class="px-4 py-3 border-b border-gray-200 bg-gray-50 text-gray-500 text-left text-sm font-normal">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="hover:bg-gray-50 border-b border-gray-200">
                    <td class="px-4 py-4 text-sm text-gray-500">{{ $loop->iteration }}</td>
                    <td class="px-4 py-4 text-sm text-gray-500">{{ $user->id_user }}</td>
                    <td class="px-4 py-4 text-sm text-gray-500">{{ $user->nama }}</td>
                    <td class="px-4 py-4 text-sm text-gray-500">{{ $user->username }}</td>
                    <td>***</td> <!-- Tampilkan *** untuk password -->
                    <td class="px-4 py-4 text-sm text-gray-500">{{ $user->level }}</td>
                    <td class="px-4 py-4">
                        <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                    </td>
                    <td class="px-4 py-4">
                        <a href="{{ route('users.destroy', $user->id) }}"
                           onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this user?')) { document.getElementById('delete-form-{{ $user->id }}').submit(); }"
                           class="text-red-600 hover:text-red-800 font-medium">Delete</a>
                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Section -->
        <div class="flex justify-between items-center px-4 py-3 bg-white border-t border-gray-200">
            <div class="text-sm text-gray-500">
                Showing <b>1-5</b> of 45
            </div>
            <div class="flex space-x-1">
                <button class="px-3 py-1 text-sm font-normal text-gray-500 bg-white border border-gray-200 rounded hover:bg-gray-50">Prev</button>
                <button class="px-3 py-1 text-sm font-normal text-white bg-gray-800 border border-gray-800 rounded hover:bg-gray-600">1</button>
                <button class="px-3 py-1 text-sm font-normal text-gray-500 bg-white border border-gray-200 rounded hover:bg-gray-50">2</button>
                <button class="px-3 py-1 text-sm font-normal text-gray-500 bg-white border border-gray-200 rounded hover:bg-gray-50">3</button>
                <button class="px-3 py-1 text-sm font-normal text-gray-500 bg-white border border-gray-200 rounded hover:bg-gray-50">Next</button>
            </div>
        </div>
    </div>

    <!-- Add User Button -->
    <div class="flex justify-center mt-6">
        <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
            Add user here..
        </a>
    </div>
</div>
@endsection
