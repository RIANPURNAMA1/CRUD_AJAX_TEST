@extends('layouts.layouts')
@section('content')
     <!-- Main Content -->
     <div class="flex-1 p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <!-- Card 1 -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-lg font-semibold">Users</h3>
                <p class="text-2xl">{{$userCount}}</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-lg font-semibold">Roles</h3>
                <p class="text-2xl">{{$rolesCount}}</p>
            </div>
        </div>
    </div>
@endsection