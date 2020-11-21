@extends('admin.layout')
@section('content')

<table class="table table-striped">
     <thead>
      <tr>
       <th>Name</th>
       <th>Email</th>
       <th>Birthdate</th>
       <th>Total expenses</th>
       <th>Total income</th>
       <th>Registered date</th>
     </tr>
     </thead>
    <tbody>
    @if( ! $users->isEmpty() )
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->name }}</th>
                <td>{{ $user->email }}</td>
                <td>{{ $user->birthdate }}</td>
                <td>{{ $user->total_expenses }}</td>
                <td>{{ $user->total_income }}</td>
                <td>{{ $user->registered_date }}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
    </table>

    @endsection