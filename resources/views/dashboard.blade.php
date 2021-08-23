<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Hi <b> {{\Illuminate\Support\Facades\Auth::user()->name}}</b>
            <b style="float:right;"> Total Users {{ count($users)  }} </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row"> </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Serial Number</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Registration Date</th>
            </tr>
            </thead>
            <tbody>
            @php ($i=1)
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$i++}}</th>
                <th>{{ $user->name }}</th>
                <th>{{ $user->email }} </th>
                <th>{{ $user->created_at->diffForHumans() }}</th>
            </tr>

            @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
