@extends('layouts.layouts')

@section('content')

<!-- Breadcrumb Section -->
<nav class="text-sm font-medium text-gray-700 mb-4">
    <ol class="flex space-x-2">
        <li><a href="/" class="text-blue-600 hover:text-blue-800">Home</a></li>
        <li><span class="text-gray-400">/</span></li>
        <li><a href="/users" class="text-blue-600 hover:text-blue-800">Users</a></li>
        <li><span class="text-gray-400">/</span></li>
        <li class="text-gray-500">{{ $title }}</li>
    </ol>
</nav>
    <div class="mt-6 ">
        <h2 class="text-2xl font-semibold">{{ $title }}</h2>
        <hr class="my-2 shadow-lg bg-white h-2">

        <div class="flex justify-end gap-2">
            <div class="flex justify-end gap-2">
                <button id="createUserButton" type="button" class="bg-blue-900 text-white py-2 px-4 rounded">
                    <i class="fa-solid fa-user-plus"></i> Create User
                </button>
            </div>
        </div>
        {{-- Include modal create --}}
        @include('users.create')
        @include('users.edit')

        {{-- Include modal show--}}
        @include('users.show')


        <!-- Wrapper untuk scroll horizontal -->
        <div class="overflow-x-auto-table  gap-4">
            <table id="myTable" class="table-responsive   border-collapse shadow-lg bg-white">
                <thead>
                    <tr class="bg-blue-900 text-white">
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Roles</th>
                        <th class="px-4 py-2 border">Name</th>
                        <th class="px-4 py-2 border">Phone</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Address</th>
                        <th class="px-4 py-2 border">Photo</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Tambahkan lebih banyak baris di sini jika diperlukan -->
                </tbody>
            </table>
        </div>
    </div>


    {{-- script --}}
    @include("users.script.read")
    @include("users.script.showScript")
    @include('users.script.statusScript')
    @include('users.script.deleteScript')
    @include('users.script.editScript')
    @include('users.script.createScript')


@endsection
