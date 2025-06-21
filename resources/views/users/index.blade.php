@extends('layouts.app')
@section('title', 'Users')
@section('content')
    <div class="bg-white shadow-lg rounded-lg mt-6 p-6">
        <table class="w-full text-center border-collapse cursor-pointer">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="border-b-2 p-4">S.N.</th>
                    <th class="border-b-2 p-4">Username</th>
                    <th class="border-b-2 p-4">Email</th>
                    <th class="border-b-2 p-4">Role</th>
                    <th class="border-b-2 p-4">Address</th>
                    <th class="border-b-2 p-4">Phone no</th>
                    <th class="border-b-2 p-4">Registered on</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="hover:bg-lime-50 hover:shadow-md transition-all duration-300">
                    <td class="border-b p-4 font-medium text-gray-700">{{$loop->iteration}}</td>
                    <td class="border-b p-4 text-gray-600">{{$user->name}}</td>
                    <td class="border-b p-4 text-gray-600">{{$user->email}}</td>
                    <td class="border-b p-4 text-gray-600">{{$user->role}}</td>
                    <td class="border-b p-4 text-gray-600">{{$user->address}}</td>
                    <td class="border-b p-4 text-gray-600">{{$user->phone}}</td>
                    <td class="border-b p-4 text-gray-600">{{$user->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
